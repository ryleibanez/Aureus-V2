<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="images/favicon.png" rel="shortcut icon">
        <title>My Profile | Aureus</title>
    
        <!--====== Google Font ======-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    
        <!--====== Vendor Css ======-->
        <link rel="stylesheet" href="css2/css/vendor.css">
    
        <!--====== Utility-Spacing ======-->
        <link rel="stylesheet" href="css2/css/utility.css">
        <link rel="stylesheet" href="style.css">
    
        <!--====== App ======-->
        <link rel="stylesheet" href="css2/css/app.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
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
            content: '\f0d7'; /* Angle down icon (Font Awesome) */
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
    </head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <div class="container1">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/main-logo/header-logo.png" alt="logo" style="width: 150px !important;"></a>
                </div>
                
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="category.html">Categories</a></li>
                        <li><a href="about.html">About</a></li>
                        
                        <li>
                            <a href="account.html"  >Account</a>
                         
                        </li>
                        <li>
                            <a href="signin.html"  >Login</a>
                         
                        </li>
                    </ul>
                </nav>
                
                <div class="search-icon" onclick="openSearchOverlay()">
                    <a href="#">
                    <i class="fas fa-search search-icon"></i>
                </a>
                </div>
                
                <div class="search-overlay" id="searchOverlay" onclick="closeSearchOverlay()">
                   <form method="get" action="productsearch.html">
                    <div class="search-box" onclick="event.stopPropagation();">
                        
                        <input type="text" placeholder="Search..." name="search">
                        &nbsp;<i class="fas fa-search search-icon"></i>
                    </div>
                </form>
                </div>
                <a href="cart.html" class="cart-icon">
                    <img src="images/cart.png" width="30px" height="30px">
                    <span class="cart-count">5</span> <!-- Replace '5' with the actual cart count -->
                </a>
               
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about">
                                    <div class="about__container">
                                        <div class="about__info">
                                            <h2 class="about__h2">Welcome to Aureus Luxury Perfumes <br> Your Online Destination for Luxury Scents!</h2>
                                            <br><br>
                                            <div class="about__p-wrap">
                                                <strong>Our Essence</strong>
                                                <p class="about__p">At Aureus Luxury Perfumes, we're all about connecting you with the essence of elegance. Our digital platform is dedicated to bringing you the world's most exquisite fragrances, carefully curated to inspire moments of opulence and allure.</p>

                                                <br>
                                                <strong>Our Collection</strong>
                                                <p class="about__p">Step into our virtual boutique, where you'll discover a handpicked selection of renowned perfume brands. From timeless classics to modern marvels, our collection is a celebration of luxury and sophistication.</p>
                                                <br>
                                                <strong>Authenticity Assured</strong>
                                                <p class="about__p">Shop with confidence, knowing that every fragrance you receive is authentic and of the highest quality. Our commitment to sourcing directly from original manufacturers ensures a genuine experience.</p>
                                                <br>
                                                <strong>Elevated Experience</strong>
                                                <p class="about__p">Indulge in the luxury of boutique shopping from the comfort of your own space. Our user-friendly interface and comprehensive product information simplify your journey to finding the perfect scent.</p>
                                                <br>
                                                <strong>Personalized Service</strong>
                                                <p class="about__p">Your satisfaction is paramount. Our dedicated customer support team is here to assist you, ensuring a personalized experience that matches the luxury of our fragrances.</p>
                                                <br>
                                                <strong>Join Our Journey</strong>
                                                <p class="about__p">Step into the world of Aureus Luxury Perfumes – where luxury scents await. Let us accompany you on a fragrant exploration that defines moments and leaves a lasting impression.</p>

                                                
                                            </div>

                                            

                                            <a class="about__link btn--e-secondary" href="index.html" target="_blank">Shop Now</a>
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


        <!--====== Main Footer ======-->
        <div class="footer">
            <div class="container1">
                <div class="row1">
                   
                    <div class="footer-col-2">
                        <img src="images/main-logo/header-logo.png">
                        
                    </div>
                    
                    
                </div>
                <hr>
                <p class="copyright">Copyright 2023 - Group 1 - 4ITD</p>
            </div>
        </div>
    </div>
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
</body>
</html>