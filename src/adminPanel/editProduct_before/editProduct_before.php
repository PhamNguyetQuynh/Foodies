<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="./editProduct_before.css">
    <title>Foodies-Admin Dashboard page</title>
</head>
<body>
    <?php include '../../components/adminHeader/adminHeader.php'; ?>
    <div class="mainContainer">
        <div class="postEditor">
        <h1 class="contentTitle">Edit Product</h1>
            <div class="boxContainer">
                <div class="formContainer">
                    <form action="" method="post" enctype="multipart/form-data" class="register">
                        <div class="inputField">
                            <p>post status <span>*</span></p>
                            <select name="status" class="box">
                                <option value="active">active</option>
                                <option value="deactive">deactive</option>
                            </select>
                        </div>
                        <div class="inputField">
                            <p>product name <span>*</span></p>
                            <input type="text" name="name" class="box">
                        </div>
                        <div class="inputField">
                            <p>product price <span>*</span></p>
                            <input type="number" name="price" class="box">
                        </div>
                        <div class="inputField">
                            <p>product detail <span>*</span></p>
                            <textarea name="productDetail" class="box"></textarea>
                        </div>
                        <div class="inputField">
                            <p>total stock <span>*</span></p>
                            <input type="number" name="stock" class="box" min="0" max="9999999999" maxlength="10">
                        </div>
                        <div class="inputField">
                            <p>product image <span>*</span></p>
                            <input type="file" name="image" accept="image/*" class="box">
                    <div class="flexBtn">
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