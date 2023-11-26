
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  </head>
  <body>
  <?php
include('./functions/userFunctions.php');
include('./includes/header.php');
include('authenticate.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="cart.php">
                Cart
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <h1>Shopping Cart</h1><br>
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php
                        $items = getCartItems();
                        if (mysqli_num_rows($items) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5>Product</h5><br>
                                </div>
                                <div class="col-md-2">
                                    <h5>Price</h5><br>
                                </div>
                                <div class="col-md-2">
                                    <h5>Quantity</h5><br>
                                </div>
                                <div class="col-md-2">
                                    <h5>Remove</h5><br>
                                </div>
                            </div>
                            <div>
                                <?php
                                foreach ($items as $citem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" class="w-50">
                                            </div>
                                            <div class="col-md-4">
                                                <h5><?= $citem['name'] ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <h5><?= $citem['selling_price']  ?>vnd</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="product_id" value="<?= $citem['pid'] ?>">
                                                <div class="input-group mb-3" style="width:130px">
                                                    <button class="input-group-text decrement-btn update_qty">-</button>
                                                    <input type="text" class="form-control input-qty bg-white text-center" value="<?= $citem['product_qty'] ?>" disabled>
                                                    <button class="input-group-text increment-btn update_qty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                                    <i class="fa fa-trash me-2"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        } // End of if statement
                        else {
                        ?>
                            <div class="card card-body text-center">
                                <h4 class="py-3">
                                    Your cart is empty
                                </h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="float-end py-5">
                                        <a href="checkout.php" class="btn btn-outline-primary">Checkout</a>
                                    </div>
    </div>
</div>
<?php include('./includes/footer.php') ?>
  </body>
</html>

<style>
h1{
    font-weight: bold;
    color: #7D6323; 
    padding-left: 4.5rem;
}
.btn-outline-primary {
  color: #7D6323;
  border-color: #7D6323;
}
.btn-outline-primary:hover {
  color: #fff;
  background-color: #7D6323;
  border-color: #7D6323;
}
.deleteItem{
    margin-top: -1rem;
}
.btn.btn-danger.btn-sm.deleteItem{
    color: #fff;
  background-color: #7D6323;
  border-color: #7D6323;
}
.card.card-body.shadow{
    padding-top: 2rem;
    padding-left: 2rem;
    padding-right: 2rem;
}
</style>