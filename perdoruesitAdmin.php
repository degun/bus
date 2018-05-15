<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Admin | Përdoruesit</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="rezervo.php">Rezervim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oraret.php">Oraret</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shtoOrar.php">Shto orar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oraretAdmin.php">Lista e orareve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rezervimetAdmin.php">Lista e rezervimeve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Lista e perdoruesve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Dil</a>
            </li>
        </ul>
        <form class="kerkimforma form-inline my-2 my-lg-0">
            <input class="kerkim form-control mr-sm-2" type="search" placeholder="Kërko" aria-label="Kërko">
        </form>
        </div>
</nav>

    <div class="futuQender qendrore" class="container col-12 justify-content-md-center">
        <div class="col-12">
            <h3 class="text-center">Lista e përdoruesve</h3>
        </div>
        <div class="row col-12 justify-content-md-center">
        <table class="table col-lg-10 col-md-11 col-sm-12">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Emër Mbiemër</th>
            <th scope="col">Mosha</th>
            <th scope="col">Email</th>
            <th scope="col">Fjalëkalimi</th>
            <th scope="col">Admin?</th>
            <th scope="col">Shto/hiq të drejta</th>
            <th scope="col">Fshi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                require_once("connection.php");
                if (isset($_GET['userID'])) { 
                    $_SESSION['userID'] = $_GET['userID'];
                    $perdoruesid = $_SESSION['userID'];
                }else{
                    $perdoruesid = '';
                }
                $sql = "DELETE FROM perdorues WHERE id = '$perdoruesid'";
                mysqli_query($conn,$sql);

                if (isset($_GET['adminUserID'])) { 
                    $_SESSION['adminUserID'] = $_GET['adminUserID'];
                    $adminuserid = $_SESSION['adminUserID'];
                    $setAdmin = $_GET['setAdmin'];
                }else{
                    $adminuserid = '';
                    $setAdmin = '';
                }
                $sql = "UPDATE perdorues SET admin = $setAdmin WHERE id = '$adminuserid'";
                mysqli_query($conn,$sql);

                echo $adminuserid;
                echo $setAdmin;

                $sql = "SELECT * FROM perdorues";
                $result = mysqli_query($conn,$sql);
                $data = array();
                while($row = $result->fetch_row())
                {
                    $data[] = $row;
                }
                foreach($data as $row)
                {
                   echo "<tr>";
                   echo "<td>".$row[0]."</td>";
                   echo "<td>".$row[1]." ".$row[2]."</td>";
                   echo "<td>".$row[4]."</td>";
                   echo "<td>".$row[3]."</td>";
                   echo "<td>".$row[5]."</td>";
                   if($row[6]==1){
                    echo "<td>Po</td>";
                   }else{
                    echo "<td>Jo</td>"; 
                   }
                   if($row[6]==1){
                    echo "<td><a href='perdoruesitAdmin.php?adminUserID=".$row[0]."&setAdmin=0'><button name='admin' type='submit' class='btn fshi'>Hiq admin</button></a></td>";
                   }else{
                    echo "<td><a href='perdoruesitAdmin.php?adminUserID=".$row[0]."&setAdmin=1'><button name='admin' type='submit' class='btn fshi'>Bëj admin</button></a></td>";
                   }
                   echo "<td><a href='perdoruesitAdmin.php?userID=".$row[0]."'><button name='fshi' type='submit' class='btn fshi'>Fshi</button></a></td>";
                   echo "</tr>";
                }
            ?>
        </tbody>
        </table>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>