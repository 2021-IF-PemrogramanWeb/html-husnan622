<?php
session_start();

//if the user is already logged in, can't return to the login page
if( isset($_SESSION["login"]) )
{
    header("Location: index.php"); //back to index page
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "pweb_studi-kasus1");

//check submit button pressed
if( isset($_POST["login"]) )
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    //check email is in the database or not
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'");
    

    if( mysqli_num_rows($cek) === 1 )
    {
        //check password
        $row = mysqli_fetch_array($cek); //take all data
        if ( $password == $row["Password"] )
        {
            //set session
            $_SESSION["login"] = true;

            header("Location: index.php"); //redirected to index.php
            
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Pemrograman Web</title>
</head>

<body>
    <?php if( isset($error) ) :?>
    <p>Username atau password salah</p>
    <?php endif; ?>

    <div class="container-fluid d-flex p-5 justify-content-center">
        <div class="row">
            <div class="row">
                <form class="p-5" action="" method="post">
                    <div class="mb-3 col-12">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-success" name="login">Submit</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>