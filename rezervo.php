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
    <title>Rezervim bilete</title>
</head>
<body>

    <?php 
        // mbush formën duke njohur përdoruesin dhe përzgjedhjen e tij të orarit
        session_start();
        require_once("connection.php");
        $id = $_SESSION['perdoruesId'];
        $sql = "SELECT * FROM perdorues WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_row();
        $admin=$row[6];
        $emriGati = $row[1];
        $mbiemriGati = $row[2];
        $emailGati = $row[3];
        $moshaGati = $row[4];

        $result = $row = $sql = "";
        
        if (isset($_GET['orarID'])) { 
            $_SESSION['orarID'] = $_GET['orarID'];
        }
        $orarid = $_SESSION['orarID'];
        $sql = "SELECT * FROM oraret WHERE id = '$orarid'";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_row();
        $ngaGati = $row[1];
        $neGati = $row[2];
        $dataGati = $row[3];
        $oraGati = $row[4];

    ?>
    <nav class="navbar navbar-expand-lg <?php if($admin == 1){echo 'navbar-dark bg-dark';}else{echo 'navbar-light bg-light';} ?>">
        <a class="navbar-brand" href="/"><?php if($admin == 1){echo 'Admin';}else{echo 'Faqja kryesore';} ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active">Rezervim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oraret.php">Oraret</a>
            </li>
           
            <?php 
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
             <li class="nav-item">
                <a class="nav-link" href="/">Dil</a>
            </li>
            </ul>
        </div>
    </nav>

    <?php
        $emri = $mbiemri = $email = $mosha = $nga = $ne = $data = $ora = $errs = "";
        $valixhe = $vajtjeardhje = 0;
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once("validation.php");

            $errs = "";

            if (validateShkronja($_POST["emri"], "Emri") == "") {
                $emri = $_POST["emri"];
            }
            else {
                $errs .= validateShkronja($_POST["emri"], "Emri")."<br>";
            }
    
            if (validateShkronja($_POST["emri"], "Mbiemri") == "") {
                $mbiemri = $_POST["mbiemri"];
            }
            else {
                $errs .= validateShkronja($_POST["mbiemri"], "Mbiemri")."<br>";
            }
    
            if (validateEmail($_POST["email"], "Adresa e e-mail-it") == "") {
                $email = $_POST["email"];
            }
            else {
                $errs .= validateEmail($_POST["email"], "Adresa e e-mail-it")."<br>";
            }

            if (validateNumra($_POST["mosha"], "mosha") == "") {
                $mosha = $_POST["mosha"];
            }
            else {
                $errs .= validateNumra($_POST["mosha"], "mosha")."<br>";
            }

            if (validateShkronja($_POST["nga"], "Nisja") == "") {
                $nga = $_POST["nga"];
            }
            else {
                $errs .= validateShkronja($_POST["nga"], "Nisja")."<br>";
            }

            if (validateShkronja($_POST["ne"], "Destinacioni") == "") {
                $ne = $_POST["ne"];
            }
            else {
                $errs .= validateShkronja($_POST["ne"], "Destinacioni")."<br>";
            }

            if (validateNotEmpty($_POST["data"], "data") == "") {
                $data = $_POST["data"];
            }
            else {
                $errs .= validateNotEmpty($_POST["data"], "data")."<br>";
            }

            if (validateNotEmpty($_POST["ora"], "ora") == "") {
                $ora = $_POST["ora"];
            }
            else {
                $errs .= validateNotEmpty($_POST["ora"], "ora")."<br>";
            }

            if(isset($_POST["valixhe"])){
                if (validateNotEmpty($_POST["valixhe"], "valixhe") == "") {
                    if($_POST["valixhe"] == 'mevalixhe'){$valixhe = 1;}else{$valixhe = 0;}
                }
                else {
                    $errs .= validateNotEmpty($_POST["valixhe"], "valixhe")."<br>";
                }
            }else {
                $errs .= "Mungon valixhe<br>";
            }

            if(isset($_POST["vajtjeardhje"])){
                if (validateNotEmpty($_POST["vajtjeardhje"], "vajtjeardhje") == "") {
                    if($_POST["vajtjeardhje"] == 'vajtje-ardhje'){$vajtjeardhje = 1;}else{$vajtjeardhje = 0;}
                }
                else {
                    $errs .= validateNotEmpty($_POST["vajtjeardhje"], "vajtjeardhje")."<br>";
                }
            }else {
                $errs .= "Mungon vajtje-ardhje<br>";
            }
            
        } 
       
        if($errs == ""){ 
            $sql = "INSERT INTO rezervime (emri, mbiemri, email, mosha, valixhe, nga, ne, vajtjeardhje, data, ora) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiississ", $emri, $mbiemri, $email, $mosha, $valixhe, $nga, $ne, $vajtjeardhje, $data, $ora);
            if(isset($_POST['rezervo'])) {
                $stmt->execute();
                $_SESSION['rezervimId'] = $conn->insert_id;
            }
        }
    ?>

    <div class="qendrore" class="container col-12 justify-content-md-center">
        <div class="col-12">
            <h3 class="text-center">Rezervo biletën </h3>
            <!-- <?php echo $_SESSION['orarId']; ?> -->
        </div>
        <form id="kerkese" class="col-lg-6 col-md-7 col-sm-8" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group form-inline">
                <input type="text" name="emri" id="emri" class="form-control col-md-5 col-sm-5 m-2" value="<?php if(!($emri == "")){echo $emri;}else{echo $emriGati;} ?>" placeholder="Emri">
                <input type="text" name="mbiemri" id="mbiemri" class="form-control col-md-5 col-sm-5 m-2" value="<?php if(!($mbiemri == "")){echo $mbiemri;}else{echo $mbiemriGati;} ?>" placeholder="Mbiemri">
            </div>
            <div class="form-group form-inline">
                <input type="text" name="email" id="email" class="form-control col-md-5 col-sm-10 m-2" value="<?php if(!($email == "")){echo $email;}else{echo $emailGati;} ?>" placeholder="Adresa e e-mail-it">
                <input type="number" name="mosha" id="mosha" class="form-control col-md-2 col-sm-10 m-2" value="<?php if(!($mosha == "")){echo $mosha;}else{echo $moshaGati;} ?>" placeholder="Mosha" size="3" min="12" max="120">
                <select name="valixhe" id="valixhe" class="form-control col-md-3 col-sm-10 m-2">
                    <option value="" disabled selected>Valixhe?</option>
                    <option value="mevalixhe">Me valixhe</option>
                    <option value="pavalixhe">Pa valixhe</option>
                </select>
            </div>
            <div class="form-group form-inline">
            <input type="text" name="nga" id="nga" list="qytete" autocomplete="on" class="form-control col-md-3 col-sm-5 m-2" value="<?php if(!($nga == "")){echo $nga;}else{echo $ngaGati;} ?>" placeholder="Nga cili vend?">
            <input type="text" name="ne" id="ne" list="qytete" autocomplete="on" class="form-control col-md-3 col-sm-5 m-2" value="<?php if(!($ne == "")){echo $ne;}else{echo $neGati;} ?>" placeholder="Në cilin vend?">
            <select name="vajtjeardhje" id="vajtjeardhje" class="form-control col-md-4 col-sm-10 m-2">
                <option value="" disabled selected>Vajtje-ardhje?</option>
                <option value="vajtje">Vetëm vajtje</option>
                <option value="vajtje-ardhje">Vajtje-ardhje</option>
            </select>
            </div>
            <div class="form-group form-inline">
                <input type="text" name="data" id="data" class="form-control col-md-3 col-sm-5 m-2" value="<?php if(!($data == "")){echo $data;}else{echo $dataGati;} ?>" placeholder="Data">
                <input type="text" name="ora" id="ora" class="form-control col-md-2 col-sm-5 m-2" value="<?php if(!($ora == "")){echo $ora;}else{echo $oraGati;} ?>" placeholder="Ora">
            </div>
            <h6>Nëse jeni i paqartë mund të shihni oraret <a href="oraret.php">këtu</a></h6>
            <div class="form-group text-center">
                    <button type="submit" name="rezervo" id="rezervo" class="form-control center-block col-lg-2 col-md-3 col-sm-8 col-xs-8 btn">Rezervo</button>
                    <?php if(!($_SESSION['rezervimId'] == "")){
                        echo '<button type="button" class="btn" data-toggle="modal" data-target="#modalPrint">Printo biletën</button>';
                    }
                    ?>
            </div>

            <h6 class="text-center col-md-7" style="color:red">
                <?php
                    echo $errs;
                ?>
            </h6>
        </form>
        <h6 class="text-center col-md-5">*Pagesa për biletën bëhet pranë sporteleve të Stacionit Qendror të Autobusëve. Për të konfirmuar rezervimin, ju lutemi të paraqiteni me një kartë identiteti.</h6>
        
        <div class="modal fade" id="modalPrint" tabindex="-1" role="dialog" aria-labelledby="modalPrintTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPrintTitle">Bileta juaj</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Republika e Shqipërisë</h6>
                    <h6>Ndërmarrja e transportit rrugor</h6><br><br>
                    <h5>Emri i udhëtarit: <?php echo $emri." ".$mbiemri ?></h5><br>
                    <h5>Itinerari: <?php echo $nga." - ".$ne ?></h5><br>
                    <h5><?php if($valixhe == 1){echo "me valixhe";}else{echo "pa valixhe";} ?></h5><br>
                    <h5><?php if($vajtjeardhje == 1){echo "vajtje-vardhje";}else{echo "vetëm vajtje";} ?></h5><br>
                    <h5>Data/ora: <?php echo $data." ".$ora ?></h5><br>
                    <h6>Paraqituni me këtë biletë pranë sporteleve të Stacionit Qendror të Autobusëve, Tiranë</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn printo">Printo biletën</button>
                </div>
                </div>
            </div>
        </div>
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