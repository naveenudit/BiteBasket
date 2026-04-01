<?php include 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$catResult = $conn->query("SELECT * FROM categories ORDER BY id ASC");

$sql = "
    SELECT DISTINCT p.* 
    FROM products p
    LEFT JOIN product_categories pc ON p.id = pc.product_id
    LEFT JOIN categories c ON pc.category_id = c.id
    WHERE 1 = 1
";

// Filter by category name (if selected)
if (!empty($category)) {
    $safeCategory = $conn->real_escape_string($category);
    $sql .= " AND c.name = '$safeCategory'";
}

// Filter by search (if entered)
if (!empty($search)) {
    $safeSearch = $conn->real_escape_string($search);
    $sql .= " AND p.name LIKE '%$safeSearch%'";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="style/explore.css">
</head>
<body>

    <?php include 'header.php'?>

    <!-- category and search bar -->

    <div class="filter-bar">
        <h3>Hungry? Let’s Find It!</h3>
        <form method="GET">
            <input type="text" name="search" placeholder="Search food ..." value="<?= htmlspecialchars($search)?>">

            <select name="category" onchange="this.form.submit()">
                <option value="">-- All Products --</option>
                <?php while($cat = $catResult->fetch_assoc()):?>
                    <option value="<?=$cat['name']?>" <?=($category==$cat['name']) ? 'selected' : ''?>><?=$cat['name']?></option>
                    <?php endwhile; ?>
            </select>
        </form>
    </div>

    <h2>Explore All Delicious Dishes </h2>
    <div class="line"></div>
    <div class="products-list">
        <?php
        
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
        $conn->close();
        ?>
    </div>
    
</body>
</html>