<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Admin | Oraret</title>
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
                <a class="nav-link active">Lista e orareve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rezervimetAdmin.php">Lista e rezervimeve</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="perdoruesitAdmin.php">Lista e perdoruesve</a>
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
            <h3 class="text-center">Lista e orareve</h3>
        </div>
        <div class="row col-12 justify-content-md-center">
        <table class="table col-lg-7 col-md-11 col-sm-12">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nisja</th>
            <th scope="col">Destinacioni</th>
            <th scope="col">Data</th>
            <th scope="col">Ora</th>
            <th scope="col">Çmimi</th>
            <th scope="col">Fshi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                require_once("connection.php");
                if (isset($_GET['orarID'])) { 
                    $_SESSION['orarID'] = $_GET['orarID'];
                }
                $orarid = $_SESSION['orarID'];
                $sql = "DELETE FROM oraret WHERE id = '$orarid'";
                mysqli_query($conn,$sql);
                $sql = "SELECT * FROM oraret";
                $result = mysqli_query($conn,$sql);
                $data = array();
                while($row = $result->fetch_row())
                {
                    $data[] = $row;
                }

                $colNames = array_keys(reset($data));
    
                //print the rows
                foreach($data as $row)
                {
                   echo "<tr>";
                   foreach($colNames as $colName)
                   {
                      echo "<td>".$row[$colName]."</td>";
                   }
                   echo "<td><a href='oraretAdmin.php?orarID=".$row[0]."'><button name='fshi' type='submit' class='btn fshi'>Fshi</button></a></td>";
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