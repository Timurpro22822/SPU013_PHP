/*Логінка*/
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/_header.php');
?>

<h1 class="text-center">Вхід на сайт</h1>
<form class="col-md-6 offset-md-3" enctype="multipart/form-data" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Електронна пошта</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Увійти</button>
</form>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>