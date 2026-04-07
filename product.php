<?php
include 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Product ID not found.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="style/product.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="product-page">
        <div class="product-image">
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
        </div>

        <div class="product-detail">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p><?= htmlspecialchars($product['detail']) ?></p>
            <p class="price">₹<?= number_format($product['price'], 2) ?></p>

            <a href="cart.php?id=<?= $product['id'] ?>">
                <button>Add To Cart</button>
            </a>

            <a href="checkout.php?id=<?= $product['id'] ?>">
                <button>Buy Now</button>
            </a>
        </div>
    </div>

</body>

</html>