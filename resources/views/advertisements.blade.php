@extends('layouts.layout')
@section('content')

    <head>
        <title>آگهی‌ها</title>
    </head>
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <div style="margin-right: 5%;">
        <fieldset style="margin-left: 5%; border-color:#e79925;">
            <legend class="Legend">لیست آگهی‌ها</legend>
            <!------------------------------------------------------------------------------------------------------------------------------------->
            <!-------------------------------------------------- لیست محصولات -------------------------------------------------------------->
            <div class="advertisementList">
                @foreach ($advertisements as $advertisement)
                    <figure name="{{ $advertisement->id }}">
                        <div class="image_content">
                            <img src="{{ $advertisement->img_link }}" alt="بارگیری تصویر ناموفق بود" style="width:100%">
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
                            <a class="info_button" href="/advertisement_info/{{ $advertisement->id }}">اطلاعات آگهی</a>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </fieldset>
        <br>
        <br>
    </div>
@endsection
