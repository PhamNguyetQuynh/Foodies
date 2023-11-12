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
    <link rel="stylesheet" href="checkOut.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Homepage</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="mainContent">
        <h1 class="contentTitle">Checkout</h1>
        <h2 class="contentTitle">Billing Address</h2>
        <form>
            <div class="row">
            <div class="billInfo">
                    <p class="required-field">Your Name</p>
                    <input type="text" name="name" placeholder="Enter your name" required></input>
                </div>
                <div class="billInfo">
                    <p class="required-field">Your Building Address</p>
                    <input type="text" name="buildingAddress" placeholder="Enter your flat & building number" required></input>
                </div>
            </div>
            <div class="row">
                <div class="billInfo">
                    <p class="required-field">Your Number</p>
                    <input type="text" name="number" placeholder="Enter your number" required></input>
                </div>
                <div class="billInfo">
                    <p class="required-field">Your Street Address</p>
                    <input type="text" name="streetAddress" placeholder="Enter your street name" required></input>
                </div>
            </div>
            <div class="row">
                <div class="billInfo">
                    <p class="required-field">Your Email</p>
                    <input type="text" name="email" placeholder="Enter your email" required></input>
                </div>
                <div class="billInfo">
                    <p class="required-field">Your City</p>
                    <input type="text" name="city" placeholder="Enter your city name" required></input>
                </div>
            </div>
            <div class="row">
                <div class="billInfo">
                    <p class="required-field">Payment Method</p>
                    <select name="payment" id="payment">
                        <option value="cash">Cash on delivery</option>
                        <option value="banking">Banking</option>
                    </select>
                </div>
                <div class="billInfo">
                    <p class="required-field">Your Country</p>
                    <input type="text" name="country" placeholder="Enter your country name" required></input>
                </div>
            </div>
            <div class="row">
                <div class="billInfo">
                    <p class="required-field">Address Type</p>
                    <select name="addressType" id="addressType">
                        <option value="home">Home</option>
                        <option value="apartment">Apartment</option>
                    </select>
                </div>
                <div class="billInfo">
                    <p class="required-field">Postal Code</p>
                    <input type="text" name="postalCode" placeholder="110122" required></input>
                </div>
            </div>
        </form>
        <h2 class="contentTitle">Order Detail</h1>
        <table>
            <tr>
                <td class="picProduct"><img src="../../img/salad.svg"></td>
                <td class="nameProduct">Item's namexxxxxxxxx</td>
                <td class="price">
                    0000000đ<br>
                    <p>Q: 1</p>
                </td>
            </tr>
            <tr>
                <td class="picProduct"><img src="../../img/salad.svg"></td>
                <td class="nameProduct">Item's namexxxxxxxxx</td>
                <td class="price">
                    0000000đ<br>
                    <p>Q: 1</p>
                </td>
            </tr>
            <tr>
                <td class="picProduct"><img src="../../img/salad.svg"></td>
                <td class="nameProduct">Item's namexxxxxxxxx</td>
                <td class="price">
                    0000000đ<br>
                    <p>Q: 1</p>
                </td>
            </tr>
        </table>
        <hr>
        <p class="total">Total: <strong>0000000đ</strong></p>
        <div class="row button">
            <button class="btn cancel">Cancel</button>
            <button class="btn checkOut">Complete Checkout</button>
        </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>

</html>