<?php include 'db.php'; ?>

<?php
$sql = "SELECT id, name, price, image 
        FROM products 
        WHERE feature = 1 
        ORDER BY id DESC 
        LIMIT 8";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Products Carousel</title>

    <link rel="stylesheet" href="style/carousel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .slick-prev:before,
        .slick-next:before {
            display: none;
        }

        .slick-prev,
        .slick-next {
            font-size: 30px;
            color: #ff7043;
            z-index: 10;
        }

        .slick-prev {
            left: -40px;
        }

        .slick-next {
            right: -40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="carousel-title">Featured Products</h2>

        <div class="carousel">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="carousel-item">
                    <a href="product.php?id=<?= $row['id'] ?>">
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                        <p class="product-name"><?= htmlspecialchars($row['name']) ?></p>
                        <p class="product-price">₹<?= number_format($row['price'], 2) ?></p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                dots: true,
                arrows: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>