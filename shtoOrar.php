<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/glyphicons-only-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Admin | Shto Orar</title>
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
                <a class="nav-link active">Shto orar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oraretAdmin.php">Lista e orareve</a>
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
        </div>
    </nav>
    <?php
        session_start();
        $ngaErr = $neErr = $dataErr = $oraErr = $cmimiErr = "";
        $nga = $ne = $data = $ora = $cmimi = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nga"])) {
                $ngaErr = "Mungon nisja";
            }
            else {
                $nga = $_POST["nga"];
            }
    
            if (empty($_POST["ne"])) {
                $neErr = "Mungon destinacioni";
            }
            else {
                $ne = $_POST["ne"];
            }
    
            if (empty($_POST["data"]))  {
                $dataErr = "Mungon data";
            }
            else {
                $data = $_POST["data"];
            }

            if (empty($_POST["ora"]))  {
                $oraErr = "Mungon ora";
            }
            else {
                $ora = $_POST["ora"];
            }

            if (empty($_POST["cmimi"]))  {
                $cmimiErr = "Mungon cmimi";
            }
            else {
                $cmimi = $_POST["cmimi"];
            }
        }  

        require_once("connection.php");
        $sql = "INSERT INTO oraret (nga, ne, data, ora, cmimi) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nga, $ne, $data, $ora, $cmimi);
        if(isset($_POST['shto'])) {
            $stmt->execute();
        }
    ?>

    <div class="futuQender qendrore" class="container col-12 justify-content-md-center">
        <div class="col-12">
            <h3 class="text-center">Shto orar</h3>
        </div>
        <form id="regjistrim" class="col-lg-7 col-md-8 col-sm-9" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group form-inline">
                <input type="text" name="nga" id="nga" list="qytete" autocomplete="on" class="form-control col-md-5 col-sm-5 m-2" placeholder="Nisja">
                <input type="text" name="ne" id="ne" list="qytete" autocomplete="on" class="form-control col-md-5 col-sm-5 m-2" placeholder="Destinacioni">
            </div>
            <div class="form-group form-inline">
                <input type="text" name="data" id="data" class="form-control col-md-5 col-sm-10 m-2" placeholder="Data e nisjes">
                <input type="text" name="ora" id="ora" class="form-control col-md-2 col-sm-10 m-2" placeholder="Ora">
            </div>
            <div class="form-group form-inline">
                <input type="number" name="cmimi" id="cmimi" class="form-control col-md-5 col-sm-10 m-2" placeholder="Çmimi">
            </div>
            <div class="form-group text-center">
                    <button type="submit" name="shto" id="shto" class="form-control center-block col-lg-2 col-md-3 col-sm-12 btn">Shto</button>
            </div>
            <h6 class="text-center col-md-7">
                <?php
                    echo $ngaErr;
                    echo $neErr;
                    echo $dataErr;
                    echo $oraErr;
                    echo $cmimiErr;
                ?>
            </h6>
        </form>
    </div>

    <datalist id="qytete">
        <option value='Bajram Curr' />
        <option value='Ballsh' />
        <option value='Belsh' />
        <option value='Berat' />
        <option value='Bilisht' />
        <option value='Bujanoc' />
        <option value='Bulqizë' />
        <option value='Burrel' />
        <option value='Cërrik' />
        <option value='Çorovodë' />
        <option value='Deçan' />
        <option value='Delvinë' />
        <option value='Dibër' />
        <option value='Divjakë' />
        <option value='Dragash' />
        <option value='Durrës' />
        <option value='Elbasan' />
        <option value='Ersekë' />
        <option value='Ferizaj' />
        <option value='Fier' />
        <option value='Fushë Kosovë' />
        <option value='Fushë-Arrëz' />
        <option value='Fushë-Krujë' />
        <option value='Gllogoc' />
        <option value='Gostivar' />
        <option value='Gramsh' />
        <option value='Gjakovë' />
        <option value='Gjilan' />
        <option value='Gjirokastër' />
        <option value='Himarë' />
        <option value='Istog' />
        <option value='Kaçanik' />
        <option value='Kamenicë' />
        <option value='Kamzë' />
        <option value='Kastriot' />
        <option value='Kavajë' />
        <option value='Këlcyrë' />
        <option value='Kërçovë' />
        <option value='Klinë' />
        <option value='Klos' />
        <option value='Konispol' />
        <option value='Koplik' />
        <option value='Korçë' />
        <option value='Krujë' />
        <option value='Krumë' />
        <option value='Krushevë' />
        <option value='Kuçovë' />
        <option value='Kukës' />
        <option value='Kumanovë' />
        <option value='Laç' />
        <option value='Leskovik' />
        <option value='Lezhë' />
        <option value='Libohovë' />
        <option value='Librazhd' />
        <option value='Lipjan' />
        <option value='Lushnjë' />
        <option value='Maliq' />
        <option value='Malishevë' />
        <option value='Mamurras' />
        <option value='Manzë' />
        <option value='Medvegjë' />
        <option value='Memaliaj' />
        <option value='Mitrovicë' />
        <option value='Orikum' />
        <option value='Patos' />
        <option value='Pejë' />
        <option value='Peqin' />
        <option value='Peshkopi' />
        <option value='Përmet' />
        <option value='Përrenjas' />
        <option value='Podujevë' />
        <option value='Pogradec' />
        <option value='Poliçan' />
        <option value='Preshevë' />
        <option value='Prishtinë' />
        <option value='Prizren' />
        <option value='Pukë' />
        <option value='Rahovec' />
        <option value='Roskovec' />
        <option value='Rubik' />
        <option value='Rrëshen' />
        <option value='Rrogozhinë' />
        <option value='Sarandë' />
        <option value='Selenicë' />
        <option value='Skënderaj' />
        <option value='Strugë' />
        <option value='Suharekë' />
        <option value='Sukth' />
        <option value='Shijak' />
        <option value='Shkodër' />
        <option value='Shkup' />
        <option value='Shtime' />
        <option value='Tepelenë' />
        <option value='Tetovë' />
        <option value='Tiranë' />
        <option value='Tuz' />
        <option value='Ulqin' />
        <option value='Urë Vajgurore' />
        <option value='Vau i Dejës' />
        <option value='Vlorë' />
        <option value='Vorë' />
        <option value='Vushtrri' />
    </datalist>

    <script src="js/jquery.min.js"></script>
    <script src="js/moment-with-locales.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/oraret.js"></script>
</body>
</html>