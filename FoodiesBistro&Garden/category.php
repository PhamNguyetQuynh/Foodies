<?php
include('./functions/userFunctions.php');
include('./includes/header.php'); ?>

<img class="img-fluid opacity-25 position-absolute" src="uploads/wp10509681.jpg">
<div class="py-4 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Menu</h1>
                <hr>
                <div class="row">
                    <?php
                    $categories = getAllActive("categories");
                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="product.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow-lg mb-5 rounded border-0">
                                        <div class="card-body p-0">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                                            <h4 class="text-center text-white mt-sm-3 mb-sm-3"><?= $item['name'];  ?></h4>
                                        </div>
                                    </div>
                                </a>

                            </div>


                    <?php
                        }
                    } else {
                        echo "No data available";
                    }

                    ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>