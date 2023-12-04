@extends('includes.layout')
@section('title', 'Products')

@section('content')
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
        margin-top: 0;
    }


    .footer {
        padding: 20px;
        text-align: center;
    }
    .categories {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .title {
        
    }

    .centered-content {
        margin-top: 0px;
    }
</style>
            <div class="small-container">
                <div class="categories">
                    <h2 class="title">About us</h2>

                    <div class="centered-content">
                        <p>
                            At Aureus, we're passionate about curating an exquisite collection of perfumes that
                            transcend ordinary fragrances. Our platform is a curated destination for fragrance
                            enthusiasts, offering a meticulously selected range of global brands and artisanal scents.
                        </p>

                        <p>
                            Discover the essence of luxury and individuality as we guide you through a sensory journey
                            to find your perfect fragrance. Join us in exploring the captivating world of perfumery at
                            Aureus Perfume eCommerce.
                        </p>
                    </div>
                    <br>
                    <div class="centered-content">
                        <h3>Contact Us</h3>
                        <p>Thank you for your interest in Aureus Perfume eCommerce. We're here to assist you. Please
                            feel free to reach out to us through any of the following contact methods:</p>

                        <ul>
                            <li>Phone: +639349057437 (Mon-Fri, 9:00 AM - 5:00 PM)</li>
                            <li>Email: aureusperfume@gmail.com</li>
                        </ul>
                    </div>
                </div>


            </div>
            <!--====== End - Section 2 ======-->



<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
<script>
    window.ga = function () {
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