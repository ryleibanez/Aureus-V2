@extends('includes.layout')
@section('title', 'Home Page');


@section('slider')
    <div class="row1">
        <div class="col-2">
            <h1>Feel elegant with our <br>luxury perfumes</h1>
            <p>Discover our offered luxury fragrances from well-known and trusted brands.
            </p>
            <a href="" class="btn">Explore Now &#8594;</a>


        </div>

        <div class="col-2">
            <img src="images/perfumehome.png">
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
                    <a href="{{ URL('/viewproduct?id=' . $pd->id) }}"><img src="{{ $pd->image }}" style="width: 250px; height: 250px;"></a>
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


    <script>
        
        var session = "{{ session('errorcheckout') }}";
        var search = "{{ session('search') }}";
        var admin = "{{ session ('admincheck')}}";

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
