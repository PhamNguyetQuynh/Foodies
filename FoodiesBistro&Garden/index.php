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
<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">Foodies Bistro & Garden</h4>
                <div class="underline mb-2"> </div>
                <a href="index.php" class="text-white">Home</a> <br>
                <a href="#" class="text-white">About Us</a><br>
                <a href="category.php" class="text-white">Our Menu</a> <br>
            </div>
            <div class="col-md-4">
                <h4 class="text-white">Address</h4>
                <p class="text-white">42 Nguyen Hue Street, District 1, Ho Chi Minh City, Viet Nam</p>
                <a href="tel: +84989598472" class="text-white"><i class="fa fa-phone"></i> +(84) 98 95 98 472</a><br>
                <a href="mailto:xyz@gmail.com" class="text-white"><i class="fa fa-envelope"></i> foddiesbistroandgarden@gmail.com</a>
            </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.547984513965!2d106.69074697405321!3d10.76927748937904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fc8702ecc0b%3A0x4e830dc2c0483582!2sDaybyDay%20-%20Kitchen%20%26%20Bar!5e0!3m2!1svi!2s!4v1700565681506!5m2!1svi!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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