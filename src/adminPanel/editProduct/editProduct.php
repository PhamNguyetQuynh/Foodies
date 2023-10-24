<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="./editProduct.css">
    <title>Foodies-Admin Dashboard page</title>
</head>

<body>
    <?php include '../../components/adminHeader/adminHeader.php'; ?>

    <div class="main-container">
        <section class="post-editor">
            <div class="heading">
                <h1>edit product</h1>
            </div>
            <div class="box-container">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data" class="register">
                        <div class="input-field">
                            <p>post status <span>*</span></p>
                            <select name="status" class="box">
                                <option value="active">active</option>
                                <option value="deactive">deactive</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <p>product name <span>*</span></p>
                            <input type="text" name="name" class="box">
                        </div>
                        <div class="input-field">
                            <p>product price <span>*</span></p>
                            <input type="number" name="price" class="box">
                        </div>
                        <div class="input-field">
                            <p>product detail <span>*</span></p>
                            <textarea name="product_detail" class="box"></textarea>
                        </div>
                        <div class="input-field">
                            <p>total stock <span>*</span></p>
                            <input type="number" name="stock" class="box" min="0" max="9999999999" maxlength="10">
                        </div>
                        <div class="input-field">
                            <p>product image <span>*</span></p>
                            <input type="file" name="image" accept="image/*" class="box">
                        </div>
                        <div class="flex-btn">
                            <input type="submit" name="delete_image" class="btn" value="delete image">
                            <a href="viewProduct.php" class="btn">go back</a>
                        </div>
                    <div class="flex-btn">
                        <input type="submit" name="save" value="save post" class="btn">
                        <input type="submit" name="delete_post" value="delete post" class="btn">
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>