@extends('includes.layout')
@section('title', 'Edit Profile')
@section('content')

<style>
    .upload-profile-div {

        height: 200px;
        max-height: 200px;
        text-align: center;


    }

    .img-class {

        margin: auto;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        display: block;
    }
</style>
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
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Looks like you haven't update your
                                                profile</span>
                                            <div class="dash__link dash__link--secondary u-s-m-b-30">
                                                <form class="dash-edit-p" id="myForm" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="upload-profile-div" title="Click to Upload New Profile Picture">

                                                    <span style="color:black; font-size: 1rem;">Profile Picture *</span>
                                                    <label for="image-input"><img class="img-class" id="selected-image"
                                                            src="{{ auth()->user()->profilepic }}" /></label>
                                                    <input type="file" id="image-input" name="profilepic" accept="image/jpeg, image/png"
                                                        style="display:none;" onchange="handleImageChange()">

                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-12">
                                                       
                                                            <div class="gl-inline">
                                                                <div class="u-s-m-b-30">

                                                                    <label class="gl-label" for="reg-fname">FIRST NAME
                                                                        *</label>

                                                                    <input class="input-text input-text--primary-style"
                                                                        type="text" id="reg-fname"
                                                                        placeholder="{{ auth()->user()->fname }}"
                                                                        name="fname" pattern="^[A-Za-z' -]{1,50}$" title="Enter a correct name" required>
                                                                </div>
                                                                <div class="u-s-m-b-30">

                                                                    <label class="gl-label" for="reg-lname">LAST NAME
                                                                        *</label>

                                                                    <input class="input-text input-text--primary-style"
                                                                        type="text" id="reg-lname"
                                                                        placeholder="{{ auth()->user()->lname }}"
                                                                        name="lname" pattern="^[A-Za-z' -]{1,50}$" title="Enter a correct name" required>
                                                                </div>
                                                            </div>
                                                            <div class="gl-inline">

                                                                <div class="u-s-m-b-30">

                                                                    <label class="gl-label"
                                                                        for="gender">GENDER</label><select
                                                                        class="select-box select-box--primary-style u-w-100"
                                                                        id="gender" name="gender" required>
                                                                        <option selected>Select</option>
                                                                        <option value="Male"
                                                                            @if (auth()->user()->gender === 'Male') selected @endif>
                                                                            Male</option>
                                                                        <option value="Female"
                                                                            @if (auth()->user()->gender === 'Female') selected @endif>
                                                                            Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="gl-inline">
                                                                <div class="u-s-m-b-30">
                                                                    <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                                    <span
                                                                        class="dash__text">{{ auth()->user()->email }}</span>
                                                                    <div class="dash__link dash__link--secondary">

                                                                    </div>
                                                                </div>
                                                                <div class="u-s-m-b-30">
                                                                    <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                                    <span class="dash__text">Please enter your
                                                                        mobile</span>
                                                                    <div class="dash__link dash__link--secondary">
                                                                        <input class="input-text input-text--primary-style"
                                                                            type="text" id="reg-lname"
                                                                            placeholder="{{ auth()->user()->mobilenumber }}"
                                                                            name="mobilenumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  pattern="^(\+63|0)[1-9]\d{9}$" minlength="11" maxlength="11" required  title="Enter a correct phone number that is based here in the Philippines.">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p id="invalid" style="display: none;">Incorrect Input! Please
                                                                Try Again.</p>
                                                            <button class="btn btn--e-brand-b-2"
                                                                type="submit">SAVE</button>
                                                        </form>
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


        </div>

        <!--====== Modal Section ======-->


        <!--====== Unsubscribe or Subscribe Newsletter ======-->


        <!--====== Unsubscribe or Subscribe Newsletter ======-->
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->

    <script>
        document.getElementById('myForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('/editprofile', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    var dataUser = data.status;
                    var error = data.errors;
                    if (dataUser === "success") {


                        window.location.replace('/myprofile');
                        document.getElementById('invalid').style.display = "none";

                    } else {
                        Toastify({
                            text: "Invalid Input. Please Try Again!",
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
                    console.error('Error:', error);
                });
        });
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

        function handleImageChange() {
            const input = document.getElementById('image-input');
            const image = document.getElementById('selected-image');

            if (input.files && input.files[0]) {
                const selectedFile = input.files[0];

                // Check if the file type is JPEG or PNG
                if (selectedFile.type === 'image/jpeg' || selectedFile.type === 'image/png') {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        image.src = e.target.result;
                    };

                    reader.readAsDataURL(selectedFile);
                } else {
                    // Display an error message or take appropriate action for invalid file type
                    alert('Please select a valid JPEG or PNG image.');
                    // Reset the file input to clear the invalid selection
                    input.value = '';
                }
            }
        }
    </script>

    <script>
       
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "300px"
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
            }
            else {
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
