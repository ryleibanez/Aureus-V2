@extends('includes.layout')
@section('title', 'My Orders')
@section('content')




    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

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
                                            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                            <span class="dash__text u-s-m-b-30">Here you can see all products that have
                                                been delivered.</span>
                                            <div class="m-order__select-wrapper">

                                                <label class="u-s-m-r-8" for="my-order-sort">Show:</label><select
                                                    class="select-box select-box--primary-style" id="filter-order">
                                                    <option value="{{URL('/myorders?filter=All')}}" @if($filter === "All") selected @endif>All Orders</option>
                                                    <option value="{{URL('/myorders?filter=Pending')}}" @if($filter === "Pending") selected @endif>Pending</option>
                                                    <option value="{{URL('/myorders?filter=Processing')}}" @if($filter === "Processing") selected @endif>Processing</option>
                                                    <option value="{{URL('/myorders?filter=Shipped')}}" @if($filter === "Shipped") selected @endif>Shipped</option>
                                                    <option value="{{URL('/myorders?filter=Delivered')}}" @if($filter === "Delivered") selected @endif>Delivered</option>
                                                    <option value="{{URL('/myorders?filter=Cancelled')}}" @if($filter === "Cancelled") selected @endif>Cancelled</option>
                                                </select>
                                            </div>
                                            <div class="m-order__list" id="s">



                                                @if ($orders->count() > 0)

                                                    @foreach ($orders->groupBy('transactionid') as $transactionid => $items)
                                                        <div class="m-order__get">
                                                            <div class="manage-o__header u-s-m-b-30"
                                                                @if ($items[0]->orderstatus === 'Pending') style="display: flex; justify-content: space-between; align-items: center;" @endif>
                                                                <div class="dash-l-r">
                                                                    <div>
                                                                        <div class="manage-o__text-2 u-c-secondary">Order
                                                                            #{{ $transactionid }}</div>
                                                                        <div class="manage-o__text u-c-silver">Placed on
                                                                            {{ $items[0]->created_at }}</div>
                                                                        <div
                                                                            style="font-weight: bold; color: black; font-size: 0.">
                                                                            Total Price: PHP
                                                                            {{ number_format($items[0]->totalprice, 2, '.', ',') }}
                                                                        </div>

                                                                        <span
                                                                            class="manage-o__badge badge--delivered">{{ $items[0]->orderstatus }}</span>
                                                                    </div>

                                                                </div>
                                                                @if ($items[0]->orderstatus === 'Pending')
                                                                    <button class="btn btn--e-brand-b-2"
                                                                        style="margin-left: auto"
                                                                        onclick="cancelOrder('{{ $transactionid }}')">Cancel</button>
                                                                @endif
                                                                {{-- <div>
                                                                    <span class="btn btn--e-brand-b-2"
                                                                        style="margin-left: auto">Cancel</span>
                                                                </div> --}}
                                                            </div>

                                                            @foreach ($items as $pd)
                                                                <div class="manage-o__description">
                                                                    <div class="description__container">
                                                                        <div class="description__img-wrap">

                                                                            <img class="u-img-fluid"
                                                                                src="{{ $pd->pdimage }}" alt="">
                                                                        </div>
                                                                        <div class="description-title">{{ $pd->pdname }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="description__info-wrap">

                                                                        <div>

                                                                            <span
                                                                                class="manage-o__text-2 u-c-silver">Quantity:

                                                                                <span
                                                                                    class="manage-o__text-2 u-c-secondary">{{ $pd->quantity }}</span></span>
                                                                        </div>
                                                                        <div>

                                                                            <span class="manage-o__text-2 u-c-silver">Price:

                                                                                <span
                                                                                    class="manage-o__text-2 u-c-secondary">
                                                                                    PHP
                                                                                    {{ number_format($pd->price, 2, '.', ',') }}</span></span>
                                                                        </div>
                                                                        <div>

                                                                            <span class="manage-o__text-2 u-c-silver">Mode
                                                                                of Delivery:

                                                                                <span
                                                                                    class="manage-o__text-2 u-c-secondary">
                                                                                    Cash on Delivery</span></span>
                                                                        </div>
                                                                        <div>

                                                                            <span
                                                                                class="manage-o__text-2 u-c-silver">Delivery
                                                                                Fee:

                                                                                <span
                                                                                    class="manage-o__text-2 u-c-secondary">
                                                                                    @if ($pd->deliveryfee == '' || $pd->deliveryfee == null)
                                                                                        Pending
                                                                                    @else
                                                                                        PHP
                                                                                        {{ number_format($pd->deliveryfee, 2, '.', ',') }}
                                                                                    @endif
                                                                                </span></span>
                                                                        </div>

                                                                        <div>

                                                                            <span
                                                                                class="manage-o__text-2 u-c-silver">Delivery
                                                                                Date:

                                                                                <span
                                                                                    class="manage-o__text-2 u-c-secondary">
                                                                                    @if ($pd->deliverydate == '' || $pd->deliverydate == null)
                                                                                        Pending
                                                                                    @else
                                                                                        
                                                                                        {{ $pd->deliverydate}}
                                                                                    @endif
                                                                                </span></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                    <div>
                                                        <p> {{ $orders->links() }}</p>
                                                    </div>

                                                @endif








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



    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        const selectBox = document.getElementById('filter-order');
        selectBox.addEventListener('change', function() {
            const selectedValue = selectBox.value;
            window.location.href = selectedValue;
        });
        var session = "{{ session('ordersuccess') }}";
        var cancelSuccess = "{{ session('cancel') }}"


        if (session) {
            Toastify({
                text: "Order Created Successfully!",
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

        if (cancelSuccess) {
            Toastify({
                text: cancelSuccess,
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

       
        

        function cancelOrder(id) {
            fetch('/cancelOrder?id=' + id)
                .then(response => response.json())
                .then(data => {


                    if (data.status === 'success') {
                        window.location.reload();
                    } else {
                        Toastify({
                            text: "An Error Has Occurred. Please Try Again Later.",
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        function updateOrders() {
            fetch('/updateDisplayOrder')
                .then(response => response.json())
                .then(data => {
                    
                    var check = data.status

                    if (check) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }
        
        setInterval(updateOrders, 2000);

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
