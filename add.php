<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title    = $_POST['title'];
    $isbn     = $_POST['isbn'];
    $category = $_POST['category'];
    $pages    = $_POST['pages'];
    $price    = $_POST['price'];

    $sql = "INSERT INTO books (title, isbn, category, page_number, unit_price)
            VAlUES ('$title', '$isbn', '$category', '$pages', '$price')";

    if($conn->query($sql) == TRUE ){
        $successMessage = "Data inserted!!!";
    } else {
        $errorMessage = "Insert error". $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New book</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="add.css">

</head>
<body>
    <main class="container my-5">
        <h2>Add New Book to database</h2>
        <?php 
        if(!empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <storng?>$errorMessage</strong><button type='button' class='btn-close' data-bs-dismiss='alert'
                    aria-label= 'Close'></button>
                </div>
                ";
        }
        ?>
        <form method="POST">
            
            <div class="btn-group">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="title" required>
                </div>
            </div>
            <div class="btn-group">
                <label class="col-sm-3 col-form-label">ISBN</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="isbn" required>
                </div>
            </div>
            <div class="btn-group">
                <label class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="category" required>
                </div>
            </div>
            <div class="btn-group">
                <label class="col-sm-3 col-form-label">Page Number</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="pages" required>
                </div>
            </div>
            <div class="btn-group">
                <label class="col-sm-3 col-form-label">Unit Price</label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="price" required>
                </div>
            </div>
            <?php 
            if(!empty($errorMessage)){
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <storng?>$errorMessage</strong><button type='button' class='btn-close' data-bs-dismiss='alert'
                        aria-label= 'Close'></button>
                    </div>
                    ";
            }
            ?>
            <div class="btn-group">
                <button type="submit" class="btn btn-add">Add New</button>
                <button type="submit" class="btn btn-exit"><a href="index.php">Exit</a></button>
            </div>

    </main>
</body>
</html>