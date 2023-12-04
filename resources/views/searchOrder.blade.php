@extends('includes.adminlayout')
@section('title', 'Manage Orders')

@section('content')

    <style>
        /* Styles for the popup container */
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Styles for the popup form */
        .popup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
            /* Adjust the width as needed */
        }

        /* Styles for the input field */
        .popup-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Styles for the close button */
        .popup-close {
            text-align: right;
        }
    </style>
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" placeholder="Search Transaction Id" id="search">
        <button class="btn" onclick="searchNow();">Search</button>
    </div>


    <div class="popup-container" id="popupContainer" style="display: none;">
        <div class="popup-form">
            <span class="popup-close" id="closePopup" onclick="closePopup()" style="cursor: pointer;">X</span>
            <label for="deliveryFee">Delivery Fee:</label>
            <input type="number" id="deliveryFee" class="popup-input" required>
            <button id="saveFee" onclick="setDelfee()">Save</button>
        </div>
    </div>

    <div class="popup-container" id="popupContainer1" style="display: none;">
        <div class="popup-form">
            <span class="popup-close" id="closePopup" onclick="closePopup1()" style="cursor: pointer;">X</span>
            <label for="deliveryDate">Delivery Date:</label>
            <input type="date" id="deliveryDate" class="popup-input" required>
            <button id="saveFee" onclick="setDelDate()">Save</button>
        </div>
    </div>
    <!-- Orders Table -->
    <div class="table-container">
        <h2>Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th>Mode of Payment</th>
                    <th>Delivery Date</th>
                    <th>Delivery Fee</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="body">

            </tbody>
            {{-- <tbody>
            <!-- Replace this with dynamic data from your backend -->
            <tr>
                <td>1</td>
                <td>Ryle Ibanez</td>
                <td>Dior Sauvage Eau de

                </td>
                <td>1</td>
                <td>PHP 5,580.00</td>
                <td><button class="btn">Edit</button> <button class="btn">Delete</button></td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody> --}}
        </table>
        <div style="align-content: center">
            @php
                $mode = request()->query('mode');
            @endphp
            {{ $orders->links() }}

        </div>
    </div>





    <!-- javascript -->
    <script>
        function searchNow()
        {
            var search =document.getElementById('search').value;
            window.location.href="/searchOrder?search=" + search;
        }
        
        function delivered(id) {

            fetch('/delivered?id=' + id)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: "Order Has Been Successfully Delivered.",
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        function shipped(id) {

            fetch('/shipped?id=' + id)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: "Order Has Been Successfully Shipped.",
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }
        let currentTransactionId; // To store the current transaction ID

        // Function to open the popup and set the transaction ID
        function openPopup(transactionId) {
            currentTransactionId = transactionId;
            const popupContainer = document.getElementById('popupContainer');
            popupContainer.style.display = 'flex'; // Display as flex to center vertically
        }

        // Function to open the popup and set the transaction ID
        function openPopup1(transactionId) {
            currentTransactionId = transactionId;
            const popupContainer = document.getElementById('popupContainer1');
            popupContainer.style.display = 'flex'; // Display as flex to center vertically
        }



        // Function to close the popup
        function closePopup() {
            const popupContainer = document.getElementById('popupContainer');
            popupContainer.style.display = 'none';
        }

        function closePopup1() {
            const popupContainer = document.getElementById('popupContainer1');
            popupContainer.style.display = 'none';
        }

        function setDelDate() {
            const deliveryDateInput = document.getElementById('deliveryDate');
            const selectedDate = new Date(deliveryDateInput.value);
            const currentDate = new Date();

            if (selectedDate < currentDate) {
                // The selected date is in the past
                alert("Please select a date that is today or in the future.");
                return;
            }
            const deliveryDate = deliveryDateInput.value;
            // Use the currentTransactionId and deliveryFee as needed, e.g., for further processing or sending to a server.
            fetch('/setDeliveryDate?id=' + currentTransactionId + "&date=" + deliveryDate)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: "Delivery Date Has Been Set Successfully.",
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });

            closePopup1(); // Close the popup after saving
        }
        // Function to set the delivery fee
        function setDelfee() {
            const deliveryFeeInput = document.getElementById('deliveryFee');
            const deliveryFee = deliveryFeeInput.value;
            // Use the currentTransactionId and deliveryFee as needed, e.g., for further processing or sending to a server.
            fetch('/setDeliveryFee?id=' + currentTransactionId + "&fee=" + deliveryFee)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: "Delivery Fee Has Been Set Successfully.",
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });

            closePopup(); // Close the popup after saving
        }

        function cancelOrder(id) {
            fetch('/cancelAdminOrder?id=' + id)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: check,
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
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });

        }
        var page = "{{ request()->query('page') }}"
        var search = "{{request()->query('search')}}"
        function updateInfo() {
            fetch('/viewsearchOrder?page=' + page + "&search=" + search)
                .then(response => response.text())
                .then(data => {

                    document.getElementById('body').innerHTML = data;

                    // window.location.reload();
                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });

        }

        updateInfo();
        setInterval(updateInfo, 2000);
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
