<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Title</title>
</head>
<body>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/_header.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/options/connection_database.php');
?>
<h1 class="text-center">Головна сторінка</h1>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <?php
            $sql = "
                Select p.id, p.name, p.price, pi.name as image 
                from tbl_products as p, tbl_product_images as pi 
                WHERE p.id=pi.product_id and pi.priority=1;
                ";
            /*Циклом виводимо всі продукти які в нас є в базі*/
            foreach ($dbh->query($sql) as $row)
            {
                $id=$row['id'];
                $name=$row['name'];
                $image=$row['image'];
                $price=$row['price'];
                echo '
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <div class="card">
                    <img src="images/'.$image.'"
                         class="card-img-top" alt="Gaming Laptop"/>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">'.$name.'</h5>
                            <h5 class="text-dark mb-0">'.$price.'</h5>
                        </div>
                        <div class="mb-2 text-end">
                            <a href="product.php?id='.$id.'" class="btn btn-success">Купить</a>
                        </div>
                        <div class="mb-2 text-end">
                            <a href="edit.php?id='.$id.'" class="btn btn-warning">Змінити</a>
                        </div>
                        <div class="mb-2 text-end">
                            <form action="delete.php">
                                <input type="hidden" name="id">
                                <td><input type="submit" name="btn_delete" class="btn btn-danger" value="Видалити"/></td>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
                    ';
            }
            ?>
        </div>
    </div>
</section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>