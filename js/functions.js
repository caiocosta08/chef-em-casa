$(document).ready(function(){
    loadChef();
    loadChefs();
    atualizarChefs();
    atualizarEventos();
    //Faz com que a função loadChefs seja chamada a cada 3s(3000ms)
    setInterval(loadChefs, 3000);
    //carregar eventos regitrados no calendario
    loadCalendar();
    searchCalendar();
    searchChefs();
    editChef();
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

$(document).ready(function(){
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
	});
