<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Admin | Rezervimet</title>
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
                <a class="nav-link active">Lista e rezervimeve</a>
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
            <h3 class="text-center">Lista e rezervimeve</h3>
        </div>
        <div class="row col-12 justify-content-md-center">
        <table class="table col-lg-10 col-md-11 col-sm-12">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Emër Mbiemër</th>
            <th scope="col">Linja</th>
            <th scope="col">Me/Pa valixhe</th>
            <th scope="col">Datë/Orë</th>
            <th scope="col">Vajtje-ardhje?</th>
            <th scope="col">Data e rezervimit</th>
            <th scope="col">Fshi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                require_once("connection.php");
                if (isset($_GET['reserveID'])) { 
                    $_SESSION['reserveID'] = $_GET['reserveID'];
                    $rezervimid = $_SESSION['reserveID'];
                }else{
                    $rezervimid = '';
                }
                $sql = "DELETE FROM rezervime WHERE id = '$rezervimid'";
                mysqli_query($conn,$sql);
                $sql = "SELECT * FROM rezervime";
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
                   echo "<td>".$row[0]."</td>";
                   echo "<td>".$row[1]." ".$row[2]."</td>";
                   echo "<td>".$row[6]."-".$row[7]."</td>";
                   if($row[5]==1){
                      echo "<td>Me valixhe</td>";
                   }else{
                    echo "<td>Pa valixhe</td>";
                   }
                   echo "<td>".$row[9]."-".$row[10]."</td>";
                   if($row[8]==1){
                    echo "<td>Vajtje-ardhje</td>";
                    }else{
                    echo "<td>Vetëm vajtje</td>";
                    }
                   echo "<td>".$row[11]."</td>";
                   echo "<td><a href='rezervimetAdmin.php?reserveID=".$row[0]."'><button name='fshi' type='submit' class='btn fshi'>Fshi</button></a></td>";
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