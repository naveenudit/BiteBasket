<?php include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name'])?></title>
    <link rel="stylesheet" href="style/product.css">
</head>
<body>
    <?php include 'header.php'?>

    <div class="product-page">
        <div class="product-image">
            <img src="<?= $product['image']?>" alt="<?= htmlspecialchars($product['name'])?>">
        </div>
        <div class="product-detail">
            <h2><?= htmlspecialchars($product['name'])?></h2>
            <p><?= htmlspecialchars($product['detail'])?></p>
            <p>₹<?=htmlspecialchars($product['price'])?></p>
            <a href="#"><button>Add-To-Cart</button></a>
            <a href="#"><button>Buy Now</button></a>
        </div>
    </div>
</body>
</html>