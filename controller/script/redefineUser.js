import getRoot from "./functions/functions";

$("#redefinir").on("submit", (e) => {
  e.preventDefault();

  let data = {
    id: $("#id").val(),
    nome: $("#nome").val(),
    date: $("#date").val(),
    cpf: $("#cpf").val(),
    email: $("#email").val(),
    celular: $("#celular").val(),
    rua: $("#rua").val(),
    cidade: $("#cidade").val(),
    regiao: $("#regiao").val(),
    cep: $("#cep").val(),
    adicional: $("#adicional").val(),
  };

  if (
    data.id == "" ||
    data.nome == "" ||
    data.date == "" ||
    data.cpf == "" ||
    data.email == "" ||
    data.celular == "" ||
    data.rua == "" ||
    data.cidade == "" ||
    data.regiao == "" ||
    data.cep == ""
  ) {
    alert("Preencha todos os campos do formulario.");
    return;
  }

  $.ajax({
    type: "POST",
    url: getRoot() + "ecograos/controller/utils/redefineUser",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response.success) {
        location.reload();
      } else {
        alert(response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log("Erro na requisição AJAX: " + error + "||" + status + "||" + xhr);
    },
  });
});
