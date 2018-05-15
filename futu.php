<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Hyrje</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION['orarID'] = "";
        $_SESSION['perdoruesId'] = "";
        $_SESSION['rezervimId'] = "";
        $email = $fjalekalimi = $errs = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            require_once("validation.php");

            if (validateEmail($_POST["email"], "Adresa e e-mail-it") == "") {
                $email = $_POST["email"];
            }
            else {
                $errs .= validateEmail($_POST["email"], "Adresa e e-mail-it")."<br>";
            }

            if (validateNotEmpty($_POST["fjalekalimi"], "fjalëkalimi") == "") {
                $fjalekalimi = $_POST["fjalekalimi"];
            }
            else {
                $errs .= validateNotEmpty($_POST["fjalekalimi"], "fjalëkalimi")."<br>";
            }

            require_once("connection.php");
            // username and password sent from form 
        
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $fjalekalimi = mysqli_real_escape_string($conn,$_POST['fjalekalimi']); 
            
            $sql = "SELECT id FROM perdorues WHERE email = '$email' and fjalekalimi = '$fjalekalimi'";
            $result = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $_SESSION["perdoruesId"] = $row['id'];
            }
            
            $count = mysqli_num_rows($result);
            
            // If result matched $myusername and $fjalekalimi, table row must be 1 row
                
            if($count == 1) {               
                header("location: rezervo.php");
            }else {
                $loginErr = "Email-i ose fjalëkalimi nuk janë të saktë";
            }
        }  
    ?>

    <div class="futuQender qendrore" class="container col-12 justify-content-md-center">
        <div class="col-12">
            <h3 class="text-center">Vendos të dhënat personale për të nisur rezervimin</h3>
        </div>
        <form id="hyrje" class="col-lg-5 col-md-6 col-sm-7" method="POST">
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control col-md-12 col-sm-12" placeholder="Adresa e e-mail-it"><br>
                <input type="password" name="fjalekalimi" id="fjalekalimi" class="form-control col-md-12 col-sm-12" placeholder="Fjalëkalimi">
            </div>
            <div class="form-group text-center">
                    <button type="submit" name="futu" id="futu" class="form-control center-block col-lg-2 col-md-3 col-sm-12 btn">Futu</button>
            </div>

            <h6 class="text-center col-md-8">Nuk je regjistruar akoma? Regjistrohu <a href="regjistrohu.php">këtu.</a></h6>
            <h6 class="text-center col-md-8" style="color:red">
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