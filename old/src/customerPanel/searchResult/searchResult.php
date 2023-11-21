<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="searchResult.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="../../js/customerScript.js"></script>
    <title>Search Result</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="search-result-container">
        <div class="rsl-product-card">
            <div class="rsl-product-img">
                <img src="../../img/salad.svg" alt="">
            </div>
            <div class="product-card-content">
                <div class="product-name-price">
                    <p>Salad</p>
                    <p>$15</p>
                </div>
                <p class="rsl-product-description">A feast for the senses, with fresh ingredients and a flavorful dressing</p>
                <div class="rsl-btn-icons-group">
                    <button class="rsl-btn btn">Buy Now</button>
                    <img src="../../img/shopping-cart.svg" alt="">
                    <img src="../../img/heart.svg" alt="">
                    <img src="../../img/eye.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>