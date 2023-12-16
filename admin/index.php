<?php
include('../middleware/adminMiddleware.php');
include('./includes/header.php');

?>

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
                        <div class="col-lg-3 col-sm-6">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">weekend</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <?php
                                        $id = 0;
                                        $select_products = $conn->prepare("SELECT * FROM products WHERE id= ?");
                                        $select_products->bind_param("i", $id);
                                        $select_products->execute();
                                        $result = $select_products->get_result();
                                        $number_of_products = $result->num_rows;
                                        $select_products->close();
                                        ?>
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
                                        $id = 0;
                                        $select_users = $conn->prepare("SELECT * FROM users WHERE id= ?");
                                        $select_users->bind_param("i", $id);
                                        $select_users->execute();
                                        $result = $select_users->get_result();
                                        $number_of_users = $result->num_rows;
                                        $select_users->close();
                                        ?>
                                        <p class="text-sm mb-0 text-capitalize">Today's User</p>
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
                                        $total_price = 0;
                                        $select_orders = $conn->prepare("SELECT * FROM orders WHERE id= ?");
                                        $select_orders->bind_param("i", $id);
                                        $select_orders->execute();
                                        $result = $select_orders->get_result();
                                        while ($row = $result->fetch_assoc()) {
                                            $total_price += $row['total_price'];
                                        };
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
                        <div class="col-lg-7 col-md-12">
                            <div class="card" style="min-height:485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Employess Stats</h4>
                                    <p class="category">New employees on 15th November, 2023</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone No</th>
                                                <th>City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Cam Tu</td>
                                                <td>012354478</td>
                                                <td>Ben Tre</td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Nguyet Quynh</td>
                                                <td>5208851520</td>
                                                <td>Tien Giang</td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Vy Ngo</td>
                                                <td>01254789</td>
                                                <td>Tien Giang</td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Diem Quynh</td>
                                                <td>024158752</td>
                                                <td>HCMC</td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Mai Chi</td>
                                                <td>012254867</td>
                                                <td>HCMC</td>
                                            </tr>

                                            <tr>
                                                <td>6</td>
                                                <td>Phuong Anh</td>
                                                <td>011254788</td>
                                                <td>HCMC</td>
                                            </tr>


                                            <tr>
                                                <td>7</td>
                                                <td>Dang Khoa</td>
                                                <td>021547852</td>
                                                <td>HCMC</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 col-md-12">
                            <div class="card" style="min-height:485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Message</h4>
                                    <p class="category">Check it out!git c</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>From</th>
                                                <th>Message content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Cam Tu</td>
                                                <td>i need to bla bla</td>

                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Nguyet Quynh</td>
                                                <td>dont git me chili</td>

                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Vy Ngo</td>
                                                <td>can you grab it for me now</td>

                                            </tr>
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
<script>
    function updateFooterContent(id, percentageChange) {
        const footerElement = document.getElementById(id);
        if (footerElement) {
            const sign = percentageChange >= 0 ? '+' : '-';
            const percentageText = `${sign}${Math.abs(percentageChange).toFixed(2)}% than yesterday`;
            const successText = `<span class="text-success text-sm font-weight-bolder">${percentageText}</span>`;
            const newText = `<p class="mb-0">${successText}</p>`;
            footerElement.innerHTML = newText;
        }
    }

    // Assume you have data for percentage changes
    const productChange = 1.5; // Replace with actual data
    const userChange = -2.3; // Replace with actual data
    const revenueChange = 0.8; // Replace with actual data

    // Update the content for each footer
    updateFooterContent('productfooter', productChange);
    updateFooterContent('userfooter', userChange);
    updateFooterContent('revenuefooter', revenueChange);
</script>

