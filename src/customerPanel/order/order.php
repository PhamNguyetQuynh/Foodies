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
        <div class="background-image"></div>
        <h1>My Order</h1>
        <table>
            <tr>
                <td>
                    <img src="../../img/imageOrder.svg" alt="Product Image" />
                </td>
            </tr>
            <tr>
                <td class="product-description">
                    <p>Salad</p>
                    <p>$15</p>
                    <p>A feast for the senses, with fresh ingredients and a flavorful dressing</p>
                    <p>Trạng thái: In progress</p>
                </td>
            </tr>
        </table>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>