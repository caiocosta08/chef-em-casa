function atualizarMensagens() {
    $.ajax({
        url: "salvar-msg.php",
        method: 'POST',
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });
  }

  //enviar formulario sem refresh

  $(document).ready(function(){
      $("input#login.form-control").blur();//tirar foco do input para ir para o topo
      scrollTo(0,0);//ir para o topo
      lerJSON();
      atualizarMensagens();
      $('.carousel').carousel();
      
      
     
      var tam = document.querySelector(".live-chat")
      
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
var horario = '<h6 style="font-size: 10px;">'+ str_hora +'</h6>'

function lerJSON(){
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
                msgs += '<li class="userMessage"><i class="fas fa-comment-alt"></i> ' + /*autor*/'' + ' ' + mensagens + horario + '</li>'
            else
                msgs += '<li class="visitMessage">' + /*autor*/'' + ' ' + mensagens + ' <i class="fas fa-comment-alt"></i>' +horario+'</li>'
        }else{
            if(autor == userlogado)
                msgs += '<li class="userMessage">   '+ mensagens + horario + '</li>'
            else
                msgs += '<li class="visitMessge">'+ mensagens + horario + '    </li>'
            
        }

    }

    msgs += '</ul>'
    if(document.title == 'Chef em Casa - CHEF')
        document.querySelector(".show-chat").innerHTML = msgs;
    });
}

