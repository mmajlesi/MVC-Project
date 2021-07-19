@extends('layouts.layout')
@section('content')

    <head>
        <title>پنل ادمین</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <div class="m-5">
        <h1>آگهی‌ها</h1>
        <hr width="150px">
        <br>
        <table class="table table-striped table-bordered" style="text-align: center;">
            <tr>
                <th>نام آگهی</th>
                <th>قیمت</th>
                <th>لینک دانلود تصویر</th>
                <th>لینک دانلود آگهی</th>
                <th>لینک دانلود پیش نمایش</th>
                <th>تگ‌ها</th>
                <th>خریداری شده</th>
                <th>برگزیده</th>
                <th>وضعیت</th>
                <th>ثبت تغییر</th>
            </tr>
            @foreach ($advertisement as $item)
                <tr>
                    <form action="/advertisements/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="text" value={{ $item->id }} style="display:none " />
                        <td name="name">{{ $item->name }}</td>
                        <td name="price">{{ $item->price }} تومان</td>
                        <td name="ImageLink"><a href="{{ $item->img_link }}">دانلود</a></td>
                        <td name="DownloadLink"><a href="{{ $item->dl_link }}">دانلود</a></td>
                        <td name="PreviewLink"><a href="{{ $item->prev_link }}">دانلود</a></td>
                        <td>
                            @foreach ($item->tags as $tag)
                                {{ $tag->name }}
                                @if ($tag != $item->tags->last()) ، @endif
                            @endforeach
                        </td>
                        <td>
                            @if ($item->load('purchase')->purchase != null)
                                <input name="purchase" type="checkbox" checked readonly>
                            @else
                                <input name="purchase" type="checkbox" readonly>
                            @endif
                        </td>
                        <td>
                            @if ($item->chosen == true)
                                <input name="chosen" value="{{ $item->chosen }}" type="checkbox" checked>
                            @else
                                <input name="chosen" value="{{ $item->chosen }}" type="checkbox">
                            @endif
                        </td>
                        <td>
                            @if ($item->status == true)
                                <input name="status" value="{{ $item->status }}" type="checkbox" checked>
                            @else
                                <input name="status" value="{{ $item->status }}" type="checkbox">
                            @endif
                        </td>
                        <td><input type="submit" value="ثبت" class="btn btn-success">
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
        <li>برای تغییر وضعیت نمایش آگهی یا انتخاب به عنوان برگزیده تیک فیلد مربوطه را تغییر داده و سپس بر روی دکمه ثبت
            کلیک کنید.</li>
        <br>
        <br>
        <h1>کاربران</h1>
        <hr width="150px">
        <br>
        @if ($msg = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $msg }}</strong>
            </div>
        @endif
        @if ($msg = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $msg }}</strong>
            </div>
        @endif
        <table class="table table-striped table-bordered" style="text-align: center;">
            <tr>
                <th>نام کاربری</th>
                <th>نام و نام خانوادگی</th>
                <th>دسترسی</th>
                <th>شماره تلفن</th>
                <th>ایمیل</th>
                <th>اعتبار</th>
                <th>ثبت</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <form action="/user/delete" method="POST">
                        @csrf
                        <input name="id" type="text" value={{ $user->id }} style="display:none" />
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->fullName }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->phoneNumber }}</td>
                        @if ($user->email != null)
                            <td>{{ $user->email }}</td>
                        @else
                            <td>ندارد</td>
                        @endif
                        <td>{{ $user->credit }} تومان</td>
                        <td><input type="submit" value="حذف" class="btn btn-danger">
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
    <br>

@endsection
