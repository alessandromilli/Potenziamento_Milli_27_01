<html>
<head>
    <title>ASL 27</title>
    <link rel="icon" type="image/x-icon" href=".\\assets\\img\\favicon.jpg">
    <link rel="stylesheet" href=".\\assets\\css\\style.css">
    <script src="./assets/js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="carica()">
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="/index.php">
        <img src=".\\assets\\img\\logo.png" width="70" height="30" class="d-inline-block align-top" alt="Logo">
        Referti
    </a>
</nav>
<?php
$responseJSON = array("error"=>"");

//Allow only post
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(404);
    $responseJSON["error"] = "Method Not Allowed";
    ?>
    <div class="alert alert-danger" role="alert">
        ERRORE! [ <?php print($responseJSON["error"]);?>]
    </div>
    <?php
    exit();
}

//load users csv
try {
    if(($fp = fopen(".\\assets\\users.csv", "r"))!== FALSE){
        $users = array_map('str_getcsv', file('.\\assets\\users.csv'));
    } else{
        throw new Exception('Cannot get events');
    }
} catch (Exception $e){
    http_response_code(500);
    $responseJSON["error"] = "Failed Loading users";
    ?>
    <div class="alert alert-danger" role="alert">
        ERRORE! [ <?php print($responseJSON["error"]);?>]
    </div>
    <?php
    exit();
}

//check if isset
if (!isset($_POST["username"]) || !isset($_POST["password"])){
    http_response_code(400);
    $responseJSON["error"] = "Bad Request";
    ?>
    <div class="alert alert-danger" role="alert">
        ERRORE! [ <?php print($responseJSON["error"]);?>]
    </div>
    <?php
    exit();
}

//check if given credentials are valid
$found = false;
foreach ($users as $user){
    if ($user[0] == $_POST["username"] && $user[1] == $_POST["password"]){
        $found = true;
        break;
    }
}
if($found == false){
    http_response_code(400);
    $responseJSON["error"] = "Credenziali invalide";
    ?>
    <div class="alert alert-danger" role="alert">
        ERRORE! [ <?php print($responseJSON["error"]);?>]
    </div>
    <?php
    exit();
} else {
    ?>
<div class="alert alert-success" role="alert">
    Login Effettuato con successo!
</div>
<?php
}
?>
<div class="container pt-3">
<form>
    <div class="form-group">
        <label for="usrCode">Codice Utente</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" onkeyup="showButton()" id="usrCode" name="usrCode" placeholder="Codice Utente" aria-label="Codice Utente" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="slctYear">Anno</label>
        <div class="input-group mb-3">
            <select class="form-control form-select form-select-lg mb-3" id="slctYear" name="slctYear">
            </select>
        </div>
    </div>
    <div class="form-group" id="btn_div" hidden>
        <button type="button" onclick="getReferti()" id="btnSumbit" class="btn btn-outline-success btn-lg btn-block" style="background-color: #e3f2fd;">Cerca!</button>
        <!-- delete alert, make ajax request create cards -->
    </div>
    <div id="cardContainer" class="card-deck">
    </div>
</form>
</div>

