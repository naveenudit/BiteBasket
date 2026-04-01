<?php include 'db.php';

$sql = "SELECT id, name, price, image
FROM products WHERE feature = 1";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
    <link rel="stylesheet" href="style/carousel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .slick-prev:before, .slick-next:before {
            display: none;
        }

        /* Custom arrow buttons */
        .slick-prev, .slick-next {
            font-size: 30px;
            color: #ff7043;
            z-index: 10;
        }

        .slick-prev {
            left: -40px; /* position left arrow */
        }
        .slick-next {
            right: -40px; /* position right arrow */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="product.php">
        <div class="carousel">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="carousel-item">
                    <img src="<?= htmlspecialchars($row["image"]);?>">
                    <p><?= htmlspecialchars($row["name"])?></p>
                    <p><?= htmlspecialchars($row["price"], 2)?></p>
                </div>
            <?php endwhile;?>
        </div></a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').slick({
                dots: true,          // show dots (dynamic)
                arrows: true,        // prev/next buttons
                infinite: true,
                slidesToShow: 1,     // show 1 slide only
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>'
            });
        });
    </script>
</body>
</html>