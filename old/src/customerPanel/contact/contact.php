<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="../../customerPanel/contact/contact.css">
    <script src="../../js/customerScript.js"></script>
    <title>Foodies-Shop</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Contact Us</h1>
            <p>Feel free to get in touch!</p>
        </div>
    </div>
            <div class="formContainer">
            
                <form action="" method="post" class="register">
                    <div class="inputField">
                    <label>First Name <sup>*</sup></label>
                    <input type="text" name="firstname" required placeholder="enter your first name" class="box">
                    </div>
                    <div class="inputField">
                    <label>Last Name <sup>*</sup></label>
                    <input type="text" name="lastname" required placeholder="enter your last name" class="box">
                    </div>
                    <div class="inputField">
                    <label>Email <sup>*</sup></label>
                    <input type="email" name="email" required placeholder="enter your email" class="box">
                    </div>
                    <div class="inputField">
                    <label>Message <sup>*</sup></label>
                    <textarea name="message" cols="30" rows="10" required placeholder="" class="box"></textarea>
                    </div>
                    <div class="flexBtn">
                    <button type="submit" name="sendmessage" class="btn">Send Now</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>
</html>