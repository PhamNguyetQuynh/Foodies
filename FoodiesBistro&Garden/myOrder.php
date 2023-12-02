<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
include('authenticate.php');
?>
<div style="padding: 190px; padding-top: 120px;">
    <h2 style="padding-bottom: 20px; color: #6F6D6D; font-weight: 800; line-height: 20px;">My Orders</h2>
    <div class="row">
        <?php
        $ordersItem = getOrdersItems();
        if (mysqli_num_rows($ordersItem) > 0) {
            foreach ($ordersItem as $item) {
        ?>
            <div class="col-md-3 mb-2">
                <a href="singleOrderView.php?order=<?= $item['tracking_no']; ?>">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="assets/img/testimalnial.png" alt="Product Image" class="w-100">
                            <div class="d-flex flex-column gap-2 pt-2">
                                <div>Total price: <?= $item['total_price'];  ?></div>
                                <div>Status: <?= $item['status'];  ?></div>
                                <div>Ordered at: <?= $item['created_at'];  ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            }} else {
            echo "No data available";
            }
        ?>
    </div>
</div>
<?php include('./includes/footer.php') ?>