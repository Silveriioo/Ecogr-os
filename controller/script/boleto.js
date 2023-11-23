import getRoot from "./functions/functions";

$(document).ready(function () {
  $("#carrinhoBoleto").submit(function (e) {
    e.preventDefault();

    let data = {
      id: $("#id").val(),
    };

    if (data.id === "") {
      $("#ModelUser").show();
      return;
    }

    $.ajax({
      type: "POST",
      url: getRoot() + "ecograos/controller/utils/boleto",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $("#ModelBoleto").show();
        } else {
          alert(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(
          "Erro na requisição AJAX: " + error + "||" + status + "||" + xhr
        );
      },
    });
  });
});
