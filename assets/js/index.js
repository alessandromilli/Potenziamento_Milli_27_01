
function showButton(){
    $("#btn_div").attr("hidden",false);
}
function checkIfEmpty(){
    if ($("#username").val()!="" && $("#password").val()!="") {
        showButton()
    }
}

function carica () {
    //Reference the DropDownList.
    var ddlYears = document.getElementById("slctYear");

    //Determine the Current Year.
    var currentYear = (new Date()).getFullYear();

    //Loop and add the Year values to DropDownList.
    for (var i = currentYear; i >= 1950; i--) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        ddlYears.appendChild(option);
    }
};
data = {
    "usrCode": "",
    "slctYear": ""
}
function getReferti(){
//get booking data
    data["usrCode"] = $("#usrCode").val()
    data["slctYear"] = $("#slctYear").val()

    request = $.ajax({
        type: 'POST',
        url: "./getReferti.php",
        crossDomain: true,
        data: data,
        dataType: 'json',
        success: function (response) {
            $('#btnSumbit').removeClass()
            $("#btnSumbit").addClass('btn btn-success btn-lg btn-block')
            //$('#btnSumbit').prop("disabled", true);
            for(i = 0; i<response.length;i++){
                $("#cardContainer").append("<div class=\"card\" style=\"min-width: 15rem;\">\n" +
                    "            <div class=\"card-body\">\n" +
                    "                <h5 class=\"card-title\">" + response[i]["Titolo"] + "</h5>\n" +
                    "                <h6 class=\"card-subtitle mb-2 text-muted\">" + response[i]["date"] + "</h6>\n" +
                    "                <p class=\"card-text\">" + response[i]["testo"] + "</p>\n" +
                    "                <a href=\"./referto.php?filename=" + encodeURIComponent(response[i]["filename"]) + "\" class=\"card-link\">Link Referto</a>\n" +
                    "            </div>\n" +
                    "        </div>")
            }
            console.log(response[0]["date"])
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $('#btnSumbit').removeClass()
            $("#btnSumbit").addClass('btn btn-danger btn-lg btn-block')
            //$('#btnSumbit').prop("disabled", true);
            resettaForm()
        }


    });

}