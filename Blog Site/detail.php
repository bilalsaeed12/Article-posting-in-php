<?php

$conn = mysqli_connect("localhost", "root", "", "createblog");
if (!$conn) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish database connection</h3>";
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: myprofile.php");
    exit;
}

$query = ("SELECT * FROM addblog where id=$id");
$result = mysqli_query($conn, $query);
$row = $result->fetch_array();

$title = $row['title'];
$description = $row['description'];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="detail.css">
    <title>Hello, world!</title>
</head>

<body>

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


    <div class="container ">
        <div class="row">
            <div class="form-group">


                <div style="font-size: 20px;">
                    <h4><?php echo $title ?></h4>
                </div>
            </div>
            <div class="form-group">


                <div style="font-size: 20px;">
                    <?php echo $description ?>
                </div>
                <br>

                <form method="post" enctype="multipart/form-data">
                    <?php if ($row['image']) : ?>
                        <img src="<?php echo $row['image'] ?>" class="product-img-view" width="50%" height="50%">
                    <?php endif; ?>



                </form>

            </div>
        </div>

</body>

</html>