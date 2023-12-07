<?php
include('../middleware/adminMiddleware.php');
include('./includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white">
                        Orders
                        <a href="orderHistory.php" class="btn btn-warning float-end">Order History</a>
                    </h4>
                </div>
                <div class="card-body" id="order_table">
                    <div class="container">
                        <div class="card card-body shadow">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="ps-2">ID</th>
                                                <th class="ps-2">User ID</th>
                                                <th class="ps-2">User Name</th>
                                                <th class="ps-2">Tracking No</th>
                                                <th class="ps-2">Total Price</th>
                                                <th class="ps-2">Date</th>
                                                <th class="ps-2">Status</th>
                                                <th class="ps-2">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $orders = getOnGoingOrders();
                                            if (mysqli_num_rows($orders) > 0) {
                                                foreach ($orders as $item) {
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><?= $item['id']; ?></td>
                                                        <td class="align-middle"><?= $item['user_id']; ?></td>
                                                        <td class="align-middle"><?= $item['name']; ?></td>
                                                        <td class="align-middle"><?= $item['tracking_no']; ?></td>
                                                        <td class="align-middle"><?= $item['total_price']; ?></td>
                                                        <td class="align-middle"><?= $item['created_at']; ?></td>
                                                        <td class="align-middle text-bold">
                                                            <span class="badge-sm text-warning">ON GOING</span>
                                                        </td>
                                                        <td><a href="viewOrderDetail.php?t=<?= $item['tracking_no']; ?>" class="btn btn-info">View Details</a></td>

                                                    </tr>

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">No in process yet</td>

                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php') ?>