import getRoot from "./functions/functions";
$(document).ready(function () {
  $(".form-remover").submit(function (e) {
    e.preventDefault();

    let idProduto = $(this).find(".btn-remover").val();
    let data = {
      id: idProduto,
    };

    $.ajax({
      type: "POST",
      url: getRoot() + "ecograos/controller/utils/RemoverCarrinho.php",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $("#ModelRemove").show();
        } else {
          alert(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(
          "Erro na requisição AJAX: " + error + " || " + status + " || " + xhr
        );
      },
    });
  });
});
