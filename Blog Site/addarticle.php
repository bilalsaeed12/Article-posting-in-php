<?php

$conn = mysqli_connect("localhost", "root", "", "createblog");
if (!$conn) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish database connection</h3>";
}

if (isset($_POST["new_post"])) {



    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_FILES['image'];
    $filename = $image['name'];
    $filetmp = $image['tmp_name'];

    $target = 'blog-images/' . $filename;
    move_uploaded_file($filetmp, $target);




    $sql = "INSERT INTO addblog(title, description, image) VALUES('$title','$description','$target')";
    mysqli_query($conn, $sql);
    header('Location: myprofile.php?info=added');
    // if (move_uploaded_file($image['tmp_name'], $target)) {
    //     echo "Image uploaded successfully";
    // } else {
    //     echo "Not uploaded";
    // }
}

// $file_name = $FILES['image']['name'];
// $file_tmp = $FILES['image']['tmp_name'];
// move_uploaded_file($file_tmp, "blog-images/" . $file_name);
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="addarticle.css">
    <title>My Profile page</title>
</head>

<body>


</body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">
                        <h3>Home</h3>
                    </a>
                </li>
            </ul>
            <form class="d-flex">
                <button type="submit" class="btn btn-light" style="border:solid">
                    <a href="myprofile.php" id="a-logout">My profile</a>
                </button>
                <button type="submit" class="btn btn-light;" style="border:solid">
                    <a href="logout.php" id="a-logout">Logout</a>
                </button>
            </form>
        </div>
    </div>
</nav>


<div class="myprofileForm">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Article Image</label><br>
            <input type="file" name="image" required>
        </div>
        <div class="form-group">
            <label>Article title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Article description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <button type=" submit" name="new_post" class="btn btn-primary">Add Article</button>
    </form>
</div>