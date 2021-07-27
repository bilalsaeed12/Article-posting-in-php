<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "createblog");
if (!$conn) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish database connection</h3>";
}

$sql = "SELECT * FROM addblog ORDER BY id DESC";
$query = mysqli_query($conn, $sql);

// if (isset($_POST['delete'])) {
//     $id = $_GET['id'];
//     $mysqli->query("DELETE FROM addblog where id=$id");
// }



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="myprofile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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


<?php if (isset($_REQUEST['info'])) { ?>

    <?php if ($_REQUEST['info'] == "added") { ?>
        <div class="alert alert-success" role="alert">
            Post has been added successfully
        </div>

    <?php } ?>

<?php } ?>
<button type="submit" class="btn btn-light">
    <a href="addarticle.php" id="a-logout">
        <i class="fas fa-plus"></i>
        Add New Article</a>
</button>




<?php foreach ($query as $q) { ?>

    <div class="card" style="width: 28rem; height:33rem">
        <div class="card-body ">
            <img src="<?php echo $q['image'] ?> " width=" 100%">
            <h5 class=" card-title "><?php echo $q['title']; ?></h5>
            <p class=" card-text "> <?php echo $q['description']; ?></p>
            <p class=" card-text "><a href="detail.php?id=<?php echo $q['id'] ?>"> More</a>

                <a href="update.php?id=<?php echo $q['id'] ?>" class="btn btn- btn-outline-primary btn-edit">Edit</a>
                <!-- <button type="" id="card-edit" class="btn btn-outline-primary card-btn"> Edit </button> -->
            <form action="delete.php" style="display: inline-block" method="post">
                <input type="hidden" name="id" value="<?php echo  $q['id'] ?>">
                <button type="submit" class="btn  btn-outline-danger btn-del">Delete</button>

            </form>
            </p>


        </div>

    </div>
<?php } ?>



</html>