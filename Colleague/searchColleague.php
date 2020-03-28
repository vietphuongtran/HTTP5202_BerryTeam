<?php
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

if(isset($_POST['searchColleague'])) {
    $searchContent = $_POST['searchContent'];

    $user = 'root';
    $password = 'passwordroot';
    $dbname = 'phpclass';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM berryteam 
    WHERE `ID` =  \"$searchContent\" || `f-name` = \"$searchContent\" || `l-name` = \"$searchContent\" || `department` = \"$searchContent\" || `phone` = \"$searchContent\" || `email` = \"$searchContent\"";
    $pdobtm = $dbcon->prepare($sql); //btm: berryteam system
    //$pdobtm->execute();
    $count = $pdobtm->execute();
    $colleagues = $pdobtm->fetchAll(PDO::FETCH_ASSOC);

    //$count = $pdobtm->execute();
    if ($count == "" || $count == null) {
        echo "Couldn't find a result";
    }
}

?>

<html lang="en">
<head>
    <title>List of colleagues</title>
    <meta name="description" content="Berryteam">
    <meta name="keywords" content="Berryteam, Colleague, Admission">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<p class="h1 text-center">Berryteam </p>
<p>Search result</p>
<a href="listColleague.php" id="btn_back" class="btn btn-success ">Back</a>

<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Department</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($colleagues as $colleague) { ?>
            <tr>
                <th><?= $colleague['ID'] ?></th>
                <td><?= $colleague['f-name'] ?></td>
                <td><?= $colleague['l-name'] ?></td>
                <td><?= $colleague['department'] ?></td>
                <td><?= $colleague['phone'] ?></td>
                <td><?= $colleague['email'] ?></td>
                <td>
                    <form action="updateColleague.php" method="post">
                        <input type="hidden" name="id" value="<?= $colleague['ID'] ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateColleague" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteColleague.php" method="post">
                        <input type="hidden" name="id" value="<?= $colleague['ID'] ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteColleague" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div name="endresult">
        --- end of result ---
    </div>
    <a href="addColleague.php" id="btn_addColleague" class="btn btn-success btn-lg float-right">New Colleague</a>

</div>
</body>
</html>


