<?php
include('./functions/userFunctions.php');
include('./includes/header.php');
include('authenticate.php');
include('./config/dbconn.php');
?> 
<?php

$host="localhost";
$username="root";
$password="";
$database="foodies";
//create db connection
$conn=mysqli_connect($host, $username, $password, $database);
//check db connection
// if(!$conn){
//     die("Connection failed: ". mysqli_connect_errno());
// }else{
//     echo "Connected succesflly";
// }

?>
<!-- check availability form -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-4 mb-2">
                        <label class="form-label" style="font-weight: 500;">Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-4 mb-2">
                    <label for="time" class="form-label" style="font-weight: 500;">Time:</label>
                    <input type="time" name="time" class="form-control shadow-none" id="time" required>
                </div>
                    <div class="col-lg-3 mb-2">
                        <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-select shadow-none">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-2">
                        <button type="submit" class="btn btn-outline-primary shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- our table -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR TABLES</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="./uploads/table_4.webp" class="card-img-top">
                <div class="card-body">
                <h5>2 Person Dining Table</h5>
                <div class="d-flex justify-content-evenly mb-1">
                <a href="./reservation.php" class="btn btn-outline-primary shadow-none">Book Now</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

?>
<!-- reach us -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501725.41845258337!2d106.365569182595!3d10.755292858424115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1702559727969!5m2!1svi!2s"  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="bg-white pd-4 rounded mb-4">
                <h5>Call us</h5>
                <a href="tel: +84123456789" class="d-inline-block mb-2 text-decoration-none text-dark">
                    (+84) 123 456 789
                </a>
            </div>
            <div class="bg-white pd-4 rounded mb-4">
                <h5>Follow us</h5>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-white text-dark fs-6 p-2">
                        Twitter
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-white text-dark fs-6 p-2">
                        Facebook
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block">
                    <span class="badge bg-white text-dark fs-6 p-2">
                        Instagram
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<br><br><br>
<br><br><br>
<?php include('./includes/footer.php'); ?>