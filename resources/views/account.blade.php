@extends('includes.layout')

@section('title', 'My Account')

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="css2/images/preloader.png" alt="">
        </div>
    </div>



    @section('content')
        <!--====== Main App ======-->
        <div id="app">
            <!--====== App Content ======-->
            <div class="app-content">
                <!--====== Section 1 ======-->
                <div class="u-s-p-y-60">


                </div>
                <!--====== End - Section 1 ======-->


                <!--====== Section 2 ======-->
                <div class="u-s-p-b-60">

                    <!--====== Section Content ======-->
                    <div class="section__content">
                        <div class="dash">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">

                                        <!--====== Dashboard Features ======-->
                                        @include('includes.dashmenu')

                                        <!--====== End - Dashboard Features ======-->
                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <div
                                            class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                            <div class="dash__pad-2">
                                                <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>

                                                <span class="dash__text u-s-m-b-30">From your My Account Dashboard you have
                                                    the ability to view a snapshot of your recent account activity and
                                                    update your account information. Select a link below to view or edit
                                                    information.</span>
                                                <div class="row">
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div
                                                            class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                            <div class="dash__pad-3">
                                                                <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                                <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                                    <a href="{{route('editProfile')}}">Edit</a>
                                                                </div>

                                                                <span class="dash__text">{{ auth()->user()->fname }}
                                                                    {{ auth()->user()->lname }}</span>

                                                                <span class="dash__text">{{ auth()->user()->email }}</span>
                                                                <div class="dash__link dash__link--secondary u-s-m-t-8">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div
                                                            class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                            <div class="dash__pad-3">
                                                                <h2 class="dash__h2 u-s-m-b-8">ADDRESS</h2>

                                                                <span class="dash__text-2 u-s-m-b-8">Default Shipping
                                                                    Address</span>
                                                                <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                                    <a href="{{route('editaddress')}}">Edit</a>
                                                                </div>

                                                                <span
                                                                    class="dash__text">{{ auth()->user()->address }}</span>

                                                                <span
                                                                    class="dash__text">(+63){{ auth()->user()->mobilenumber }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Section Content ======-->
                </div>
                <!--====== End - Section 2 ======-->
            </div>
            <!--====== End - App Content ======-->


            <script>
                window.ga = function() {
                    ga.q.push(arguments)
                };
                ga.q = [];
                ga.l = +new Date;
                ga('create', 'UA-XXXXX-Y', 'auto');
                ga('send', 'pageview')
            </script>
            <script src="https://www.google-analytics.com/analytics.js" async defer></script>

            <!--====== Vendor Js ======-->
            <script src="css2/js/vendor.js"></script>

            <!--====== jQuery Shopnav plugin ======-->
            <script src="css2/js/jquery.shopnav.js"></script>

            <!--====== App ======-->
            <script src="css2/js/app.js"></script>
            <!-- javascript -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const accountDropdown = document.getElementById('accountDropdown');
                    const accountDropdownMenu = accountDropdown.nextElementSibling;

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
            </script>
        @endsection
