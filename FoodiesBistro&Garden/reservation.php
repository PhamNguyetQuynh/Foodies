<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>
<div style="padding: 190px; padding-top: 120px;">
    <h2 style="padding-bottom: 50px; text-align: center;">Reservation</h2>
    <form action="functions/reserve.php" method="POST">
        <div style="display: flex; gap: 50px;">
            <div style="flex-basis: 50%;">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="adult" class="form-label">Adult:</label>
                    <input type="number" name="adult" class="form-control" id="adult" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time:</label>
                    <input type="time" name="time" class="form-control" id="time" required>
                </div>
            </div>
            <div style="flex-basis: 50%;">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number:</label>
                    <input type="phone" name="phone" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" name="date" class="form-control" id="date-reserve" required>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Note:</label>
                    <input type="text" name="note" class="form-control" id="note">
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" name="reserveBtn" class="btn btn-primary">Reserve now</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('./includes/footer.php') ?>