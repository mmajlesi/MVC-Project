@extends('layouts.layout')
@section('content')

    <head>
        <title>صفحه اصلی</title>
    </head>
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------- متن های ابتدایی ------------------------------------------------------------>
    <div style="margin-right: 5%;margin-top:1%">
        <fieldset style="margin-left: 5%; border-color:#e79925;">
            <legend class="Legend">آگهی‌های جدید</legend>
            <!------------------------------------------------------------------------------------------------------------------------------------->
            <!-------------------------------------------------- لیست آگهی‌ها -------------------------------------------------------------->
            <div class="advertisementList">
                @foreach ($newAdvertisements as $newAdvertisement)
                    <figure name="{{ $newAdvertisement->id }}">
                        <div class="image_content">
                            <img src="{{ $newAdvertisement->img_link }}" alt="بارگیری تصویر ناموفق بود"
                                style="width:100%">
                        </div>
                        <figcaption>
                            <h5>{{ $newAdvertisement->name }}</h5>
                            <h5>قیمت : {{ $newAdvertisement->price }} تومان</h5>

                            <h5>تگ‌ها :
                                @if ($newAdvertisement->tags->isNotEmpty())
                                    @foreach ($newAdvertisement->tags as $tag)
                                        {{ $tag->name }}
                                        @if ($tag != $newAdvertisement->tags->last()) ،
                                        @endif
                                    @endforeach
                                @else
                                    ندارد
                                @endif
                            </h5>
                            <a class="info_button" href="/advertisement_info/{{ $newAdvertisement->id }}">اطلاعات آگهی</a>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </fieldset>
        <!--------------------------------------------------------------------------------------------------------------------------------->
        <!----------------------------------------------------------- برگزیدگان ---------------------------------------------------------------->
        @if ($chosen_advertisements->isNotEmpty())
            <footer>
                <fieldset style="margin-left: 5%; border-color:#e79925;">
                    <legend class="Legend">آگهی‌های برتر</legend>
                    <div style="width : 15%; margin: auto;">
                        @foreach ($chosen_advertisements as $chosen)
                            <div class="SlideShow">
                                <figure>
                                    <img src="{{ $chosen->img_link }}" alt="بارگیری تصویر ناموفق بود" style="width:100%">
                                    <figcaption>
                                        <h5>{{ $chosen->name }}</h5>
                                        <h5>قیمت : {{ $chosen->price }} تومان</h5>
                                        <h5>تگ‌ها :
                                            @if ($chosen->tags->isNotEmpty())
                                                @foreach ($chosen->tags as $tag)
                                                    {{ $tag->name }}
                                                    @if ($tag != $chosen->tags->last()) ،
                                                    @endif
                                                @endforeach
                                            @else
                                                ندارد
                                            @endif
                                        </h5>
                                        <a class="info_button" href="/advertisement_info/{{ $chosen->id }}">اطلاعات
                                            آگهی</a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endForeach
                        <div style="text-align: center;">
                            <a class="next" onclick="changeSlides(+1)">&#10094;</a>
                            <span id="numbertext"></span>
                            <a class="prev" onclick="changeSlides(-1)">&#10095;</a>
                        </div>
                    </div>
                </fieldset>
            </footer>
        @endif
        <br>
        <!--------------------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------ درباره ما --------------------------------------------------------------->
        <h1 id="about us">درباره ما</h1>
        <hr width="150px">
        <ul style="list-style:circle;list-style-position: inside;font-size: 15px;">
            <li> هدف از ایجاد این وبگاه ایجاد بستر مناسب برای خرید و فروش کتابهای نو و دست دوم به قیمت مناسب می باشد.
            </li>
            <li>
                این وبگاه توسط میلاد مجلسی برای درس مباحث ویژه 2 تهیه و تولید شده است.
            </li>
        </ul>
        <br>
    </div>

    <script type="text/javascript">
        var slideIndex = 0;
        var flag = false;
        showSlides(slideIndex);

        function changeSlides(n) {
            flag = true;
            showSlides(n);
        }

        function showSlides(n2) {
            var i;
            var slides = document.getElementsByClassName("SlideShow");
            if (flag == false) {
                slideIndex++;
            } else {
                slideIndex += n2;
            }
            if (slideIndex > slides.length || slideIndex < 1) {
                slideIndex = 1;
            }
            document.getElementById("numbertext").innerHTML = slideIndex + "/" + slides.length;
            for (i = 0; i < slides.length; i++) {
                if (i == (slideIndex - 1))
                    slides[slideIndex - 1].style.display = "block";
                else
                    slides[i].style.display = "none";
            }
            if (flag == false)
                setTimeout(showSlides, 7000);
            flag = false;
        }
    </script>

@endsection
