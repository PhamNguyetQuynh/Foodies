<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
include('./includes/slider.php'); ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline  mb-2"> </div>
                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0)
                        foreach ($trendingProducts as $item) {
                    ?>
                        <div class="item">
                            <a href="singleProductView.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body" style="height: 400px;">
                                        <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                        <h6 class="text-center"><?= $item['name'];  ?></h6>
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
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"> </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci nostrum a quibusdam asperiores, esse rerum, quos vitae officiis illo consequuntur cum ipsam animi enim aliquid. Sunt doloribus consequuntur eius minus.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci nostrum a quibusdam asperiores, esse rerum, quos vitae officiis illo consequuntur cum ipsam animi enim aliquid. Sunt doloribus consequuntur eius minus.
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci nostrum a quibusdam asperiores, esse rerum, quos vitae officiis illo consequuntur cum ipsam animi enim aliquid. Sunt doloribus consequuntur eius minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci nostrum a quibusdam asperiores, esse rerum, quos vitae officiis illo consequuntur cum ipsam animi enim aliquid. Sunt doloribus consequuntur eius minus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci nostrum a quibusdam asperiores, esse rerum, quos vitae officiis illo consequuntur cum ipsam animi enim aliquid. Sunt doloribus consequuntur eius minus.


                </p>
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