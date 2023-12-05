@extends('includes.layout')
@section('title', 'Cart')
@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .small-container {
        min-height: 44%;
        display: justify;
        flex-direction: column;
        justify-content: space-between;
    }

    </style>
<br><br><br><br><br><br>
<!-- Cart items details -->
<div class="small-container cart-page">
    @php
    $empty = true;

    @endphp




    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @php
        $cartcheck = \App\Models\Cart::where('email', auth()->user()->email)->first();
        @endphp




        @foreach ($cart as $item)
        @php
        $product = \App\Models\Products::find($item->product_id);
        $cartCheck = \App\Models\Cart::where('email', auth()->user()->email)->first();
        @endphp

        @if ($cartCheck)
        <tr>
            <td>
                <div class="cart-info">
                    <img src="{{ $item->pdImage }}" alt="{{ $item->pdname }}">
                    <div>
                        <p>{{ $item->pdname }}</p>
                        <small>Price: PHP {{ number_format($item->price, 2, '.', ',') }}</small>
                        <br>
                        <a onclick="removeCart('{{ $item->id }}')" style="cursor: pointer">Remove</a>
                    </div>
                </div>
            </td>
            <td>
                <input type="text" value="{{ $item->quantity }}" id="quantity_{{ $item->id }}" name="quantity"
                    onchange="changeValues('{{ $item->price }}','{{ $product->stocks }}', '{{ $item->id }}')">
            </td>
            <td>PHP {{ number_format($item->price * $item->quantity, 2, '.', ',') }}</td>
        </tr>
        @endif
        @endforeach



    </table>

    @if ($cartcheck)
    @else
    <div style="margin: auto">
        <span style="margin: auto; text-align: center">No Items Found in your Cart.</span>
    </div>
    @endif


    @if ($cartcheck)
    <div class="total-price">
        <table>


            <tr>
                <td>Total</td>
                <td>PHP {{ number_format($totalprice, 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td>Delivery Fee</td>
                <td id="totalprice">Pending</td>
            </tr>
        </table>

    </div>
    @else
    <div class="total-price">
    </div>
    <br><br><br><br>
    @endif

    @if ($cartcheck)
    <a style="cursor: pointer" class="btn" href="{{route('cartcheckout')}}">Proceed to Checkout &#8594;</a>
    <a style="cursor: pointer" class="btn" onclick="removeAll()">Remove All</a>
    @endif
</div>



<!-- javascript -->
<script>
    var session = "{{ session('status') }}";
    if (session) {
        Toastify({
            text: session,
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

    function checkForUpdate() {
        fetch('/mycartupdate')
            .then(response => response.json())
            .then(data => {
                console.log('Received data:', data);

                if (data.updateAvailable) {
                    window.location.reload();
                }

            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }

    // Periodically check for updates (e.g., every 30 seconds).
    setInterval(checkForUpdate, 1500);

    function removeCart(id) {
        fetch('/removeCart?id=' + id)
            .then(response => response.json())
            .then(data => {
                var check = data.status;

                if (check === "success") {

                    window.location.reload();
                } else {

                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }

    function removeAll() {
        fetch('/removeAll')
            .then(response => response.json())
            .then(data => {
                var check = data.status;

                if (check) {

                    window.location.reload();
                } else {
                    Toastify({
                        text: "There has been an error with your request. Please try again later.",
                        duration: 3000,


                        close: true,
                        gravity: "bottom", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "red",
                        }
                    }).showToast();
                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }

    function changeValues(price, stocks, id) {
        const totalPriceElement = document.getElementById("totalprice");
        const inputElement = document.getElementById("quantity_" + id);


        var inputValue = inputElement.value;

        // Parse the input value as an integer
        var quantity = parseInt(inputValue, 10);


        // Check if the quantity is less than 0, and if so, set it to 0
        if (quantity < 1) {
            inputElement.value = "1"; // Reset the input value to 0
            quantity = 1; // Update the quantity variable to 0


        }

        // Check if the quantity is less than 0, and if so, set it to 0
        if (quantity > stocks) {
            inputElement.value = stocks; // Reset the input value to 0
            quantity = stocks; // Update the quantity variable to 0
        }
        var typingTimer;
        var doneTypingInterval = 1000;
        if (!isNaN(quantity)) {
            // Event listener for keyup event on the input element


            fetch('/updateCart?id=' + id + "&quantity=" + quantity)
                .then(response => response.json())
                .then(data => {
                    Toastify({
                        text: "Please wait!",
                        duration: 3000,


                        close: true,
                        gravity: "bottom", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                    }).showToast();

                    // window.location.reload();
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });



        } else {
            inputElement.value = "1";
        }


    }

    document.addEventListener('DOMContentLoaded', function () {
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
        accountDropdown.addEventListener('click', function (e) {
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
        document.addEventListener('click', function (e) {
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