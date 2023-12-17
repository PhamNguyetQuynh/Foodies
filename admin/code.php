<?php
include('../config/dbconn.php');
include('../functions/myFunctions.php');
if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    // Sử dụng Prepared Statements để ngăn chặn SQL injection
    $category_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($category_query);
    $stmt->bind_param('sssssssss', $name, $slug, $description, $meta_title, $meta_description, $meta_keywords, $status, $popular, $filename);

    if ($stmt->execute()) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("addCategory.php", "Category Added Successfully");
    } else {
        redirect("addCategory.php", "Something went wrong");
    }

    $stmt->close();
} else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads";
    $update_query = "UPDATE categories SET name=?, slug=?, description=?, meta_title=?, meta_description=?, meta_keywords=?, status=?, popular=?, image=? WHERE id=?";
    $stmt_update = $conn->prepare($update_query);
    $stmt_update->bind_param('sssssssssi', $name, $slug, $description, $meta_title, $meta_description, $meta_keywords, $status, $popular, $update_filename, $category_id);

    if ($stmt_update->execute()) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            // Xóa hình ảnh cũ
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("editCategory.php?id=$category_id", "Category updated successfully");
    } else {
        redirect("editCategory.php?id=$category_id", "Something went wrong");
    }

    $stmt_update->close();
} else if (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id=?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param('i', $category_id);

    if ($stmt_delete->execute()) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        echo 200;
    } else {
        echo 500;
    }

    $stmt_delete->close();
} else if (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    // check null
    if (
        $name != "" && $slug != "" && $description != ""
        && $original_price != "" && $selling_price != "" && $qty != ""
    ) {
        $product_query = "INSERT INTO products (category_id, name, slug, small_description, description, original_price, selling_price, qty, meta_title, meta_description, meta_keywords, status, trending, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_product = $conn->prepare($product_query);
        $stmt_product->bind_param('isssssssssssss', $category_id, $name, $slug, $small_description, $description, $original_price, $selling_price, $qty, $meta_title, $meta_description, $meta_keywords, $status, $trending, $filename);

        if ($stmt_product->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            redirect("addProduct.php", "Product Added Successfully");
        } else {
            redirect("addProduct.php", "Something went wrong");
        }
    } else {
        redirect("addProduct.php", "All fields are mandatory");
    }
    $stmt_product->close();
} else if (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET name=?, slug=?, small_description=?, description=?, original_price=?, selling_price=?, qty=?, meta_title=?, meta_description=?, meta_keywords=?, status=?, trending=?, image=? WHERE id=?";
    $stmt_update_product = $conn->prepare($update_product_query);
    $stmt_update_product->bind_param('ssssssssssssi', $name, $slug, $small_description, $description, $original_price, $selling_price, $qty, $meta_title, $meta_description, $meta_keywords, $status, $trending, $update_filename, $product_id);

    if ($stmt_update_product->execute()) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("editProduct.php?id=$product_id", "Product updated successfully");
    } else {
        redirect("editProduct.php?id=$product_id", "Something went wrong");
    }

    $stmt_update_product->close();
} else if (isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id=?";
    $stmt_product = $conn->prepare($product_query);
    $stmt_product->bind_param('i', $product_id);
    $stmt_product->execute();
    $result_product = $stmt_product->get_result();
    $product_data = $result_product->fetch_assoc();
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id=?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param('i', $product_id);
    $stmt_delete->execute();

    if ($stmt_delete->execute()) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        echo 200;
    } else {
        echo 500;
    }

    $stmt_product->close();
    $stmt_delete->close();
}else if (isset($_POST['update_order_btn'])) {
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $update_order_query = "UPDATE orders SET status=? WHERE tracking_no=?";
    $stmt_update_order = $conn->prepare($update_order_query);
    $stmt_update_order->bind_param('is', $order_status, $track_no);

    if ($stmt_update_order->execute()) {
        redirect("viewOrderDetail.php?t=$track_no", "Order status updated successfully");
    } else {
        // Handle errors
        redirect("viewOrderDetail.php?t=$track_no", "Something went wrong");
    }
    $stmt_update_order->close();
} else if (isset($_POST['update_reservation_btn'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $adult = $_POST['adult'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['note'];
    $status = $_POST['status'];

    $update_reservation_query = "UPDATE reservations SET name=?, adult=?, phone=?, date=?, time=?, note=?, status=? WHERE id=?";
    $stmt_update_reservation = $conn->prepare($update_reservation_query);
    $stmt_update_reservation->bind_param('sssssssi', $name, $adult, $phone, $date, $time, $note, $status, $id);

    if ($stmt_update_reservation->execute()) {
        redirect("updateReservation.php?id=$id", "Reservation updated successfully");
    } else {
        redirect("updateReservation.php?id=$id", "Something went wrong");
    }

    $stmt_update_reservation->close();
} else if (isset($_POST['add_reservation_btn'])) {

    $name = $_POST['name'];
    $adult = $_POST['adult'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['note'];
    $status = 2;

    $reservation_query = "INSERT INTO reservations (name, phone, adult, date, time, note, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_reservation = $conn->prepare($reservation_query);
    $stmt_reservation->bind_param('ssssssi', $name, $phone, $adult, $date, $time, $note, $status);

    if ($stmt_reservation->execute()) {
        redirect("reservation.php", "Reservation Added Successfully");
    } else {
        redirect("reservation.php", "Something went wrong");
    }

    $stmt_reservation->close();
} else {
    header('location: ../index.php');
}
