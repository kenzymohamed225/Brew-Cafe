<?php
include_once "../navbar.php";
?>

<head>
    <style>
        .body {
            background-color: rgb(248, 247, 247);
        }

        .register-image {
            object-fit: cover;
            height: 100%;
        }

        .brown {
            background-color: #3c2415;
            color: white;
        }

        .brown:hover {
            background-color: #3c2415;
            color: white;
        }
    </style>
</head>

<body class="body">

    <div class="container my-5">

        <div class="row bg-white shadow rounded overflow-hidden mx-auto"
            style="max-width: 1000px; min-height: 500px;">

            <div class="col-md-6 p-0">
                <img src="/Brew-Cafe-main/assets/images/login_image.webp"
                    alt="Register"
                    class="register-image w-100">
            </div>

            <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center">

                <h1 class="text-center fw-bold mb-1">
                    Create Account
                </h1>

                <p class="text-center text-secondary mb-4">
                    Register to get started
                </p>

                <form id="register-form" action="/Brew-Cafe-main/users/create.php" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Full Name
                        </label>

                        <input type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter Your Full Name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter Your Email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter Your Password"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">
                            Confirm Password
                        </label>

                        <input type="password"
                            id="confirm-password"
                            name="confirm-password"
                            class="form-control"
                            placeholder="Confirm Your Password"
                            required>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        name="submit"
                        class="btn brown w-100 py-2">
                        Register
                    </button>

                </form>

                <div class="text-center mt-4">
                    <span class="text-secondary">
                        Already have an account?
                    </span>

                    <a href="/Brew-Cafe-main/users/login.php"
                        class="fw-bold text-decoration-none"
                        style="color: #3c2415;">
                        Login
                    </a>
                </div>

            </div>

        </div>

    </div>

    <?php
    include_once "../footer.php";
    ?>