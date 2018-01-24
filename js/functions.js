$(document).ready(function(){
    
    /*let loginField = document.querySelector("#login")
    loginField.addEventListener('blur', () => {
   // let loginloginlogin = loginField.value
    })*/
    loadAula();
    loadAulas();
    atualizarAulas();
    atualizarEventos();
    //Faz com que a função loadAulas seja chamada a cada 3s(3000ms)
    setInterval(loadAulas, 3000);
    //carregar eventos regitrados no calendario
    loadCalendar();
    searchCalendar();
    searchAula();
    editAula();
})

$(document).ready(function(){
    $(".btn btn-danger navbar-btn").click(function(){
        $(this).button('toggle');
    });

    $("#linkAula").click(function() {
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
