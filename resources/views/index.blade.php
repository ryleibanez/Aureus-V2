@extends('includes.layout')
@section('title', 'Home Page');
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    /* Add any additional styles here */
    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide img {
        width: 100%;
        height: auto;
    }

    
</style>
@section('slider')
    <div class="row1">
        <div class="col-2">
            <h1>Feel elegant with our <br>luxury perfumes</h1>
            <p>Discover our offered luxury fragrances from well-known and trusted brands.
            </p>
            <a href="/products" class="btn">Explore Now &#8594;</a>


        </div>

        <div class="col-2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="images/main-slider/img1.png" alt="Perfume 1"></div>
                    <div class="swiper-slide"><img src="images/main-slider/img2.png" alt="Perfume 2"></div>
                    <div class="swiper-slide"><img src="images/main-slider/img3.png" alt="Perfume 3"></div>
                    <div class="swiper-slide"><img src="images/main-slider/img4.png" alt="Perfume 4"></div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
<!-- Feadtued Categories -->
@section('content')


    <div class="categories">
        <div class="small-container">
            <h2 class="title">Categories</h2>
            <div class="row1">

                <div class="col-4">

                    <a href="{{ url('/categoryProduct?search=Men') }}">
                        <img src="images/men.png">
                    </a>

                </div>

                <div class="col-4">
                    <a href="{{ url('categoryProduct?search=Women') }}">
                        <img src="images/women.png">
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ url('categoryProduct?search=Unisex') }}">
                        <img src="images/unisex.png">
                    </a>
                </div>

            </div>
        </div>
    </div>


    <!-- Featured Products -->

    <div class="small-container">
        <h2 class="title">Featured Products</h2>

        <div class="row1">
            @foreach ($product as $pd)
                <div class="col-4">
                    <a href="{{ URL('/viewproduct?id=' . $pd->id) }}"><img src="{{ $pd->image }}"
                            style="width: 250px; height: 250px;"></a>
                    <h4>{{ $pd->pdname }}</h4>
                    <h5>{{ $pd->category }}</h5>

                    <p>PHP {{ number_format($pd->price, 2, '.', ',') }}</p>
                    @if ($pd->stocks <= 0)
                        <p style="color: red">Out of Stock</p>
                    @endif
                </div>
            @endforeach

        </div>


    </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0, 
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade', 
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>

    <script>
        var session = "{{ session('errorcheckout') }}";
        var search = "{{ session('search') }}";
        var admin = "{{ session('admincheck') }}";

        if (session) {
            Toastify({
                text: "{{ session('errorcheckout') }}",
                duration: 3000,


                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "Red",
                }
            }).showToast();
        }

        if (search) {
            Toastify({
                text: search,
                duration: 3000,


                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "Red",
                }
            }).showToast();
        }
    </script>
@endsection


<!-- Brands -->
