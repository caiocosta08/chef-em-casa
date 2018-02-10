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
      lerJSON();
    setInterval(lerJSON, 2000);

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
                atualizarMensagens();
                lerJSON();
                //addToJSON(data);
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
    document.querySelector(".show-chat").innerHTML = msgs;
    });
}


function addToJSON(info){
  /*  let dados
    dados = document.querySelector("#message-to-send").value
    //    dados += '<li> ID: ' + id + ' '
  //  dados += 'AUTOR: ' + autor + ' '
    //dados += 'MENSAGEM: ' + mensagens + ' '
    //dados += '</li>'
    document.querySelector(".show-chat").insertAdjacentHTML('afterend', dados);
*/}