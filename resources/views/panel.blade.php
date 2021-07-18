@extends('layouts.layout')
@section('content')

    <head>
        <title>صفحه اصلی</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <div style="width: 95%;margin:0 auto">
        <div class="panel">
            <div class="panel_options">
                <form action="/advertisement/add" id="insertBook" method="POST" enctype="multipart/form-data"
                    style="margin:30px 30px 20px 20px">
                    @csrf
                    <h2>ایجاد آگهی</h2>
                    <table class="table table-striped table-bordered">
                        <tr style="text-align:center">
                            <th>نام آگهی</th>
                            <th>قیمت</th>
                            <th>فایل دانلود اگهی</th>
                        </tr>
                        <td> <input name="name" type="text" class="form-control" style="padding : 0px" required></td>
                        <td><input name="price" type="text" class="form-control" style="padding : 0px" required></td>

                        <td style="display:flex;justify-content: space-between;margin-left:10px;margin-right:10px">
                            @foreach ($tags as $tag)
                                <span>
                                    <input name="tags[]" value="{{ $tag->id }}" type="checkbox">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </td>
                        <tr style="text-align:center">
                            <th>فایل تصویر آگهی</th>
                            <th>فایل پیش نمایش</th>
                            <th>تگ‌ها</th>
                        </tr>

                        <td><input name="ImageLink" type="file" class="form-control" required></td>

                        <td><input name="PreviewLink" type="file" class="form-control" required></td>

                        <td><input name="DownloadLink" type="file" class="form-control" required></td>
                        @if ($msg = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $msg }}</strong>
                            </div>
                        @endif
                    </table>
                    <input type="submit" class="btn btn-primary btn-lg" value="ایجاد آگهی">
                </form>

                <form action="/advertisement/edit" id="insertBook" method="POST" enctype="multipart/form-data"
                    style="margin:30px 30px 20px 20px">
                    @csrf
                    <h2>لیست آگهی‌ها</h2>
                    @if ($advertisement->isEmpty())
                        <h2 style="text-align:center; color: coral;">لیست آگهی‌های شما خالی است.</h2>
                    @else
                        @php
                            $counter = 1;
                        @endphp

                        @foreach ($advertisement as $item)
                            <table class="table table-striped table-bordered ">
                                <tr style="text-align:center; ">
                                    <th>تصویر</th>
                                    <th>نام آگهی</th>
                                    <th>قیمت</th>
                                    <th>تگ‌ها</th>
                                </tr>
                                <tr style="text-align:center;vertical-align:middle">

                                    <td rowspan="3"><img src="{{ $item->img_link }}" alt="بارگزاری ناموفق بود"
                                            height="150px"></td>

                                    <td> <input name="name" type="text" class="form-control" value="{{ $item->name }}"
                                            readonly>
                                    </td>
                                    <td><input name="price" type="text" class="form-control" value="{{ $item->price }}"
                                            readonly>
                                    </td>

                                    <td style="display:flex;justify-content: space-between;margin: 15px 10px 0 10px;">
                                        @php
                                            $adverismentTags = array_column($item->tags->toArray(), 'id');
                                        @endphp
                                        @foreach ($tags as $tag)
                                            @if (in_array($tag->id, $adverismentTags))
                                                <span>
                                                    <input type="checkbox" name="tags[]" , value="{{ $tag->id }}"
                                                        readonly checked>
                                                    {{ $tag->name }}
                                                </span>
                                            @else
                                                <span>
                                                    <input type="checkbox" name="tags[]" , value="{{ $tag->id }}"
                                                        readonly>
                                                    {{ $tag->name }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr style="text-align:center;vertical-align:middle">
                                    <th>لینک دانلود تصویر آگهی</th>
                                    <th>لینک دانلود پیش نمایش</th>
                                    <th>لینک دانلود دانلود آگهی</th>
                                </tr>
                                <tr style="text-align:center;vertical-align:middle">
                                    <td><a href="{{ $item->img_link }}">دانلود</a></td>
                                    <td><a href="{{ $item->dl_link }}">دانلود</a></td>
                                    <td><a href="{{ $item->prev_link }}">دانلود</a></td>
                                </tr>
                                @if ($msg = Session::get('editSuccess'))
                                    <div class="alert alert-success">
                                        <strong>{{ $msg }}</strong>
                                    </div>
                                @endif
                            </table>
                            @php
                                $counter += 1;
                            @endphp
                        @endforeach
                    @endif
                </form>
                <div id="cart">
                    <h2 style="margin-right: 30px;margin-top: 30px;">سبد خرید</h2>
                    @if ($msg = Session::get('purchaseSuccess'))
                        <script type="text/javascript">
                            alert('{{ $msg }}');
                        </script>
                    @endif
                    @if ($user->purchases->isEmpty())
                        <h2 style="text-align:center; color: coral;">سبد خرید شما خالی است.</h2>
                    @else
                        <div class="grid">
                            @foreach ($user->purchases as $purchase)
                                <figure class="m-1" name="{{ $purchase->advertisement->id }}">
                                    <div class="image_content">
                                        <img src="{{ $purchase->advertisement->img_link }}"
                                            alt="بارگیری تصویر ناموفق بود" style="width:100%">
                                    </div>
                                    <figcaption>
                                        <h6>{{ $purchase->advertisement->name }}</h6>
                                        <h6>قیمت : {{ $purchase->advertisement->price }} تومان</h6>

                                        <h6>تگ‌ها :
                                            @if ($purchase->advertisement->tags->isNotEmpty())
                                                @foreach ($purchase->advertisement->tags as $tag)
                                                    {{ $tag->name }}
                                                    @if ($tag != $purchase->advertisement->tags->last()) ،
                                                    @endif
                                                @endforeach
                                            @else
                                                ندارد
                                            @endif
                                        </h6>
                                        <a href="{{ $purchase->advertisement->dl_link }}" class="dl_preview">دانلود
                                            کتاب</a>
                                    </figcaption>
                                </figure>
                            @endForeach
                        </div>
                    @endif
                </div>
                <br>
                <br>
                <br>
            </div>
            <div class="panel_information">
                <h2 style="margin-top: 30px;text-align: center;color: white;">اطلاعات پنل کاربری</h2>
                <div class="information">
                    <ul>
                        <li>نام کاربری : {{ $user->username }}</li>
                        <li>نام و نام خانوادگی : {{ $user->fullName }}</li>
                        <li> اعتبار : {{ $user->credit }} تومان</li>
                        <li>شماره موبایل : {{ $user->phoneNumber }}</li>
                        <li>ایمیل :
                            @if ($user->email != null)
                                {{ $user->email }}
                            @else
                                ندارد
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
