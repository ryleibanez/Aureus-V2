@extends('includes.layout')
@section('title', 'My Address')
@section('content')

    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>


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
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">My Address</h1>
                                                <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                href="{{ route('addAddress') }}">+ New Address</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                        <div class="dash__table-2-wrap gl-scroll">
                                            <table class="dash__table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Full Name</th>
                                                        <th>Address</th>
                                                        <th>Region</th>
                                                        <th>Phone Number</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($main as $item)
                                                    <tr>
                                                        <td>

                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                href="{{ route('editaddress') }}">Edit</a>
                                                        </td>
                                                        <td>{{ $item->fname }} {{ $item->lname }} </td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ $item->country }}</td>
                                                        <td>{{ $item->mobilenumber }}</td>

                                                    </tr>
                                                    @endforeach
                                                    @foreach($address as $item)
                                                    <tr>
                                                        <td>

                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                onclick="defaultAddress('{{$item->id}}')">Default Address</a>
                                                                <br>
                                                                <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                                href="{{ route('editaddress') }}">Edit</a>
                                                                <br>
                                                                <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                                               onclick="deleteAddress('{{$item->id}}')">Delete</a>
                                                        </td>
                                                        <td>{{ auth()->user()->fname }} {{ auth()->user()->lname }} </td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ $item->country }}</td>
                                                        <td></td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

        <br><br>

    </div>
    <!--====== End - Main App ======-->


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
        var session = "{{ session('status') }}";
        var addSession = "{{session('statusAdd')}}";

        function deleteAddress(id) {
            fetch('/manageAddress?id=' + id + '&mode=Delete')
                .then(response => response.json())
                .then(data => {
                    var action = data.status;
                  

                    if (action == 'success') {
                        Toastify({
                            text: "Deleted Successfully!",
                            duration: 3000,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();

                        window.location.reload();
                    }

                    

                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        function defaultAddress(id) {
            fetch('/manageAddress?id=' + id + '&mode=Default')
                .then(response => response.json())
                .then(data => {
                    var action = data.status;
                  

                    if (action == 'success') {
                        Toastify({
                            text: "Action Has Been Made Successfully!",
                            duration: 3000,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();

                        window.location.reload();
                    }

                    

                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }


        if(addSession){
            Toastify({
                text: "Address Has Been Added Successfully!",
                duration: 3000,
                
                
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();  
        }

        if (session) {
            Toastify({
                text: "Address Updated Successfully!",
                duration: 3000,
                
                
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        }

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
