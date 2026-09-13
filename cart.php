<?php

session_start();

include_once "connect.php";

if (!isset($_SESSION['userId'])) {
    header("Location: /Brew-Cafe-main/users/login.php");
    exit();
}

$db = new Connect();

$userId = (int) $_SESSION['userId'];
$cartItems = $db->getCart($userId);
$total = 0;

include_once "navbar.php";

?>

<div class="container py-5">
    <h1 class="mb-4">Your Cart</h1>

    <?php if (empty($cartItems)) { ?>

        <div class="alert alert-info">
            Your cart is empty.
        </div>

        <a href="/Brew-Cafe-main/menu.php" class="btn btn-dark">
            Go To Menu
        </a>

    <?php } else { ?>

        <div class="row">

            <?php foreach ($cartItems as $item) {

                $itemTotal = $item['price'] * $item['quantity'];

                $total += $itemTotal;

            ?>

                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <img src="uploads/<?php echo htmlspecialchars($item['image']); ?>"
                                alt="<?php echo htmlspecialchars($item['name']); ?>"
                                width="100" height="100" style="object-fit: cover; border-radius: 10px;"
                            >
                            <div class="ms-3">
                                <h4>
                                    <?php echo htmlspecialchars($item['name']); ?>
                                </h4>
                                <p class="mb-1">
                                    Price:
                                    $<?php echo htmlspecialchars($item['price']); ?>
                                </p>
                                <p class="mb-1">
                                    Quantity:
                                    <?php echo $item['quantity']; ?>
                                </p>
                                <strong>
                                    Total:
                                    $<?php echo number_format($itemTotal, 2); ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <div class="text-end mt-4">
            <h3>
                Total:
                $<?php echo number_format($total, 2); ?>
            </h3>
            <a href="/Brew-Cafe-main/menu.php" class="btn btn-dark">
                Continue Shopping
            </a>
        </div>

    <?php } ?>
</div>

<?php
include_once "footer.php";
?>