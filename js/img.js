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
    $('.send-message').submit(function(e){
        e.preventDefault();
        var dados = $( this ).serialize();
        $.ajax({
            type: "POST",
            url: "send.php",
            data: dados,
            cache: false,
            success: function(data)
            {
                alert('ENVIADO COM SUCESSO');
                atualizarMensagens();
                lerJSON();
            },
        });
    });
        return false;
});

function lerJSON(){
    $.getJSON("json/messages.json", function(){
    })
    .done(function(dados){
        let msgs = '<ul>'
    for (var x of Object.keys(dados)) {
        let id = dados[x].id
        let mensagens = dados[x].message
        let autor = dados[x].name
        
        msgs += '<li> ID: ' + id + ' '
        msgs += 'AUTOR: ' + autor + ' '
        msgs += 'MENSAGEM: ' + mensagens + ' '
        msgs += '</li>'
    }

    msgs += '</ul>'
    document.querySelector(".show-chat").insertAdjacentHTML('afterend', msgs);
    });
}