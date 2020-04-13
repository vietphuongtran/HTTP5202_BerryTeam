<!DOCTYPE html>
<?php
//This application was created following a Youtube tutorial.
//fundamentally the database connection work very similarly to the ones made in class, just different syntax
include_once 'includes/dbh.inc.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Media Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <? include '../includes/header-landing.php' ?>
  <? include '../includes/navigation.php' ?>
    <main>

      <section class="gallery-links">
        <div class="wrapper">
          <h2>Gallery</h2>

          <div class="gallery-container">
            <?php
                //This gets the images from the database and creates a block showing the img and the values given to it.
                //If the entry form is left blank, it will add "empty" to the database.
            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">
                  <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                  <h3>'.$row["titleGallery"].'</h3>
                  <p>'.$row["descGallery"].'</p>
                </a>';
              }
            }
            ?>
          </div>
            <div class="gallery-upload">
              <h2>Upload</h2>
                <!-- The form to upload an image -->
              <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                  <label for="filename">File Name</label>
                <input type="text" name="filename" placeholder="File name...">
                  <label for="filetitle">File Title</label>
                <input type="text" name="filetitle" placeholder="Image title...">
                  <label for="filedesc">Description</label>
                <input type="text" name="filedesc" placeholder="Image description...">
                <input type="file" name="file">
                <button type="submit" name="submit">UPLOAD</button>
              </form>
            </div>
        </div>
      </section>

    </main>
  <? include '../includes/footer-landing.php' ?>
  </body>
</html>
