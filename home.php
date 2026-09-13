<?php
include_once "navbar.php";



// Fetches items from the 'products' table (change 'products' if your database table is named 'items' or 'menu')
$items = $db->select('products');
?>

<style>
    :root {
        --espresso-dark: #3c2415;
        --espresso-hover: #26160b;
        --cream-bg: #f8f5f0;
        --text-dark: #2b1a0e;
        --text-muted: #7a6b61;
    }

    body {
        background-color: var(--cream-bg) !important;
        color: var(--text-dark);
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    }

    .navbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #eae3d9;
    }

    .nav-link {
        color: var(--text-dark) !important;
        font-size: 0.95rem;
        transition: color 0.2s ease-in-out;
    }

    .nav-link:hover {
        color: #8c5a36 !important;
    }

    .btn-brown {
        background-color: var(--espresso-dark);
        color: #ffffff;
        border: 1px solid var(--espresso-dark);
        border-radius: 6px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-brown:hover {
        background-color: var(--espresso-hover);
        color: #ffffff;
        border-color: var(--espresso-hover);
    }

    .btn-outline-brown {
        background-color: transparent;
        color: var(--espresso-dark);
        border: 1px solid var(--espresso-dark);
        border-radius: 6px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-outline-brown:hover {
        background-color: var(--espresso-dark);
        color: #ffffff;
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #ebd3c81a;
        border-radius: 12px;
    }

    .card-menu-img {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .hero-card {
        background-color: var(--espresso-dark);
        color: #ffffff;
        border-radius: 0;
    }

    footer {
        background-color: var(--espresso-dark) !important;
        color: #e3d7cb;
    }

    footer a {
        color: #c4b5a5 !important;
        transition: color 0.2s;
    }

    footer a:hover {
        color: #ffffff !important;
    }
</style>

<!-- Hero Section -->
<div class="card hero-card mb-5 border-0 shadow-sm">
    <div class="row g-0 align-items-center container mx-auto">
        <div class="col-md-6 p-4 p-lg-5">
            <h1 class="display-5 fw-bold mb-3">Good Coffee<br>Good Mood</h1>
            <p class="text-light opacity-75 fs-6 mb-4">
                Start your day with the best coffee in town. Crafted freshly from organic beans every single morning.
            </p>
            <div class="d-flex gap-3">
                <a href="/Brew-Cafe-main/menu.php" class="btn btn-outline-brown text-white border-white">Explore Menu</a>
                <?php if (isset($_SESSION['userId'])) { ?>

                    <li>
                        <a href="/Brew-Cafe-main/users/logout.php" class="btn btn-outline-brown text-white border-white">Logout</a>

                    </li>


                <?php } else { ?>

                    <li>
                        <a href="/Brew-Cafe-main/users/register.php" class="btn btn-outline-brown text-white border-white">Register</a>

                    </li>

                    <li>
                        <a href="/Brew-Cafe-main/users/login.php" class="btn btn-outline-brown text-white border-white">Login</a>

                    </li>

                <?php } ?>

            </div>
        </div>
        <div class="col-md-6 text-center p-3">
            <img src="/Brew-Cafe-main/assets/images/coffe.jpg" class="img-fluid rounded-4 shadow" style="max-height: 350px; object-fit: cover;" alt="Coffee Hero">
        </div>
    </div>
</div>

<!-- About Section -->
<section id="about" class="container mb-5">
    <div class="text-center mb-4">
        <h2 class="section-title h3">About Us</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm p-3">
                <div class="card-body text-center">
                    <h3 class="card-title fw-bold mb-3">Our Story</h3>
                    <p class="text-muted">
                        Brew Café was founded with a simple goal: to serve the best coffee using the finest beans and create a cozy place where people can relax and enjoy perfection in every cup.
                    </p>
                    <a href="/Brew-Cafe-main/about.php" class="btn btn-brown btn-sm mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Popular Items Section -->
<section id="popular-items" class="container my-5">
    <div class="text-center mb-4">
        <h2 class="section-title h3">Our Popular Items</h2>
    </div>
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="/Brew-Cafe-main/assets/images/cappuccino.jpg" class="card-img-top card-menu-img" alt="Cappuccino">
                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold fs-6 mb-1">Cappuccino</h5>
                    <p class="text-muted small mb-3">$3.50</p>
                    <a href="/Brew-Cafe-main/menu.php" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="/Brew-Cafe-main/assets/images/latte.jpg" class="card-img-top card-menu-img" alt="Latte">
                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold fs-6 mb-1">Latte</h5>
                    <p class="text-muted small mb-3">$3.00</p>
                    <a href="/Brew-Cafe-main/menu.php" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="/Brew-Cafe-main/assets/images/mocha.jpg" class="card-img-top card-menu-img" alt="Mocha">
                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold fs-6 mb-1">Mocha</h5>
                    <p class="text-muted small mb-3">$3.50</p>
                    <a href="/Brew-Cafe-main/menu.php" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="/Brew-Cafe-main/assets/images/coldbrew.jpg" class="card-img-top card-menu-img" alt="Cold Brew">
                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold fs-6 mb-1">Cold Brew</h5>
                    <p class="text-muted small mb-3">$4.00</p>
                    <a href="/Brew-Cafe-main/menu.php" class="btn btn-brown btn-sm mt-auto w-100">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once "footer.php";
?>