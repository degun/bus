<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Regjistrim</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION['orarID'] = "";
        $_SESSION['perdoruesId'] = "";
        $_SESSION['rezervimId'] = "";
        $emri = $mbiemri = $email = $mosha = $fjalekalimi = "";
        $errs = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            require_once("validation.php");

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

            if (validateNotEmpty($_POST["fjalekalimi"], "fjalëkalimi") == "") {
                $fjalekalimi = $_POST["fjalekalimi"];
            }
            else {
                $errs .= validateNotEmpty($_POST["fjalekalimi"], "fjalëkalimi")."<br>";
            }
        }  

        if($errs == ""){
            require_once("connection.php");
            $sql = "INSERT INTO perdorues (emri, mbiemri, email, mosha, fjalekalimi) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssis", $emri, $mbiemri, $email, $mosha, $fjalekalimi);
            if(isset($_POST['regjistrohu'])) {
                $stmt->execute();
                $_SESSION['perdoruesId'] = $conn->insert_id;
                header('Location: rezervo.php');
            }
        }
    ?>

    <div class="futuQender qendrore" class="container col-12 justify-content-md-center">
        <div class="col-12">
            <h3 class="text-center">Regjistrohu</h3>
        </div>
        <form id="regjistrim" class="col-lg-7 col-md-8 col-sm-9" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group form-inline">
                <input type="text" name="emri" id="emri" class="form-control col-md-5 col-sm-5 m-2" placeholder="Emri">
                <input type="text" name="mbiemri" id="mbiemri" class="form-control col-md-5 col-sm-5 m-2" placeholder="Mbiemri">
            </div>
            <div class="form-group form-inline">
                <input type="text" name="email" id="email" class="form-control col-md-5 col-sm-10 m-2" placeholder="Adresa e e-mail-it">
                <input type="number" name="mosha" id="mosha" class="form-control col-md-2 col-sm-10 m-2" placeholder="Mosha" size="3" min="12" max="120">
            </div>
            <div class="form-group form-inline">
                <input type="password" name="fjalekalimi" id="fjalekalimi" class="form-control col-md-5 col-sm-10 m-2" placeholder="Fjalëkalimi">
                <input type="password" name="fjalekalimi2" id="fjalekalimi2" class="form-control col-md-5 col-sm-10 m-2" placeholder="Konfirmim fjalëkalimi">
            </div>
            <div class="form-group text-center">
                    <button type="submit" name="regjistrohu" id="regjistrohu" class="form-control center-block col-lg-2 col-md-3 col-sm-12 btn">Regjistrohu</button>
            </div>
            <h6 class="text-center col-md-7">Je regjistruar një herë? Futu drejtpërdrejt <a href="futu.php">këtu.</a></h6>
            <h6 class="text-center col-md-7" style="color:red">
                <?php
                    echo $errs;
                ?>
            </h6>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>