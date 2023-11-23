import getRoot from "./functions/functions";

$(document).ready(function () {
  $("#CarrinhoForm").submit(function (e) {
    e.preventDefault();

    let data = {
      id: $("#idProduto").val(),
      quantidade: $("#produto").val(),
      user: $("#IdUsuario").val(),
    };

    if (data.id === "") {
      $("#ModelProduto").show();
      return;
    }
    if (data.user === "") {
      $("#ModelUser").show();
      return;
    }
    if (data.quantidade === "") {
      $("#Modelquanti").show();
      return;
    }

    $.ajax({
      type: "POST",
      url: getRoot() + "ecograos/controller/utils/Carrinho",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $("#ModelSuccess").show();
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
