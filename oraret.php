<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Oraret</title>
</head>
<body>
    <?php 
        session_start();
        require_once("connection.php");
        $id = $_SESSION['perdoruesId'];
        $sql = "SELECT * FROM perdorues WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_row();
        $admin=$row[6];
    ?>
<nav class="navbar navbar-expand-lg <?php if($admin == 1){echo 'navbar-dark bg-dark';}else{echo 'navbar-light bg-light';} ?>">
        <a class="navbar-brand" href="/"><?php if($admin == 1){echo 'Admin';}else{echo 'Faqja kryesore';} ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <?php 
                if(!($_SESSION['perdoruesId']=='')){
                    echo '<li class="nav-item">
                        <a class="nav-link" href="rezervo.php">Rezervim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Oraret</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Dil</a>
                        </li>';
                }
                if($admin == 1){
                    echo '
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
                            <a class="nav-link" href="perdoruesitAdmin.php">Lista e perdoruesve</a>
                        </li>';
                }
            ?>
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
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once("connection.php");
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
                   if(!($_SESSION['perdoruesId']=='')){
                       echo "<td><a href='rezervo.php?orarID=".$row[0]."'><button name='konfirmo' type='submit' class='btn konfirmo'>Konfirmo</button></a></td>";
                   }
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