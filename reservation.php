<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>

<div style="padding: 10px;  position: relative; background-color: rgba(255, 255, 255, 0.75);">
    <img src="uploads/wp10509681.jpg" alt="Background Image" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: -1;">

    <div style="padding: 190px; padding-top: 60px;">
        <div class="border  border-5 p-5 rounded ">
            <h2 class="display-1 fw-bold text-center " style="color: #957B3F;">Reservation</h2>
            <div class="underline mb-3" style="width: 280px;margin-left:330px;"> </div>
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
                            <button type="submit" name="reserveBtn" class="btn btn-danger btn-hover-bg-shade-amount" role="button">Reserve now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('./includes/footer.php') ?>