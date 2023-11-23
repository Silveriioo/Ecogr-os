import getRoot from "./functions/functions";

$(document).ready(function () {
  $("#Confirm").submit(function (e) {
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
      url: getRoot() + "ecograos/controller/utils/Finalizacao",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = "../../index";
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
