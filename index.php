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
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">
        <img src=".\\assets\\img\\logo.png" width="70" height="30" class="d-inline-block align-top" alt="Logo">
        Referti
    </a>
</nav>
<div id="submitFormAlert"></div>
<div class="container pt-3">
<form action="login.php" method="post">
    <div class="form-group">
        <label for="username">Nome Utente</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" onkeyup="checkIfEmpty()" id="username" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" onkeyup="checkIfEmpty()" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group" id="btn_div" hidden>
        <button type="submit"  id="btnSumbit" class="btn btn-outline-success btn-lg btn-block" style="background-color: #e3f2fd;">Entra!</button>
    </div>
</form>
</div>
</body>
</html>

