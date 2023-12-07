@extends('includes.layout')
@section('title', 'Buy Now')

@section('content')
    @php
        $totalPrice = 0;
    @endphp




    <br><br><br><br><br><br>
    <!-- Cart items details -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @foreach ($checkOrder as $item)
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="{{$item->pdimage}}">
                            <div>
                                <p id="price">{{ $item->pdname }}</p>
                                <small>Price: PHP {{ number_format($item->price, 2, '.', ',') }}</small>
                                <br>

                            </div>
                        </div>
                    </td>
                    <td><input type="text" value="{{ $item->quantity }}" id="quantity" name="quantity"
                            onchange="changeValues('{{ $item->price }}','{{ $stocks }}', '{{ $item->id }}')"></td>
                    <td>PHP {{ number_format($item->price * $item->quantity, 2, '.', ',') }}</td>
                </tr>
            @endforeach

        </table>
        <div class="total-price">
            <table>


                <tr>
                    <td>Total</td>
                    <td id="totalprice">PHP {{ number_format($item->price * $item->quantity, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td>Delivery Fee</td>
                    <td id="totalprice">@if($item->deliveryfee == "" || $item->deliveryfee == null) Pending @else PHP {{$item->deliveryfee}} @endif</td>
                </tr>
            </table>

        </div>
        <a href="{{ route('checkoutOrder') }}" class="btn">Proceed to Checkout &#8594;</a>
    </div>



    <!-- javascript -->

    <script>
        function changeValues(price, stocks, id) {
            const totalPriceElement = document.getElementById("totalprice");
            const inputElement = document.getElementById("quantity");


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


                fetch('/updateQuantity?id=' + id + "&quantity=" + quantity + "&price=" + price)
                    .then(response => response.json())
                    .then(data => {

                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Error fetching cart count:', error);
                    });



            } else {
                inputElement.value = "1";
            }


        }

        function checkForUpdate() {
            fetch('/checkForOrderUpdate')
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
    </script>

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
