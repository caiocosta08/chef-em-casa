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
      atualizarMensagens();
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
                document.querySelector("#message-to-send").value = ""
            },
        });
    });
        return false;
});

// Obtém a data/hora atual
var data = new Date();

// Guarda cada pedaço em uma variável
var hora    = data.getHours();          // 0-23
var min     = data.getMinutes();        // 0-59

var str_hora = hora + ':' + min;
let horario = '<h6>'+ str_hora +'</h6>'

function lerJSON(){
    $.getJSON("json/messages.json", function(){
    })
    .done(function(dados){
        let msgs = '<ul class="well" style="color:#555555; background-color:#ffffff;  list-style:none;">'
    for (var x of Object.keys(dados)) {
        let id = dados[x].id
        let mensagens = dados[x].message
        let autor = dados[x].name
        let autorAnterior        
        if((x-1)>=0) autorAnterior = dados[x-1].name
        
        if(autor != autorAnterior){
            if(autor == userlogado)
                msgs += '<li style="background-color: #dddddd;"> >' + autor + ': ' + mensagens + horario + '</li>'
            else
                msgs += '<li style="background-color: #eeeeee;"> >' + autor + ': ' + mensagens + horario + '</li>'
        }else{
            if(autor == userlogado)
                msgs += '<li style="background-color: #dddddd;">   >'+ mensagens + horario + '</li>'
            else
                msgs += '<li style="background-color: #eeeeee;">   >'+ mensagens + horario + '</li>'
            
        }

    }

    msgs += '</ul>'
    document.querySelector(".show-chat").innerHTML = msgs;
    });
}