<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
include('authenticate.php');
$cartItems = getCartItems();
if (mysqli_num_rows($cartItems) == 0) {
    header('Location: index.php');
}
?>
<div class="py-3 bg-primary">
    <div class="container">

        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="checkout.php">
                Checkout
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <form action="functions/placeOrder.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                <small class="text-danger name"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" id="phone" required placeholder="Enter your phone number" class="form-control">
                                <small class="text-danger phone"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">E-mail</label>
                                <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                                <small class="text-danger email"></small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea name="address" id="address" class="form-control" required rows=5"></textarea>
                                <small class="text-danger address"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Comments</label>
                                <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
                                <small class="text-danger comments"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 overflow-auto">
                        <h5>Order Details</h5>
                        <hr>

                        <?php $items = getCartItems();
                        $totalPrice = 0;
                        foreach ($items as $citem) {
                        ?>
                            <div class="mb-1 border">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="65px" height="90px">
                                    </div>
                                    <div class="col-md-5">
                                        <label><?= $citem['name'] ?></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>x <?= $citem['product_qty']  ?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label><?= $citem['selling_price'] ?>vnd</label>
                                    </div>


                                </div>
                            </div>


                        <?php
                            $totalPrice += $citem['selling_price'] * $citem['product_qty'];
                        }   ?>
                        <hr>
                        <h5>Total Price: <span class="float-end mx-5 fw-bold"><?= $totalPrice ?>vnd</span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">
                                Cofirm and place order | COD
                            </button>
                            <p></p>
                            <input type="hidden" name="payment_mode" value="MOMO">
                            <button type="submit" name="momoATMBtn" class="btn btn-success w-100" style="background-color: #C62E86;">
                                MoMo
                            </button>
                            <div id="paypal-button-container" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </form>


        </div>

    </div>

</div>


<?php include('./includes/footer.php') ?>
<!-- Replace the "test" client-id value with your client-id -->
<script src="https://www.paypal.com/sdk/js?client-id=AVz3lHrq_vQjrPadRGvrRswIvHAq2OuJ0qq-ynQS2Y-FjcvtrxrS9Z95HK2BHozkc6FZu0TGgDhlgvMm&currency=USD"></script>
<script>
    paypal.Buttons({
        onClick() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            if (name.length == 0) {
                // alert("name is required");
                $('.name').text("*This field is required");
            } else {
                $('.name').text("");
            }
            if (email.length == 0) {
                // alert("name is required");
                $('.email').text("*This field is required");
            } else {
                $('.email').text("");
            }
            if (phone.length == 0) {
                // alert("name is required");
                $('.phone').text("*This field is required");
            } else {
                $('.phone').text("");
            }
            if (address.length == 0) {
                // alert("name is required");
                $('.address').text("*This field is required");
            } else {
                $('.address').text("");
            }
            if (name.length == 0 || email.length == 0 || phone.length == 0 || address.length == 0) {
                return false;
            }

        },
        //set up the transactions when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        // value: '<?= $totalPrice ?>'
                        value: '0.1'
                    }
                }]
            });
        },
        //finalize the transaction after paer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                const transaction = orderData.purchase_units[0].payments.captures[0];
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var comments = $('#comments').val(); // Include the comments field
                var data = {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'address': address,
                    'comments': comments, // Add this line for the comments field
                    'payment_mode': "Paid by PayPal",
                    'payment_id': transaction.id,
                    'placeOrderBtn': true,
                };

                $.ajax({
                    method: "POST",
                    url: "functions/placeOrder.php",
                    data: data,
                    success: function(response) {
                        if (response == 201) {
                            alertify.success("Order Placed Successfully");
                            window.location.href = 'myOrder.php';
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });
            });
        }




    }).render('#paypal-button-container');
</script>