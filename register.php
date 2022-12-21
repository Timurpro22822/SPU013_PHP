<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST REQUEST SERVER";
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phoneNumber = $_POST['phoneNumber'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    print_r([$name, $surname, $phoneNumber, $country, $email, $password]);
    include_once($_SERVER['DOCUMENT_ROOT'] . '/options/connection_database.php');
    $sql = 'INSERT INTO tbl_users (name, surname, phoneNumber, country, email, password) VALUES (:name, :surname, :phoneNumber, :country, :email, :password);';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $sql = "SELECT LAST_INSERT_ID() as id;";
    $item = $dbh->query($sql)->fetch();
    $insert_id = $item['id'];

    header("Location: /");
    exit();
}
?>
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

<h1 class="text-center">Регістрація на сайт</h1>
<form class="col-md-6 offset-md-3" enctype="multipart/form-data" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Ім'я</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Прізвище</label>
        <input type="text" class="form-control" id="surname" name="surname">
    </div>
    <div class="mb-3">
        <label for="phoneNumber" class="form-label">Телефон</label>
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Країна</label>
        <input type="text" class="form-control" id="country" name="country">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Електронна пошта</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Зарегіструватися</button>
</form>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>