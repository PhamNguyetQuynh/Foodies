<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>

<div style="padding: 200px; padding-top: 80px; position: relative; background-color: rgba(255, 255, 255, 0.75);">
    <img src="uploads/wp10509681.jpg" alt="Background Image" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: -1;">


    <div class="border  border-5 p-5 rounded ">
        <h2 class="display-1 fw-bold text-center" style="color: #957B3F;">Get In Touch</h2>
        <div class="underline mb-3" style="width: 280px;margin-left:330px;"> </div>
        <form action="functions/sendMsg.php" method="POST">
            <div style="display: flex; gap: 50px;">
                <div style="flex-basis: 50%;">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First name:</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last name:</label>
                        <input type="lastName" name="lastName" class="form-control" id="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div style="flex-basis: 50%;">
                    <label class="form-label" for="msg">Message:</label>
                    <textarea class="form-control" id="msg" name="msg" style="height: 82%" required></textarea>
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="submit" name="sendMsgBtn" class="btn btn-danger btn-hover-bg-shade-amount" role="button">Send now</button>

                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


<?php include('./includes/footer.php') ?>