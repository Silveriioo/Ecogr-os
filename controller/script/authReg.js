import getRoot from "./functions/functions";

$("#FormReg").on("submit", (e) => {
  e.preventDefault();

  let data = {
    nome: $("#nomeReg").val(),
    email: $("#emailReg").val(),
    cpf: $("#cpfReg").val(),
    data: $("#dataReg").val(),
    senha: $("#senhaReg").val(),
  };

  if (
    data.nome == "" ||
    data.email == "" ||
    data.cpf == "" ||
    data.data == "" ||
    data.senha == ""
  ) {
    alert("Preencha todos os campos do formulario.");
    return;
  }

  $.ajax({
    type: "POST",
    url: getRoot() + "ecograos/controller/utils/authReg",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $(document).ready(function () {
          $("#modalReg").hide();
          $("#buttonCloseModalLogin").hide();
          $("#modalLogin").show();
        });
      } else {
        alert(response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log("Erro na requisição AJAX: " + error);
    },
  });
});
