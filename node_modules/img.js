
export function atualizarMensagens() {
    $.ajax({
        url: "salvar-msg.php",
        method: 'POST',
        dataType: 'json',
        success: function(){
        }
    });
}

export function toggleChat(){

    var tam = $(".live-chat") 
    //abrir ou fechar chat
    $(".chatTitle").click(function(){
      $(".show-chat").toggle()
      $(".input-chat").toggle()
      //$(".live-chat").toggle()          
        if(tam.style.height == ""){
            tam.style.height = "30px"
          console.log("diminuiu")
        }else{
            tam.style.height = ""
            console.log("aumentou")
        }
  })
}

export function sendMessage(){
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
              $("#message-to-send").value = ""
          },
      });
  });
}

export function getHora(){
    var data = new Date();
    var hora    = data.getHours();
    var min     = data.getMinutes();
    var str_hora = hora + ':' + min;
    var horario = '<h6 style="font-size: 10px;">'+ str_hora +'</h6>'
}

export function lerJSON(){
    $.getJSON("json/messages.json", function(){
    })
    .done(function(dados){
        var msgs = '<ul>'
    for(var x of Object.keys(dados)) {
        var id = dados[x].id
        var mensagens = dados[x].message
        var autor = dados[x].name
        var autorAnterior        
        if((x-1)>=0) autorAnterior = dados[x-1].name
        
        if(autor != autorAnterior){
            if(autor == userlogado)
                msgs += '<li class="userMessage"><i class="fas fa-comment-alt"></i> ' + autor + ' ' + mensagens + horario + '</li>'
            else
                msgs += '<li class="visitMessage">' + autor + ' ' + mensagens + ' <i class="fas fa-comment-alt"></i>' +horario+'</li>'
        }else{
            if(autor == userlogado)
                msgs += '<li class="userMessage">   '+ mensagens + horario + '</li>'
            else
                msgs += '<li class="visitMessge">'+ mensagens + horario + '    </li>'
            
        }

    }

    msgs += '</ul>'
    if(document.title == 'Chef em Casa - CHEF')
        $(".show-chat").innerHTML = msgs;
    });
}

