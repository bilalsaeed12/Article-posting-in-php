<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "createblog");
if (!$conn) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish database connection</h3>";
}

$sql = "SELECT * FROM addblog ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
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
<br>



<?php foreach ($query as $q) { ?>

    <div class="card" style="width: 28rem; height:33rem">
        <div class="card-body ">
            <img src="<?php echo $q['image'] ?> " width=" 100%">
            <h5 class=" card-title "><?php echo $q['title']; ?></h5>
            <p class=" card-text "> <?php echo $q['description']; ?></p>
            <p class=" card-text "><a href="detail.php"> More</a>
                <!-- <button type="" id="card-edit" class="btn btn-outline-primary card-btn">
                    Edit
                </button>
                <button type="" class="btn btn-outline-danger card-btn">
                    Delete
                </button> -->
            </p>


        </div>

    </div>
<?php } ?>


</html>