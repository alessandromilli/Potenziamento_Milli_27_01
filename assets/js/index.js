currently_not_hidden_id = "";

function showJumboEvent(){
    $("#seat_div").attr("hidden",false);
    if(currently_not_hidden_id != ""){
        $("#" + currently_not_hidden_id).attr("hidden",true);
    }
    $("#" + $("#event_select").val()).attr("hidden",false);
    currently_not_hidden_id = $("#event_select").val();
}

function showButton(){
    $("#btn_div").attr("hidden",false);
}

function submit() {
    if(grecaptcha.getResponse() === ""){
        $("#submitFormAlert").html("<div class=\"container alert alert-danger d-flex align-items-center\" role=\"alert\">\n" +
            "    <svg class=\"bi flex-shrink-0 me-2 mr-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>\n" +
            "    <div>\n" +
            "        E' Prima necessario completare il recaptcha\n" +
            "    </div>\n" +
            "</div>")
        throw "";
    }
    formData = {}
    formData["companyName"] = $('#companyName').val();
    formData["telephone"] = $('#telephone').val();
    formData["email"] = $('#emailadd').val();
    formData["other"] = $('#other').val();
    formData["g-recaptcha-response"]= grecaptcha.getResponse();
    $('#submitFormAlert').html("<div class=\"alert alert-secondary d-flex align-items-center\" role=\"alert\">\n" +
        "        <div class=\"spinner-border text-dark mr-2\" role=\"status\">\n" +
        "        </div>\n" +
        "            Invio in corso...\n" +
        "        </div>\n" +
        "    </div>")
    $('#formSubmit').removeClass()
    $("#formSubmit").addClass('btn btn-outline-secondary')
    $('#formSubmit').prop("disabled", true);
    sendData("./sendData.php", JSON.stringify(formData))
}
data={
    "event_select": "",
    "seat_select": 0
}
function book(){
    $('#submitFormAlert').html("<div class=\"alert alert-secondary d-flex align-items-center\" role=\"alert\">\n" +
        "        <div class=\"spinner-border text-dark mr-2\" role=\"status\">\n" +
        "        </div>\n" +
        "            Invio in corso...\n" +
        "        </div>\n" +
        "    </div>")
    $('#formSubmit').removeClass()
    $("#formSubmit").addClass('btn btn-outline-secondary')
    $('#formSubmit').prop("disabled", true);

    //get booking data
    data["event_select"] = $("#event_select").val()
    data["seat_select"] = $("#seat_select").val()

    request = $.ajax({
        type: 'POST',
        url: "./addPrenotation.php",
        crossDomain: true,
        data: data,
        dataType: 'json',
        success: function (response) {
            $('#submitFormAlert').html("<div class=\"container alert alert-success d-flex align-items-center\" role=\"alert\">\n" +
                "    <div>\n" +
                "        Richiesta effettuata con successo\n" +
                "    </div>\n" +
                "</div>")
            $('#btnSumbit').removeClass()
            $("#btnSumbit").addClass('btn btn-success')
            $('#btnSumbit').prop("disabled", true);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $("#submitFormAlert").html("<div class=\"container alert alert-danger d-flex align-items-center\" role=\"alert\">\n" +
                "    <div>\n" +
                "        E' Avvenuto un'errore durante l'invio (" + JSON.parse(xhr.responseText).error + "), Riprovare più tardi\n" +
                "    </div>\n" +
                "</div>")
            $('#btnSumbit').removeClass()
            $("#btnSumbit").addClass('btn btn-danger')
            $('#btnSumbit').prop("disabled", true);
            resettaForm()
        }


    });

}