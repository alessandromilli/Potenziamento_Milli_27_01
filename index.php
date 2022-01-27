<!--in assets/events.json there are all the events to choose from and to book-->
<html>
<head>
    <title>Prenotazioni Umbria Jazz</title>
    <link rel="icon" type="image/x-icon" href=".\\assets\\img\\favicon.jpg">
    <link rel="stylesheet" href=".\\assets\\css\\style.css">
    <script src="./assets/js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
        <img src=".\\assets\\img\\favicon.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        Prenotazioni Umbria Jazz
    </a>
</nav>
<div id="submitFormAlert"></div>
<div class="container pt-3">
<form>
    <div class="form-group">
        <label for="event_select">Eventi Disponibili:</label>
        <select class="form-control" onchange="showJumboEvent()" id="event_select" name="event_select">
            <option selected disabled hidden>--Seleziona un Evento--</option>
            <?php
            /*
            foreach ($events as $event) {
                print("<option value=\"" . str_replace(' ', '', $event["e_name"]) . "\">" . $event["e_name"] . "</option>");
            }
            */
            ?>
        </select>

    </div>
    <div class="form-group" id="seat_div" hidden>
        <label for="seat_select">Posti Prenotabili:</label>
        <select class="form-control" id="seat_select" onchange="showButton()" name="seat_select">
            <option disabled selected hidden>--Seleziona il numero di posti da prenotare--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group" id="btn_div" hidden>
        <button type="button" onclick="" id="btnSumbit" class="btn btn-warning btn-lg btn-block">Prenota!</button>
    </div>
</form>
</div>
</body>
</html>

