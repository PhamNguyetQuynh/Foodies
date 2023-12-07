<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>
<div style="padding: 190px; padding-top: 120px;">
    <h2 style="padding-bottom: 50px; text-align: center;">Get In Touch</h2>
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
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" name="sendMsgBtn" class="btn btn-primary">Send now</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('./includes/footer.php') ?>