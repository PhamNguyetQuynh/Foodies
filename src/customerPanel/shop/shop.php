<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="../../customerPanel/shop/shop.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Shop</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Our Menu</h1>
            <p>Nourish your body, indulge your taste buds<br>
                Welcome to a world of healthy delights!</p>
        </div>
    </div>
<div class="products">
    <div class="heading">

    </div>
    <form action="" method="post" class="box">
        <div class="content">
            <img src="../../img/salad.svg" alt="" class="shap">
            <div class="button">
                <div> <h3 class="name"></h3></div>
                <div>
                    <button type="submit" name="add to cart"><i class="bx bx-cart"></i></button>
                    <button type="submit" name="add to wishlist"><i class="bx bx-heart"></i></button>
                </div>
            </div>
            <p class="price">price</p>
            <input type="hidden" name="product_id">
            <div class="flexBtn">
                <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
        </div>
        </div>
    </form>
</div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>