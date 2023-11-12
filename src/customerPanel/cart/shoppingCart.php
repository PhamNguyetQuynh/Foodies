<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="shoppingCart.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Homepage</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="mainContent">
        <h1 class="contentTitle">Shopping cart</h1>
        <h4 class="contentTitle productNumber">3 items in cart</h4>
        <div class="cartDetail">
            <table class="products">
                <tr>
                    <td class="picProduct"><img src="../../img/salad.svg"></td>
                    <td class="nameProduct">
                        <p>Item's namexxxxxxxxx</p>
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                        </div>
                    </td>
                    <td class="price">
                        <img src="../../img/Vector.svg" alt="tag">
                        0000000đ<br>
                        <p class="remove">Remove</p>
                    </td>
                </tr>
                <tr>
                    <td class="picProduct"><img src="../../img/salad.svg"></td>
                    <td class="nameProduct">
                        <p>Item's namexxxxxxxxx</p>
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                        </div>
                    </td>
                    <td class="price">
                        <img src="../../img/Vector.svg" alt="tag">
                        0000000đ<br>
                        <p class="remove">Remove</p>
                    </td>
                </tr>
                <tr>
                    <td class="picProduct"><img src="../../img/salad.svg"></td>
                    <td class="nameProduct">
                        <p>Item's namexxxxxxxxx</p>
                        <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                        </div>
                    </td>
                    <td class="price">
                        <img src="../../img/Vector.svg" alt="tag">
                        0000000đ<br>
                        <p class="remove">Remove</p>
                    </td>
                </tr>
            </table>
            <div class="totalAmount">
                <p class="total">Total: <strong>0000000đ</strong></p>
                <div class="buttonRow">
                    <button class="btn empty">Empty Cart</button>
                    <button class="btn checkOut">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>

</html>