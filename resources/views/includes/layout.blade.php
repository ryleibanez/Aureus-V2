<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aureus | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if (request()->is(['myaccount', 'myprofile', 'editprofile', 'myaddress', 'editaddress', 'myorders', 'addAddress']))
        <!--====== Google Font ======-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

        <!--====== Vendor Css ======-->
        <link rel="stylesheet" href="{{ asset('css2/css/vendor.css') }}">

        <!--====== Utility-Spacing ======-->
        <link rel="stylesheet" href="css2/css/utility.css">
        <link rel="stylesheet" href="css2/css/app.css">
    @endif

    @if (request()->is(['checkout', 'checkoutorder', 'cartcheckout']))
        <!-- Google Fonts for Banners only -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <!-- Ion-Icons 4 -->
        <link rel="stylesheet" href="css/ionicons.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- Owl-Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Jquery-Ui-Range-Slider -->
        <link rel="stylesheet" href="css/jquery-ui-range-slider.min.css">
        <!-- Utility -->
        <link rel="stylesheet" href="css/utility.css">
        <!-- Main -->
        <link rel="stylesheet" href="css/bundle.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" />
    @endif
    <style>
        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        .search-container button {
            border: none;
            background-color: #f77f00;
            color: #fff;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-toggle::after {
            content: '\f0d7';
            /* Angle down icon (Font Awesome) */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            margin-left: 5px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .show {
            display: block;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .logo img {
            width: 125px;
            height: auto;
        }


        .menu-icon {
            cursor: pointer;
        }



        .search-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
            z-index: 1001;
        }

        .search-box {
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
        }

        .search-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .search-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }



        .cart-icon {
            position: relative;
            display: inline-block;
        }

        .cart-icon img {
            width: 30px;
            height: 30px;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #bd9a35;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            text-align: center;
            line-height: 20px;
        }
    </style>

    <style>
        .toast-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 1000;
            /* Set a high z-index value */
        }

        .menu-home {
            align-content: center;
            list-style-type: none;
            margin-bottom: 1.15rem;
            padding: 0;

            align-items: center;
        }

        .toast {
            max-width: 350px;
            background-color: #343a40;
            color: #fff;
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 15px;
            display: none;
            z-index: 1000;
            /* Set a high z-index value */
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .toast.show {
            display: block;
            opacity: 1;
        }

        .toast-header {
            display: flex;
            align-items: center;
        }

        .toast-header img {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .toast-header strong {
            margin-right: auto;
        }

        .toast-header button {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            margin-top: -5px;
        }

        .toast-body {
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .col-2 {
                margin-top: 4rem;
                align-items: center;
                display: block;
            }

            .row1 {

                text-align: center;
            }
        }
    </style>

</head>

<body>

    <button type="button" class="btn btn-primary" id="myButton" onclick="playAudio()"
        style="display: none;">Button</button>
    @if (request()->is(['checkout', 'checkoutorder', 'cartcheckout']))
    @else
        {{-- @include('includes.navbar') --}}
        <div class="header">
            <div class="container1">
                <div class="navbar">

                    <div class="logo">
                        <a href="/"><img src="{{ asset('images/main-logo/header-logo.png') }}" alt="logo"
                                style="width: 100px !important;"></a>
                    </div>

                    <nav>
                        <div @if (request()->is(['/', 'homepage', 'index', 'myaccount', 'categoryProduct', 'searchProduct'])) class="menu-home" @endif>
                            <ul id="MenuItems" style="">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('products') }}">Products</a></li>
                                <li><a href="{{ route('category') }}">Categories</a></li>
                                <li><a href="{{ route('about') }}">About us</a></li>

                                @auth
                                    <li>
                                        <a href="{{ route('myaccount') }}">Account</a>

                                    </li>
                                @endauth
                                @auth


                                    <li>
                                        <a>Hi, {{ auth()->user()->fname }}</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">Logout</a>

                                    </li>
                                @else
                                    <li>
                                        <a href="{{ Route('signin') }}">Login</a>

                                    </li>
                                @endauth

                            </ul>
                        </div>
                    </nav>

                    <div class="search-icon" onclick="openSearchOverlay()">
                        <a href="#">
                            <i class="fas fa-search search-icon"></i>
                        </a>
                    </div>

                    <div class="search-overlay" id="searchOverlay" onclick="closeSearchOverlay()">
                        <form method="get" action="{{ URL('/searchProduct') }}">
                            <div class="search-box" onclick="event.stopPropagation();">

                                <input type="text" placeholder="Search..." name="search">
                                &nbsp;<i class="fas fa-search search-icon"></i>
                            </div>
                        </form>
                    </div>
                    @auth
                        <div id="view-cart">
                            <a href="{{ route('mycart') }}" class="cart-icon">
                                <img src="{{ asset('images/cart.png') }}" width="30px" height="30px">
                                <span class="cart-count"></span> <!-- Replace '5' with the actual cart count -->
                            </a>
                        </div>
                    @endauth

                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
                </div>
                @yield('slider')


            </div>
        </div>
    @endif

    <!-- Feadtued Categories -->
    @yield('content')





    <!-- Brands -->



    <!-- Footer -->
    <div class="footer">
        <div class="container1">
            <div class="row1">

                <div class="footer-col-2">
                    <img src="{{ asset('images/main-logo/header-logo.png') }}">

                </div>


            </div>
            <hr>
            <p class="copyright">Copyright 2023 - Group 1 - 4ITD</p>
        </div>
    </div>

    <!-- javascript -->
    <script>
        async function fetchAndHandleErrors(endpoint, interval) {
            try {
                const response = await fetch(endpoint);
                if (!response.ok) {
                    throw new Error(`Error occurred while fetching ${endpoint}`);
                }
            } catch (error) {
                console.error(error);
                // Handle errors
            }
        }

        function checkUsers() {
            fetchAndHandleErrors("/checkCartStock", 5000);
        }

        function checkOrders() {
            fetchAndHandleErrors("/checkBuyStocks", 5000);
        }

        function playAudio() {
            var audio = new Audio('resources/notification.mp3');
            audio.play();
        }

        function checkNotif() {

            fetch('/checkNotif')
                .then(response => response.json())
                .then(data => {
                    if (data.notifMsg !== null) {
                        console.log('Received data:', data);
                        document.getElementById('myButton').click();
                        Toastify({
                            text: "Notification \n\n" + data.notifMsg,
                            duration: 5000,
                            close: false,
                            gravity: "top",
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: "rgba(247,241,241, 0.9)", // Using rgba for translucency
                                color: "black",
                                borderRadius: "0.25rem",
                                boxShadow: "0 0.5rem 1rem rgba(0, 0, 0, 0.15)",
                                textAlign: "center",
                                width: "350px",
                                maxWidth: "100%",
                                overflow: "hidden", // Hide overflow to prevent content from spilling out
                            },
                            title: {
                                text: "Title",
                                color: "#fff",
                                background: "black", // Background color for the title bar
                                padding: "10px",
                                fontSize: "18px",
                                fontWeight: "bold",
                            },
                            message: {
                                padding: "15px",
                            }
                        }).showToast();




                    } else {
                        console.log('No more notifications');
                    }
                })
                .catch(error => {
                    console.error('Error fetching notification:', error);
                });
        }



        setInterval(checkUsers, 1500);

        setInterval(checkNotif, 1500);

        setInterval(checkOrders, 1500);


        document.addEventListener('DOMContentLoaded', function() {
            const accountDropdown = document.getElementById('accountDropdown');
            const accountDropdownMenu = accountDropdown.nextElementSibling;
            updateCartCount();
            // Function to open the dropdown
            function openDropdown() {
                accountDropdownMenu.classList.add('show');
            }

            // Function to close the dropdown
            function closeDropdown() {
                accountDropdownMenu.classList.remove('show');
            }

            // Click event listener
            accountDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                if (accountDropdownMenu.classList.contains('show')) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            });

            // Hover event listeners
            accountDropdown.addEventListener('mouseenter', openDropdown);
            accountDropdownMenu.addEventListener('mouseleave', closeDropdown);

            // Close the dropdown if clicked outside
            document.addEventListener('click', function(e) {
                if (!accountDropdownMenu.contains(e.target) && !accountDropdown.contains(e.target)) {
                    closeDropdown();
                }
            });
        });

        function updateCartCount() {
            fetch('{{ route('getCartCount') }}')
                .then(response => response.json())
                .then(data => {
                    const cartCount = data.cartCount;
                    const cartCountElement = document.querySelector('.cart-count');

                    if (cartCountElement) {
                        cartCountElement.textContent = cartCount;
                    }
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        // You can call this function to update the cart count when needed
        setInterval(updateCartCount, 2000);
    </script>

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "300px"
            } else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
    <script>
        function openSearchOverlay() {
            document.getElementById("searchOverlay").style.display = "flex";
        }

        function closeSearchOverlay() {
            document.getElementById("searchOverlay").style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', function() {
            var toast = document.querySelector('.toast');
            var closeButton = toast.querySelector('.close');

            closeButton.addEventListener('click', function() {
                toast.classList.remove('show');
            });

            setTimeout(function() {
                toast.classList.add('show');
            }, 1000);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
