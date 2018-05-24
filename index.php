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
    ?>
    <div id="mireseerdhet" class="container col-12">
        <div class="row">
            <div class="majtas col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="lart col-12 text-center"><h6>Mirë se erdhët. Në këtë faqe do të keni mundësinë të shikoni oraret e autobusëve, si dhe të bëni një rezervim për një udhëtim.</h6></div>
                    <div class="poshte col-12">
                        <div class="row">
                            <a href="futu.php" class="m col-6 text-center align-middle"><span>Bëj një rezervim</span></a>
                            <a href="oraret.php" class="d col-6 text-center align-middle"><span>Shih oraret</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="djathtas col-md-6 col-sm-0 col-xs-0 text-center"><h2>Rezervim bilete online</h2></div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
</body>
</html>