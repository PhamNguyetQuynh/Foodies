<script src="./assets/js/jquery-3.7.1.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/custom.js"></script>
<script src="./assets/js/owl.carousel.min.js"></script>
<!-- alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php if (isset($_SESSION['message'])) {
    ?>

        alertify.success('<?= $_SESSION['message']; ?>');
    <?php
        unset($_SESSION['message']);
    } ?>
</script>
<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">Foodies Bistro & Garden</h4>
                <div class="underline mb-2"> </div>
                <a href="index.php" class="text-white">Home</a> <br>
                <a href="#" class="text-white">About Us</a><br>
                <a href="category.php" class="text-white">Our Menu</a> <br>
            </div>
            <div class="col-md-4">
                <h4 class="text-white">Address</h4>
                <p class="text-white">42 Nguyen Hue Street, District 1, Ho Chi Minh City, Viet Nam</p>
                <a href="tel: +84989598472" class="text-white"><i class="fa fa-phone"></i> +(84) 98 95 98 472</a><br>
                <a href="mailto:xyz@gmail.com" class="text-white"><i class="fa fa-envelope"></i> foddiesbistroandgarden@gmail.com</a>
            </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.547984513965!2d106.69074697405321!3d10.76927748937904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fc8702ecc0b%3A0x4e830dc2c0483582!2sDaybyDay%20-%20Kitchen%20%26%20Bar!5e0!3m2!1svi!2s!4v1700565681506!5m2!1svi!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
</body>

</html>