@extends('layouts.layout')
@section('content')

    <head>
        <title>صفحه جستجو</title>
    </head>
    @if ($searchedAdvertisements->isEmpty())
        <h1 style="text-align: center;margin-top:4%;color:red">موردی یافت نشد</h1>
    @else
        <div style="margin-right: 5%;margin-top:2%;">
            @foreach ($searchedAdvertisements as $tags)
                <h1>نتایج جستجو برای تگ {{ $tags->name }}</h1>
                <hr width="350px">
                <br>
                <div class="advertisementList">
                    @foreach ($tags->advertisements as $advertisement)
                        <figure name="{{ $advertisement->id }}">
                            <div class="image_content">
                                <img src="{{ $advertisement->img_link }}" alt="بارگیری تصویر ناموفق بود"
                                    style="width:100%">
                            </div>
                            <figcaption>
                                <h5>{{ $advertisement->name }}</h5>
                                <h5>قیمت : {{ $advertisement->price }} تومان</h5>

                                <h5>تگ‌ها :
                                    @if ($advertisement->tags->isNotEmpty())
                                        @foreach ($advertisement->tags as $tag)
                                            {{ $tag->name }}
                                            @if ($tag != $advertisement->tags->last()) ،
                                            @endif
                                        @endforeach
                                    @else
                                        ندارد
                                    @endif
                                </h5>
                                <a class="info_button" href="/advertisement_info/{{ $advertisement->id }}">اطلاعات
                                    آگهی</a>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            @endforeach
    @endif
    </div>

@endsection
