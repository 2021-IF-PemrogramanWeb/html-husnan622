<?php
session_start();
//if the user tries to log in without logging in
if( !isset($_SESSION["login"]) )
{
    header("Location: login.php"); //back to login page
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "pweb_studi-kasus1");

$query = "SELECT * FROM penjualan"; //query

$result = mysqli_query($conn, $query);
$penjualan = [];
    
while( $row = mysqli_fetch_assoc($result) )
{
    $penjualan[] = $row;
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
    <div class="container-fluid p-5">
        <div class="row-cols-1">
            <div class="col-md-2" style="margin-right: 5px;">
                <div class="row">
                    <div class="d-grid gap-3">
                        <a class="btn btn-primary" href="./graph.php">Graph</a>
                        <a class="btn btn-secondary" href="./logout.php">Logout<a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Hasil Penjualan</th>
                    </tr>

                    <?php $i=1; ?>
                    <?php foreach( $penjualan as $row ) : ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?= $row["Bulan"]; ?></td>
                        <td><?= $row["Tahun"]; ?></td>
                        <td><?= $row["Hasil_Penjualan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>