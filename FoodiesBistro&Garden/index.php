<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bootstrap Nav-Link Active</title>
</head>

<body>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    include('./functions/userFunctions.php');
    include('./includes/header.php');
    include('./includes/slider.php'); ?>

    <div class="py-5">
        <div class="container">
            <div class="col-md-12">
                <h4 class="fw-bolder">Trending Now</h4>
                <div class="underline mb-3" style="width: 200px"> </div>

                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0)
                        foreach ($trendingProducts as $item) {
                    ?>
                        <div class="item">
                            <a href="singleProductView.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body" style="height: 400px">
                                        <img src="uploads/<?= $item['image']; ?>" alt="Product Image">
                                        <h6 class="text-center text-dark mt-2 fw-bold"><?= $item['name'];  ?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="py-5 px-7 bg-f2f2f2">
        <div class="container">
            <div class="col-md-12">
                <h4 class="fw-bolder">About Us</h4>
                <div class="underline mb-2"></div>
                <p class="text-break">
                    Welcome to FOODIES, where culinary excellence meets a diverse tapestry of flavors! We are passionate about bringing together a myriad of tastes from around the world to create a gastronomic experience that transcends borders. Our journey began with a simple yet profound idea: to connect people through the universal language of food. Whether you're a seasoned foodie or just beginning your culinary adventure, we invite you to explore the rich and varied offerings that make up our food web.
                </p>
                <a href="aboutUs.php" class="btn btn-primary btn btn-danger float-end" role="button" data-bs-toggle="button">Read More</a>
            </div>
        </div>
    </div>
</div>

<div class="py-2 bg-danger">
    <div class="text-end">
        <div class="mb-0 me-3 text-white">All rights reserved. Copy right @Foodies Bistro & Garden - <?= date('Y'); ?> </div>
    </div>

    </div>
    <?php include('./includes/footer.php') ?>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })
    </script>

</body>

</html>