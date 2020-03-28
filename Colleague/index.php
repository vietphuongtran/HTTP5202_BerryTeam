<?php

$sql = "SELECT * FROM products";
$pdobtm = $dbcon->prepare($sql);
$pdobtm->execute();

$colleagues = $pdobtm->fetchAll(PDO::FETCH_ASSOC);


?>

<html lang="en">
<head>
    <title>List of products</title>
    <meta name="description" content="products">
    <meta name="keywords" content="products, price, Admission">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<p class="h1 text-center">List of products</p>

<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Products Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($colleagues as $colleague) { ?>
            <tr>
                <th><?= $colleague['id'] ?></th>
                <td><?= $colleague['name'] ?></td>
                <td><?= $colleague['description'] ?></td>
                <td><?= $colleague['price'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>



