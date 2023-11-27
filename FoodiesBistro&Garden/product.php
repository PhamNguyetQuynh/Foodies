<?php
include('./functions/userFunctions.php');
include('./includes/header.php');

if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getBySlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category) {
        $cateID = $category['id'];
?>
        <img class="img-fluid opacity-25 position-absolute" src="uploads/wp10509681.jpg">
        <div class="py-4 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Menu: <?= $category['name']; ?></h1>
                        <hr>
                        <div class="row">
                            <?php
                            $products = getProductsByCate($cateID);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="singleProductView.php?product=<?= $item['slug']; ?>">
                                            <div class="card shadow-lg mb-5 rounded border-0">
                                                <div class="card-body p-0">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                    <h5 class="text-center text-white mt-sm-3 mb-sm-3"><?= $item['name'];  ?></h4>
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

<?php
    } else {
        echo "Something went wrong";
    }
} else {
    echo "Something went wrong";
}
include('./includes/footer.php') ?>