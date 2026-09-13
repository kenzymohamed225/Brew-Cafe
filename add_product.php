<?php

include "connect.php";

$connect = new Connect();

if (isset($_POST['add'])) {

    $imageName = time() . "_" . basename($_FILES['image']['name']);

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "uploads/" . $imageName
    );

    $data = [
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "image" => $imageName
    ];
    if (isset($message)) { ?>

    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>

   <?php } 

    if ($connect->insert($data, "products")) {
        $message= "Product added successfully";
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
  <html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
        }

        .container {
            width: 450px;
            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;

            font-weight: bold;
        }

        input {
            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;
            border-radius: 8px;

            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #333;
        }

        input[type="file"] {
            padding: 9px;
        }

        button {
            width: 100%;

            padding: 13px;

            border: none;
            border-radius: 8px;

            background: #3c2415;
            color: white;

            font-size: 16px;

            cursor: pointer;
        }

        button:hover {
            background: #444;
        }

        .message {
            text-align: center;

            margin-bottom: 20px;

            padding: 10px;

            border-radius: 8px;

            background: #e8f5e9;
            color: #2e7d32;
        }
        .menu-btn {
    display: block;
    width: 100%;
    padding: 13px;
    margin-top: 10px;

    text-align: center;
    text-decoration: none;

    background: #555;
    color: white;

    border-radius: 8px;
    font-size: 16px;
}

.menu-btn:hover {
    background: #333;
}

    </style>

</head>

<body>

<div class="container">

    <h1>Add Product</h1>

    <?php if (isset($message)) { ?>

        <div class="message">
            <?php echo $message; ?>
        </div>

    <?php } ?>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">

            <label>Product Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter product name"
                required
            >

        </div>


        <div class="form-group">

            <label>Price</label>

            <input
                type="number"
                name="price"
                placeholder="Enter price"
                min="0"
                required
            >

        </div>


        <div class="form-group">

            <label>Product Image</label>

            <input
                type="file"
                name="image"
                accept="image/*"
                required
            >

        </div>


        <button type="submit" name="add">
            Add Product
        </button>
        <a href="menu.php" class=" menu-btn" >
          Go To Menu
        </a>

    </form>

</div>

</body>

</html>