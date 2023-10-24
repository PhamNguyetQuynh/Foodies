<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="./addProduct.css">
    <title>Foodies-Admin Dashboard page</title>
</head>

<body>
    <?php include '../../components/adminHeader/adminHeader.php'; ?>

    <div class="mainContainer">
        <section class="postEditor">
            <div class="heading">
                <h1>add product</h1>
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="register">
                    <div class="input-field">
                        <p>product name <span>*</span> </p>
                        <input type="text" name="name" maxlength="100" placeholder="add product name" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product price <span>*</span> </p>
                        <input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product detail <span>*</span> </p>
                        <textarea name="description" required maxlength="1000" placeholder="add product detail" class="box"></textarea>
                    </div>
                    <div class="input-field">
                        <p>total stock <span>*</span> </p>
                        <input type="number" name="stock" maxlength="10" min="0" max="9999999999" placeholder="add product stock" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product image <span>*</span> </p>
                        <input type="file" name="image" accept="image/*" required class="box">
                    </div>
                    <div class="flex-btn">
                        <input type="submit" name="publish" value="Publish Now" class="btn">
                        <input type="submit" name="cancel" value="Cancel" class="btn">
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>