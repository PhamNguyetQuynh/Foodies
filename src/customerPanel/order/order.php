<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="order.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Order</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="orderContainer">
        <h1>My Order</h1>
        <div class="product-card">
            <img src="../../img/imageOrder.svg" alt="Product Image" class="product-image">
            <div class="product-info">
                <div class="orderRow">
                    <h3 class="product-name">Salad</h3>
                    <p class="product-price">$15</p>
                </div>
                <p class="product-description">
                    A feast for the senses, with fresh ingredients and a flavorful dressing
                </p>
                <p class="product-status">In Progress</p>
            </div>
        </div>
    </div>    
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>