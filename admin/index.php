<?php
include('../middleware/adminMiddleware.php');
include('./includes/header.php');
function getCustomers()
{
    global $conn;
    $query = "SELECT id, name, phone, email FROM users WHERE role_as = 0";
    $result = mysqli_query($conn, $query);
    return $result;
}
function getMessages()
{
    global $conn;
    $query = "SELECT id, email, msg FROM messages";
    $result = mysqli_query($conn, $query);
    return $result;
}


?>
<style>
    .table th, .table td {
        text-align: left;
    }
</style>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">
                                            General Statistics
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        // Function to handle database errors
                        function handleDatabaseError($stmt)
                        {
                            if (!$stmt) {
                                die($stmt->error);
                            }
                        }
                        $select_products = $conn->prepare("SELECT * FROM products");
                        handleDatabaseError($select_products);
                        $select_products->execute();
                        $number_of_products = $select_products->get_result()->num_rows;
                        $select_products->close();
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">weekend</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Product Added</p>
                                        <h4 class="mb-0"><?= $number_of_products; ?></h4>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0" />
                                <div class="card-footer p-3" id="productfooter">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">leaderboard</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <?php
                                        $select_users = $conn->prepare("SELECT * FROM users WHERE role_as <> 1");
                                        handleDatabaseError($select_users);
                                        $select_users->execute();
                                        $number_of_users = $select_users->get_result()->num_rows;
                                        $select_users->close();
                                        ?>

                                        <p class="text-sm mb-0 text-capitalize">Total Customers</p>
                                        <h4 class="mb-0"><?= $number_of_users; ?></h4>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0" />
                                <div class="card-footer p-3" id="userfooter">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">store</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <?php
                                        $select_orders = $conn->prepare("SELECT * FROM orders");
                                        handleDatabaseError($select_orders);
                                        $select_orders->execute();
                                        $orders_result = $select_orders->get_result();
                                        $total_price = 0;

                                        while ($order_row = $orders_result->fetch_assoc()) {
                                            $total_price += $order_row['total_price'];
                                        }
                                        $select_orders->close();
                                        ?>
                                        <p class="text-sm mb-0 text-capitalize">Revenue</p>
                                        <h4 class="mb-0"><?= $total_price; ?></h4>
                                    </div>
                                </div>
                                <hr class="horizontal my-0 dark" />
                                <div class="card-footer p-3" id="revenuefooter">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">person_add</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Message</p>
                                        <h4 class="mb-0">+91</h4>
                                    </div>
                                </div>
                                <hr class="horizontal my-0 dark" />
                                <div class="card-footer p-3">
                                    <p class="mb-0">Just updated</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6 col-md-12">
                            <div class="card" style="min-height:485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Customer's Information</h4>
                                    <p class="category">All about our customers</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $customers = getCustomers();
                                            if (mysqli_num_rows($customers) > 0) {
                                                foreach ($customers as $item) {
                                            ?>
                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['phone']; ?></td>
                                                        <td><?= $item['email']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">No customer yet</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card" style="min-height:485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Messages</h4>
                                    <p class="category">Check it out!</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>From</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $messages = getMessages();
                                            if (mysqli_num_rows($messages) > 0) {
                                                while ($message = mysqli_fetch_assoc($messages)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $message['id']; ?></td>
                                                        <td><?= $message['email']; ?></td>
                                                        <td><?= $message['msg']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="3">No messages yet</td>
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
    <script>
        function updateFooterContent(id, currentValue, previousValue) {
            const footerElement = document.getElementById(id);
            if (footerElement) {
                const changePercentage = ((currentValue - previousValue) / previousValue) * 100;
                const sign = changePercentage >= 0 ? '+' : '-';
                const percentageText = `${sign}${Math.abs(changePercentage).toFixed(2)}% than yesterday`;
                const successText = `<span class="text-success text-sm font-weight-bolder">${percentageText}</span>`;
                const newText = `<p class="mb-0">${successText}</p>`;
                footerElement.innerHTML = newText;
            }
        }
        const previousProductCount = 2;
        const previousUserCount = 3;
        const previousRevenue = 1230000;

        const currentProductCount = 3;
        const currentUserCount = 4;
        const currentRevenue = 2000000;

        updateFooterContent('productfooter', currentProductCount, previousProductCount);
        updateFooterContent('userfooter', currentUserCount, previousUserCount);
        updateFooterContent('revenuefooter', currentRevenue, previousRevenue);
    </script>

    <?php
    include('./includes/footer.php');
    ?>