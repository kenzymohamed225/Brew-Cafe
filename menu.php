<?php

session_start();

include_once "connect.php";

$db = new Connect();

if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location: login.php");
        exit();
    }

    $productId = (int) $_POST['product_id'];
    $userId = (int) $_SESSION['userId'];
    $db->addToCart($userId, $productId);

    header("Location: cart.php");
    exit();
}

$products = $db->select("products");
include_once "navbar.php";
?>

<title>Menu</title>

<style>
    .menu-header {
        background-color: #faf7f2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 35px 80px;
    }

    .menu-header h1 {
        font-size: 45px;
        color: #35180c;
        margin-bottom: 15px;
    }

    .menu-header p {
        color: #777;
        font-size: 17px;
        line-height: 1.6;
    }

    .menu-header img {
        width: 300px;
        height: 190px;
        object-fit: cover;
        border-radius: 50%;
    }

    .categories {
        text-align: center;
        padding: 25px 0;
    }

    .categories button {
        border: none;
        background-color: white;
        padding: 12px 30px;
        margin: 0 12px;
        border-radius: 25px;
        font-size: 15px;
        cursor: pointer;
    }

    .categories .active {
        background-color: #f1e3d1;
    }

    .menu {
        width: 90%;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .card {
        display: flex;
        align-items: center;
        padding: 12px;
        border: 1px solid #eee;
        border-radius: 10px;
        box-shadow: 0 2px 8px #eee;
        background-color: white;
    }

    .card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 15px;
    }

    .info {
        flex: 1;
    }

    .info h3 {
        margin: 0 0 7px;
        color: #35180c;
        font-size: 18px;
    }

    .info span {
        color: #a66b45;
        font-size: 14px;
    }

    .info p {
        color: #999;
        font-size: 13px;
        line-height: 1.4;
    }

    .card-right {
        text-align: right;
    }

    .card-right strong {
        font-size: 14px;
        color: #333;
    }

    .card-right button {
        display: block;
        margin-top: 25px;
        background-color: #5b270b;
        color: white;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 7px;
        font-size: 22px;
        cursor: pointer;
    }

    .card-right button:hover {
        background-color: #35180c;
    }

    @media (max-width: 768px) {
        .menu-header {
            padding: 25px;
        }

        .menu-header img {
            width: 130px;
            height: 130px;
        }

        .menu {
            grid-template-columns: 1fr;
        }

        .categories button {
            margin: 5px;
        }
    }
</style>

</head>

<body>

    <section class="menu-header">

        <div>
            <h1>Our Menu</h1>

            <p>
                Choose your favorite coffee and enjoy
                <br>
                the best taste around .
            </p>
        </div>

        <img src="cafe-logo.png" alt="Coffee">

    </section>

    <div class="categories">

        <button class="active">All</button>

        <button>Hot Coffee</button>

        <button>Cold Coffee</button>

        <button>Desserts</button>

        <button>Snacks</button>

    </div>

    <section class="menu">

        <?php foreach ($products as $product) { ?>

            <div class="card">

                <img src="uploads/<?php echo htmlspecialchars($product['image']); ?> " width="200"
                    alt="<?php echo htmlspecialchars($product['name']); ?>">

                <div class="info">

                    <h3>
                        <?php echo htmlspecialchars($product['name']); ?>
                    </h3>

                    <span>
                        $<?php echo htmlspecialchars($product['price']); ?>
                    </span>


                </div>

                <div class="card-right">
                    <strong>
                        $<?php echo htmlspecialchars($product['price']); ?>
                    </strong>

                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="add_to_cart"> + </button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </section>

    <?php
    include_once "footer.php";
    ?>
</body>
</html>