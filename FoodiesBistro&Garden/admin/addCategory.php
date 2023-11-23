<?php
include('../middleware/adminMiddleware.php');
include('./includes/header.php');

?>

<div class="card-body">
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Enter Category Name" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Enter Slug" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea rows="3" name="description" placeholder="Enter Description" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea rows="3" name="meta_description" placeholder="Enter Meta Description" class="form-control"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
                <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
            </div>
        </div>
    </form>
</div>


<?php
include('./includes/footer.php');
?>
