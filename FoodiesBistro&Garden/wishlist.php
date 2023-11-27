<?php
include('./functions/userFunctions.php');
include('./includes/header.php');

?>
<div class="container py-5">
    <h3 class="pb-3">Wishlist</h3>
    <div class="row">
        <?php
        $products = getWishlistItems();
        if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
        ?>
            <div class="col-md-3 mb-2">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                            <div class="d-flex pt-2">
                                <a href="singleProductView.php?product=<?= $item['name']; ?>"><h6><?= $item['name'];  ?></h6></a>
                                <i class="fa-solid fa-heart" style="color: #f22626;"></i>
                            </div>
                        </div>
                    </div>
            </div>
        <?php
            }} else {
            echo "No data available";
            }
        ?>
    </div>
</div>
<?php include('./includes/footer.php') ?>