<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create Product</h1>
        </div>
        <!-- PHP insert code will be here -->
        <?php
        if ($_POST) {
            require_once('config/database.php');

            try {
                $query = "INSERT INTO products SET name = :name, description = :description, price = :price, created =:created ";
                $stmt = $con->prepare($query);

                $name = htmlspecialchars(strip_tags($_POST['name']));
                $description = htmlspecialchars(strip_tags($_POST['description']));
                $price = htmlspecialchars(strip_tags($_POST['price']));

                // bind param
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);

                $created = date('Y-m-d');
                $stmt->bindParam('created', $created);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Record was saved</div>";
                    # code...
                } else {
                    # code...
                    echo "<div class='alert alert-danger'> Unable to insert <div> ";
                }
            } catch (PDOException $e) {
                die('Error: ' . $e->getMessage());
                # code...
            }
        }
        ?>

        <!-- html form to create product will be here -->
        <form action="<?php echo htmlspecialchars($_SERVER["php_SELF"]); ?>" method="post">
            <table class="table table_hover table-responsive table-bordered">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" class="form-control" name="price"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary " value="Save">
                        <a href="index.php" class="btn btn-danger">Back to read</a>
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- end .container -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html