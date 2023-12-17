<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
?>

<div style="padding: 5%; position: relative; background-color: rgba(255, 255, 255, 0.75);  margin: auto;">
    <img src="uploads/wp10509681.jpg" alt="Background Image" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: -1;">

    <div style="padding: 5%; padding-top: 0%;">
        <div class="border border-5 p-3 p-md-5 rounded ">
            <h2 class="display-4 fw-bold text-center" style="color: #957B3F;">Reservation</h2>
            <div class="underline mb-3" style="width: 20%; margin: auto;"></div>
            <form action="functions/reserve.php" method="POST" class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                </div>
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <button type="submit" name="reserveBtn" class="btn btn-danger btn-hover-bg-shade-amount" role="button">Reserve now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>