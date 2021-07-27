<?php


function function_alert($message)
{

    // Display the alert box 
    echo "<script>alert('$message');</script>";
}



session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'userregistration');

if (isset($_POST["login"])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];

    $s = "select * from usertable where name = '$name' && password = '$pass'";



    $result = mysqli_query($con, $s);

    $num  = mysqli_num_rows($result);

    if ($num == 1) {
        header('Location: home.php');
    } else {
        function_alert('User not found');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Sign up form</title>
</head>

<body>

    <?php if (isset($_REQUEST['info'])) { ?>

        <?php if ($_REQUEST['info'] == "added") { ?>
            <div class="alert alert-success" style="background-color:#8ac06c; border:none;" role="alert">
                <div class="text-center">
                    <h4>Registered Successfully</h4>
                </div>
            </div>

        <?php } ?>

    <?php } ?>

    <form action="" method="post">
        <div class="form">
            <div class="mb-3">

                <input type="text" class="form-control" placeholder="User Name" name="name" id="exampleInputEmail1" required>
                <input type="password" class="form-control" placeholder="Password" name="password" id="exampleInputPassword1" required>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <div class="text-center">

                    Not registered? <a href="sign up.php"> Create an account</a>

                </div>
            </div>
        </div>
    </form>
</body>

</html>