<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="orderDetail.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Order</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="orderContainer">
        <h1>My Order Detail</h1>
        <div class="orderContainerRow">
            <div class="left-orderContainer">
                <div class="orderRow">
                    <input type="date" id="shipDate">
                    <div class="product-status">
                        <i class="fa-solid fa-circle"></i>
                        <p>In Progress</p>
                    </div>
                </div>
                <div class="invoice">
                    <table>
                        <tr>
                            <td rowspan="2">
                                <img src="../../img/imageOrder(detail).svg" alt="Product Image" class="product-image">
                            </td>
                            <td rowspan="2">Tên sản phẩm</td>
                            <td class="right">1</td>
                        </tr>
                        <tr>
                            <td class="right">$99.99</td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <img src="../../img/imageOrder(detail).svg" alt="Product Image" class="product-image">
                            </td>
                            <td rowspan="2">Tên sản phẩm</td>
                            <td class="right">1</td>
                        </tr>
                        <tr>
                            <td class="right">$99.99</td>
                        </tr>
                        <tr class="total-col">
                            <td colspan="2" class="right"><strong>Total:</strong></td>
                            <td>$000000</td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="right-orderContainer">
                <div class="orderRow">
                    <p id="billAddress"><strong>Billing Address</strong></p>
                    <button id="cancelOrder">Cancel Order</button>
                </div>
                <div class="addressInfo">
                    <i class="fa-regular fa-user"></i>
                    <p>Anna Lauren</p>
                </div>
                <div class="addressInfo">
                    <i class="fa-solid fa-phone"></i>
                    <p>(480) 555-0103</p>
                </div>
                <div class="addressInfo">
                    <i class="fa-regular fa-envelope"></i>
                    <p>debra.holt@example.com</p>
                </div>
                <div class="addressInfo">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>6391 Elgin St. Celina, Delaware 10299</p>
                </div>
            </div>
        </div>
    </div>    
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>