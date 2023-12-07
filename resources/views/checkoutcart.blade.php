@extends('includes.layout')
@section('title', 'checkout')
@section('content')


{{-- <header class="header">
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <div class="logo-wrapper">
                <a href="#" class="logo">
                    <img src="{{asset('images/main-logo/header-logo.png')}}" alt="Your Logo">
                </a>
                
            </div>
        </div>
    </div>
</header> --}}
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .page-checkout {
        flex: 1;
    }

    .footer {
        padding: 20px;
        text-align: center;
    }
    .back-button {
    font-size: 1.2em;
}
</style>

<!-- Checkout-Page -->
<div class="page-checkout u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- First-Accordion -->

                <!-- First-Accordion /- -->
                <!-- Second Accordion -->
                <a href="{{ route('mycart') }}" class="back-button">&#8592; Back</a>

                <br><br><br>
                <!-- Second Accordion /- -->
                <form action="{{ route('checkoutcart.post') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Billing-&-Shipping-Details -->
                        <div class="col-lg-6">
                            <h4 class="section-h4">Billing Details</h4>
                            <!-- Form-Fields -->
                            <div class="group-inline u-s-m-b-13">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="first-name">First Name
                                        <span class="astk"></span>
                                    </label>
                                    <p>{{ auth()->user()->fname }}</p>
                                </div>
                                <div class="group-2">
                                    <label for="last-name">Last Name
                                        <span class="astk"></span>
                                    </label>
                                    <p>{{ auth()->user()->lname }}</p>
                                </div>
                            </div>
                            <div class="u-s-m-b-13">
                                <label for="select-country">Country
                                    <span class="astk"></span>
                                </label>
                                <p>Philippines</p>
                            </div>
                            <div class="street-address u-s-m-b-13">
                                <label for="req-st-address">Address
                                    <span class="astk"></span>
                                </label>
                                <p>{{ auth()->user()->address }}</p>
                            </div>

                            <div class="group-inline u-s-m-b-13">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="email">Email address
                                        <span class="astk"></span>
                                    </label>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                                <div class="group-2">
                                    <label for="phone">Phone
                                        <span class="astk"></span>
                                    </label>
                                    <p>{{ auth()->user()->mobilenumber }}</p>
                                </div>
                            </div>




                        </div>
                        <!-- Billing-&-Shipping-Details /- -->
                        <!-- Checkout -->
                        <div class="col-lg-6">
                            <h4 class="section-h4">Your Order</h4>
                            <div class="order-table">
                                <table class="u-s-m-b-13">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- loop here --}}
                                        @foreach($cartItems as $items)
                                        <tr>
                                            <td>
                                                <h6 class="order-h6">{{ $items->pdname }}</h6>
                                                <span class="order-span-quantity">x {{ $items->quantity }}</span>
                                            </td>
                                            <td>
                                                <h6 class="order-h6">PHP {{ number_format($items->price *
                                                    $items->quantity, 2, '.', ',') }}
                                                </h6>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="u-s-m-b-13">

                                    <label class="label-text" for="cash-on-delivery">Mode of Payment: Cash on
                                        Delivery</label>
                                </div>
                                <div class="u-s-m-b-13">

                                    <label class="label-text" for="cash-on-delivery">Total Price: </label>
                                    <span style="color: black">PHP
                                        {{ number_format($totalPrice, 2, '.', ',') }}</span>
                                </div>



                                <button type="submit" class="button button-outline-secondary">Place Order</button>
                            </div>
                        </div>
                        <!-- Checkout /- -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Checkout-Page /- -->






<!-- javascript -->

<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
        } else {
            MenuItems.style.maxHeight = "0px"
        }
    }
</script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>

@endsection