function atualizarMensagens() {
    $.ajax({
        url: "salvar-msg.php",
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
            url: "send.php",
            data: dados,
            beforeSend: function(data){

            },
            cache: false,
            success: function(data)
            {
                alert('ENVIADO COM SUCESSO');
            },
            complete: function(data){}
        });
    });
        return false;
});