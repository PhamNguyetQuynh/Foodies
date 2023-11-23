<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="../../js/customerScript.js"></script>
    <link rel="stylesheet" href="productDetail.css">
    <title>Product detail</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="product-detail-container">
        <h3 class="title">Product Detail</h3>
        <div class="detail">
            <div class="product-img">
                <img src="../../img/salad.svg" alt="">
            </div>
            <div class="product-detail">
                <p class="prd-green-text">In stock</p>
                <p class="prd-yellow-text">Foodies</p>
                <p class="prd-price">$40.0</p>
                <p class="prd-description">French fries are a beloved and iconic fast food dish that needs no introduction. They are made from potatoes, typically Russet or Idaho varieties, which are cut into long, thin strips and then deep-fried to achieve a crispy, golden exterior and a fluffy, tender interior.</p>
                <div class="btn-group">
                    <button class="prd-btn btn">Add to Wishlist</button>
                    <button class="prd-btn btn">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>