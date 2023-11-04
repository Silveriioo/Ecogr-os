import getRoot from "./functions/functions";

$("#FormLogin").on("submit", (e) => {
  e.preventDefault();

  let data = {
    email: $("#email").val(), 
    senha: $("#senha").val()
  };

  if (
    data.email == "" ||
    data.senha == ""
  ) {
    alert("Preencha todos os campos do formulario.");
    return;
  }

  $.ajax({
    type: "POST",
    url: getRoot() + "ecograos/controller/utils/authLogin",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response.success) {
        window.location.reload();
      } else {
        alert(response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log("Erro na requisição AJAX: " + error);
    },
  });
});
