<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="../../css/global.css">
        <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
        <link rel="stylesheet" href="totalOrderplaced.css">
        <title>Foodies - Admin Dashboard</title>
    </head>

    <body>
        <?php include '../../components/adminHeader/adminHeader.php' ?>
        
        <div class="mainContent">
            <h1 class="contentTitle">Total Order Placed</h1>
            <div class="orderRow">
                <div class="orderPlaced">
                    <p>User Name: John Doe</p>
                    <p>User ID: jjhhfihfwogowrgow</p>
                    <p>Placed on: 10/10/2023</p>
                    <p>Email: johndoe@gmail.com</p>
                    <p>Total Price: 500</p>
                    <p>Payment method: COD</p>
                    <p>Address: 12 Hai Ba Trung, D1, HCMC</p>
                    <select name="status" class="status">
                        <option value="Pending">Pending</option>
                        <option value="Complete">Complete</option>
                    </select>
                    <div>
                        <button class="updateOrder">Update payment</button>
                        <button class="updateOrder">Delete order</button>
                    </div>
                </div>   
                <div class="orderPlaced">
                    <p>User Name: John Doe</p>
                    <p>User ID: jjhhfihfwogowrgow</p>
                    <p>Placed on: 10/10/2023</p>
                    <p>Email: johndoe@gmail.com</p>
                    <p>Total Price: 500</p>
                    <p>Payment method: COD</p>
                    <p>Address: 12 Hai Ba Trung, D1, HCMC</p>
                    <select name="status" class="status">
                        <option value="Pending">Pending</option>
                        <option value="Complete">Complete</option>
                    </select>
                    <div>
                        <button class="updateOrder">Update payment</button>
                        <button class="updateOrder">Delete order</button>
                    </div>
                </div>   
            </div>
        </div>
        
    </body>

</html>