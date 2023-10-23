<!DOCTYPE html>
<html>
    <head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Foodies-Admin Dashboard page</title></head>
    <body>
        <div class="container">
            <div class="wrapper">
                <?php include '../../components/adminHeader/adminHeader.php' ?>
            </div>
            <div class="dashBoard">
                <div class="title">Dashboard</div>
                <table class="tb">
                    <tr>
                        <td>
                            <div class="form">
                                <p>User Account</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="user_account_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form">
                                <p>Message</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="message_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form">
                                <p>Products Added</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="products_added_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form">
                                <p>Total Deactive Products</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="deactive_products_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form">
                                <p>Total Active Products</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="active_products_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form">
                                <p>Total Orders</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="total_orders_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form">
                                <p>Total Canceled Orders</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="canceled_orders_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form">
                                <p>Total Confirmed Orders</p>
                                <h3>SL</h3>
                                <div class="view-detail">
                                    <a href="confirmed_orders_detail.html">View Detail &raquo;</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
