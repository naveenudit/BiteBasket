<?php include 'db.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiteBasket</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <?php include 'header.php'?>
    <section class="main">
        <div class="home">
            <div class="text">
                <h1>Quick  Fresh  Delicious</h1>
                <p>Get your food delivered to your home in no time!</p>
                <a href="login.php"><button>Shop Now</button></a>
            </div>
            <img src="images/home.png" alt="" class="main_image">
        </div>
    </section>
    <section class="category">
        <div class="product-main">
            <h2>OUR PRODUCTS</h2>
            <div class="line"></div>
            <div class="products-list">
                <?php
                $sql = "SELECT * FROM products LIMIT 6";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo"
                        <div class='product'>
                            <a href='product.php?id={$row['id']}'>
                            <img src='{$row['image']}' alt='{$row['name']}'>
                            <h3>{$row['name']}</h3>
                            <p>{$row['description']}</p>
                            <p>₹{$row['price']}</p>
                            </a>
                        </div>";
                    }
                }
                else{
                    echo"<p>No products available</p>";
                }
                ?>
            </div>
            <div class="explore_button">
                <a href="explore.php"><button>Explore More Products</button></a>
            </div>
        </div>
    </section>
    <section>
        <?php include 'carousel.php';?>
    </section>
</body>
</html>