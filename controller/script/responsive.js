// Button Menu Mobile

$(document).ready(function () {
  $("#buttonOpenMenu").click(function () {
    $("#MenuMobile").show();
  });

  $("#buttonCloseMenuMobile").click(function () {
    $("#MenuMobile").hide();
    $("#MenuMobile1").hide();
    $("#MenuMobile2").hide();
  });

  var MenuMobile1Visible = false;
  var MenuMobile2Visible = false;

  $("#buttonMenuMobile1").click(function (event) {
    if (MenuMobile2Visible) {
      $("#MenuMobile2").hide();
      MenuMobile2Visible = false;
    }

    if (MenuMobile1Visible) {
      $("#MenuMobile1").hide();
    } else {
      $("#MenuMobile1").show();
    }
    MenuMobile1Visible = !MenuMobile1Visible;

    event.stopPropagation();
  });

  $("#buttonMenuMobile2").click(function (event) {
    if (MenuMobile1Visible) {
      $("#MenuMobile1").hide();
      MenuMobile1Visible = false;
    }

    if (MenuMobile2Visible) {
      $("#MenuMobile2").hide();
    } else {
      $("#MenuMobile2").show();
    }
    MenuMobile2Visible = !MenuMobile2Visible;

    event.stopPropagation();
  });
});

// Button Menu

$(document).ready(function () {
  var menu1Visible = false;
  var menu2Visible = false;

  $("#button1").click(function (event) {
    if (menu2Visible) {
      $("#menu2").hide();
      menu2Visible = false;
    }

    if (menu1Visible) {
      $("#menu1").hide();
    } else {
      $("#menu1").show();
    }
    menu1Visible = !menu1Visible;

    event.stopPropagation();
  });

  $("#button2").click(function (event) {
    if (menu1Visible) {
      $("#menu1").hide();
      menu1Visible = false;
    }

    if (menu2Visible) {
      $("#menu2").hide();
    } else {
      $("#menu2").show();
    }
    menu2Visible = !menu2Visible;

    event.stopPropagation();
  });

  $(document).click(function () {
    if (menu1Visible) {
      $("#menu1").hide();
      menu1Visible = false;
    }
    if (menu2Visible) {
      $("#menu2").hide();
      menu2Visible = false;
    }
  });
});

// Button Carrinho

$(document).ready(function () {
  $("#buttonOpenMenuCarrinho").click(function () {
    $("#MenuCarrinho").show();
  });

  $("#buttonCloseMenuCarrinho").click(function () {
    $("#MenuCarrinho").hide();
  });
});

// Button Modal

$(document).ready(function () {
  var modalLoginVisible = false;

  $("#buttonLoginModal1").click(function () {
    $("#MenuMobile").hide();
    $("#modalLogin").show();
    modalLoginVisible = true;
  });

  $("#buttonLoginModal2").click(function () {
    $("#modalLogin").show();
    modalLoginVisible = true;
  });

  $("#buttonCloseModalLogin").click(function () {
    $("#modalLogin").hide();
    modalLoginVisible = false;
  });
});

$(document).ready(function () {
  var modalRegVisible = false;

  $("#buttonRegModal1").click(function () {
    $("#MenuMobile").hide();
    $("#modalReg").show();
    modalRegVisible = true;
  });

  $("#buttonRegModal2").click(function () {
    $("#modalReg").show();
    modalRegVisible = true;
  });

  $("#buttonCloseModalReg").click(function () {
    $("#modalReg").hide();
    modalRegVisible = false;
  });
});

// Button Menu Filtro

$(document).ready(function () {
  var menuFiltroVisible = false;

  $("#buttonMenuFiltro").click(function (event) {
    event.stopPropagation(); 
    if (menuFiltroVisible) {
      $("#menuFiltro").hide();
      $("#setaFechada").show();
      $("#setaAberto").hide();

      menuFiltroVisible = false;
    } else {
      $("#menuFiltro").show();
      menuFiltroVisible = true;
      $("#setaFechada").hide();
      $("#setaAberto").show();
    }
  });

  $(document).click(function (event) {
    if (menuFiltroVisible && !$(event.target).closest("#menuFiltro").length) {
      $("#menuFiltro").hide();
      $("#setaFechada").show();
      $("#setaAberto").hide();

      menuFiltroVisible = false;
    }
  });
});


buttonMenuLateral
closeMenuLateral
menuLateral

// Button Menu Lateral Filtro

$(document).ready(function () {
  $("#buttonMenuLateral").click(function () {
    $("#menuLateral").show();
  });

  $("#closeMenuLateral").click(function () {
    $("#menuLateral").hide();
  });
});
