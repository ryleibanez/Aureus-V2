@extends('includes.layout')
@section('title', 'Product Page')
@section('content')

<style>
    #ProductImg {
        transition: transform 0.5s;
    }

    #ProductImg:hover {
        transform: scale(1.2);
        z-index: 2;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $(".small-img").hover(function() {
            var smallImgSrc = $(this).attr("src");
            $("#ProductImg").attr("src", smallImgSrc);
        });
    });
</script>


    @foreach ($pd as $items)
        <!-- Single Products -->
        <div class="small-container single-product">
            <div class="row1">
                <div class="col-2" id="ProductImgContainer">
                    <img src="{{ asset($items->image) }}" width="100%" id="ProductImg">
                    <div id="ProductImgSquare"></div>
                
                    <div class="small-img-row" style="margin: auto;">
                        @foreach($imgDecode as $item)
                        <div class="small-img-col">
                            <img src="{{$item}}" style="width: 80px; height: 80px;" class="small-img">
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-2">
                    <p>{{ $items->category }}</p>
                    <h1>{{ $items->pdname }}</h1>
                    <h4>PHP {{ number_format($items->price, 2, '.', ',') }}</h4>
                    <p style="font-weight: bold">Stocks: {{ $items->stocks }}</p>
                    @auth
                        @if ($items->stocks > 0)
                            <a class="btn" style="cursor: pointer;" onclick="addtocart('{{ $items->id }}')">Add To Cart</a>
                        @endif
                    @endauth
                    @if ($items->stocks > 0)
                        <a onclick="createbuy({{ $items->id }});" style="cursor: pointer;" class="btn">Buy Now</a>
                        @else
                        <p style="color: red; font-weight: bold">Out of Stock</p>
                    @endif
                    <h3>Product Details <i class="fa fa-indent"></i></h3>
                    <br>

                    <p>{!! $items->description !!}</p>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        function createbuy(id) {
            fetch('/createbuy?id=' + id)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        window.location.href = "/buynow?id=" + id;
                    } else {

                    }



                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        function addtocart(id) {
            fetch('/addtocart?id=' + id)
                .then(response => response.json())
                .then(data => {
                    var cart = data.status;
                    var update = data.updatestatus;

                    if (cart == 'success') {
                        Toastify({
                            text: "Product Has Been Successfully Added to Cart!",
                            duration: 3000,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                    }
                    if (update == 'success') {
                        Toastify({
                            text: "Product Information Updated from Cart!",
                            duration: 3000,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                    }

                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }
    </script>
@endsection
