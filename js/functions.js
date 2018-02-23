$(document).ready(function(){
    loadChef()
    loadChefs()
    atualizarChefs()
    atualizarEventos()
    loadCalendar()
    searchCalendar()
    searchChef()
    editChef()
    $("#btnLogin").click(sendLoginToAnalythics())
    $("#btnLogout").click(sendLogoutToAnalythics())
    $("input#login.form-control").blur()//tirar foco do input para ir para o topo
    $("input#senha.form-control").blur()
    window.scrollTo(0,0)//ir para o topo
    lerJSON()
    atualizarMensagens()
    toggleChat()
})

$(document).ready(function(){
    $(".btn btn-danger navbar-btn").click(function(){
        $(this).button('toggle');
    });

    $("#linkChef").click(function() {
      $(".post-aula").toggle();
      $(".post-calendar").toggle();
      $("li#id1").addClass('active');
      $("li#id0").removeClass('active');
    });
    $("#linkEvento").click(function() {
      $(".post-calendar").toggle();
      $(".post-aula").toggle();
      $("li#id0").addClass('active');
      $("li#id1").removeClass('active');
    });


});

export function sendContactChef(){
    $('#contact-chef').submit(function(){
        var dados = $( this ).serialize();

        $.ajax({
            type: "POST",
            url: "",
            data: dados,
            success: function()
            {
                alert('CONTRATADO COM SUCESSO');
            }
        });

        return false;
    });
}
