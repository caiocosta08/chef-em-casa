function atualizarMensagens() {
    $.ajax({
        url: "json/messages.json",
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        complete: function(){
            setTimeout(atualizarMensagens, 1000);
        }
    });
  }
  //enviar formulario sem refresh

  $(document).ready(function(){
    $('.send-message').submit(function(){
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
    });
        return false;
});