<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>

<div style="padding: 5%; position: relative; background-color: rgba(255, 255, 255, 0.75);">
    <img src="uploads/wp10509681.jpg" alt="Background Image" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: -1;">

    <div class="border border-5 p-3 p-md-5 rounded">
        <h2 class="display-4 fw-bold text-center" style="color: #957B3F;">Get In Touch</h2>
        <div class="underline mb-3" style="width: 15%; margin: auto;"></div>
        <form action="functions/sendMsg.php" method="POST" class="row g-3">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <label class="form-label" for="msg">Message:</label>
                <textarea class="form-control" id="msg" name="msg" style="height: 82%" required></textarea>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end">
                <button type="submit" name="sendMsgBtn" class="btn btn-danger btn-hover-bg-shade-amount" role="button">Send now</button>
            </div>
        </form>
    </div>
</div>

<?php include('./includes/footer.php') ?>
