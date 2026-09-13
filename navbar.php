<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once"connect.php";
$db = new Connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .dropdown {
            color: #26160b;
            font-weight: bold;
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
</head>

<body class="d-flex flex-column min-vh-100">


    <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="home.php">
            <img src="/Brew-Cafe-main/assets/images/cafe-logo.png" alt="Brew Café Logo" width="40">
            <span>Brew Café</span>
        </a>

        <div class="navbar-nav ms-auto align-items-center gap-3">

            <a class="nav-link fw-semibold" href="home.php">Home</a>

            <a class="nav-link fw-semibold" href="menu.php">Menu</a>

            <?php if (isset($_SESSION['userId'])) { ?>
                <a class="nav-link fw-semibold" href="cart.php">Cart</a>
            <?php } ?>

            <a class="nav-link fw-semibold" href="about.php">About Us</a>

            <a class="nav-link fw-semibold" href="contact_us.php">Contact Us</a>

            <li class="nav-item dropdown">

                <a id="dropdown"
                   class="nav-link dropdown-toggle"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">

                    <?php
                    if (isset($_SESSION['userId'])) {
                        print $db->selectOne('users', $_SESSION['userId'])['name'];
                    } else {
                        print "Guest";
                    }
                    ?>

                </a>

                <ul class="dropdown-menu">

                    <?php if (isset($_SESSION['userId'])) { ?>

                        <li>
                            <a class="dropdown-item" href="logout.php">
                                Logout
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="add_product.php">
                                Add Product
                            </a>
                        </li>

                    <?php } else { ?>

                        <li>
                            <a class="dropdown-item" href="login.php">
                                Login
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="register.php">
                                Register
                            </a>
                        </li>

                    <?php } ?>

                </ul>

            </li>

        </div>
    </div>
</nav>