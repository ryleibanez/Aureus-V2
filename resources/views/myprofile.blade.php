@extends('includes.layout')
@section('title', 'My Profile')

@section('content')




    <!--====== Main App ======-->
    <div id="app">




        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->

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
                                            <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Look all your info, you could customize your
                                                profile.</span>
                                            <div class="row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>

                                                    <span class="dash__text">{{ auth()->user()->fname }}
                                                        {{ auth()->user()->lname }}</span>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                    <span class="dash__text">{{ auth()->user()->email }}</span>
                                                    <div class="dash__link dash__link--secondary">

                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                    <span class="dash__text">{{ auth()->user()->mobilenumber }}</span>
                                                    <div class="dash__link dash__link--secondary">

                                                    </div>
                                                </div>




                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="u-s-m-b-16">

                                                        <a class="dash__custom-link btn--e-transparent-brand-b-2"
                                                            href="{{ route('editProfile') }}">Edit Profile</a>
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
            var checker = "{{session('success')}}";

            if(checker){
            Toastify({
                text: "User Information Updated Successfully!",
                duration: 3000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        }
        </script>
        <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @endsection
