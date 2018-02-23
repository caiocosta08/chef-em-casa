function loadChefs(){
  $.getJSON( "/json/dados.json", function() {
  })
  .done(function(dados){ //se pegar o json corretamente essa função done escreve
    //no id contentNews os dados que recebeu do servidor no dados.json
    let feed = ''
    let chefs = ''
    let vetor = []
    for (var x of Object.keys(dados)) {
      let titulo = dados[x].titulo
      let data = dados[x].data
      let link = dados[x].link
      let local = dados[x].local
      let topicos = dados[x].topicos
      let id = dados[x].id
      chefs += '<li class="list-group-item"><a href="'
      chefs += link + '"><h3>'
      chefs += titulo + '</h3></a>'
      chefs += data
      chefs += ' - Chef '
      chefs += id
      chefs += '</h6><br> Local: '
      chefs += local
      chefs += '<br> Especialidades: '
      chefs += topicos
      chefs += '</p></li>'

      vetor.push(dados[x]);
        
      if(x<3){
        feed += '<div class="card" style="width: 100%;"> <div class="card-body">'
        feed += '<h5 class="card-title">'+titulo+'</h5>'
        feed += '<h6 class="card-subtitle mb-2 text-muted">' + data + '</h6>'
        feed += '<p class="card-text"><a class="chefLink" href="'
        feed += link
        feed += '">'
        feed += 'Ver perfil'
        feed += '</a></p></div></div><br>'
      }
        
    }

    $('#contentNews').html(feed);
    if(document.title == 'Chef em Casa - CHEFS'){
    //  $('#chefsRegistrados').html(chefs);
        $("#pag").click(function(){
            loadSearch(vetor)        
        })
    }
  })
}

function loadSearch(arr){
    if(arr[0] != null || arr[0] != ''){    
        $('#chefsRegistrados').append('<li class="list-group-item">' + '<h4><a href="' + arr[0].link + '">Chef - ' + arr[0].titulo + '</a></h4>'+ '<h6> Local: ' + arr[0].local + ' - Especialidade(s): ' + arr[0].topicos +' </h6>' + '</li>');        
        arr.shift();
    }
    if(arr[0] != null || arr[0] != ''){    
        $('#chefsRegistrados').append('<li class="list-group-item">' + '<h4><a href="' + arr[0].link + '">Chef - ' + arr[0].titulo + '</a></h4>'+ '<h6> Local: ' + arr[0].local + ' - Especialidade(s): ' + arr[0].topicos +' </h6>' + '</li>');        
        arr.shift();
    }
    if(arr[0] != null || arr[0] != ''){    
        $('#chefsRegistrados').append('<li class="list-group-item">' + '<h4><a href="' + arr[0].link + '">Chef - ' + arr[0].titulo + '</a></h4>'+ '<h6> Local: ' + arr[0].local + ' - Especialidade(s): ' + arr[0].topicos +' </h6>' + '</li>');        
        arr.shift();
    }
    if(arr[0] != null || arr[0] != ''){    
        $('#chefsRegistrados').append('<li class="list-group-item">' + '<h4><a href="' + arr[0].link + '">Chef - ' + arr[0].titulo + '</a></h4>'+ '<h6> Local: ' + arr[0].local + ' - Especialidade(s): ' + arr[0].topicos +' </h6>' + '</li>');        
        arr.shift();
    }
    if(arr[0] != null || arr[0] != ''){    
        $('#chefsRegistrados').append('<li class="list-group-item">' + '<h4><a href="' + arr[0].link + '">Chef - ' + arr[0].titulo + '</a></h4>'+ '<h6> Local: ' + arr[0].local + ' - Especialidade(s): ' + arr[0].topicos +' </h6>' + '</li>');        
        arr.shift();
    }
}

function loadChef(){
  $(document).ready(function(){
    $.getJSON("/json/dados.json", function(){
    })
    .done(function(current){//ADICIONA OS DADOS DO JSON dados.json PARA A PAGINA DA CHEF
      current.reverse()//inverte o json para ficar na ordem normal
      //pega o ID pela URL
      let id = location.search.split('=')//divide a url pelo '='
      id = id[1] //pega o indice 1 que é o id da pagina(chef)
      let indice = id-1
      let data = current[indice].data
      let titulo = current[indice].titulo
      let local = current[indice].local
      let topicos = current[indice].topicos
      let linksuteis = current[indice].linksuteis
      let referencias = current[indice].referencias
      let download = current[indice].download
      let resumo = current[indice].resumo

      resumo = resumo.split(';').join('<br>') //troca ';' pela tag de quebra de linha

      let texto = ''//variavel para receber todo o texto

      texto += '<div class="jumbotron">' //construindo banner de cada chef
      //+ '<img src="img/crucifixo-1.jpg" alt="">' //imagem do banner
      + ' <h1><span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>'
      +' Chef ' /*+ id + ' - ' */+ titulo + '</h1>'
      + '<h6><span class="glyphicon glyphicon-map-marker"></span> ' + local + ' - ' + data + '</h6>'
      +'</div>'
      topicos = topicos.split(',')
      if(topicos.length>0){
        texto += '<h3><span class="glyphicon glyphicon-th-list"></span> Especialidades: </h3>'
        for(let i=0; i<topicos.length; i++){
          texto += '<h4> - ' + topicos[i] + '</h4>'
        }
        texto += '<hr>'
      }else{
          texto += '<h4> As especialidades desse chef não foram disponibilizados </h4>'
      }
      if(resumo.length>0){
       texto += '<h3><span class="glyphicon glyphicon-list-alt"></span> Resumo da carreira: </h3>'
       texto += '<h4>'+ resumo +'</h4><hr>'
     }else{
       texto += '<h4> O resumo da carreira desse chef não foi disponibilizado </h4><hr>'
     }
       if(linksuteis != ''){
         linksuteis = linksuteis.split(',') //extrai os links que estão separados por vírgula
         texto += '<h3><span class="glyphicon glyphicon-link"></span> Links úteis: </h3>'
         for(let i=0; i<linksuteis.length; i++)
           texto += '<h4> - <a href="' + linksuteis[i] + '">'+ linksuteis[i] + '</a></h4>'
         texto += '<hr>'
       }else{
         texto += '<h4> Não foram disponibilizados links úteis para esse chef </h4><hr>'
       }
      if(download != null && download != ''){
        download = download.split(',') //divide o array dos downloads por arquivo, pois estão separados por virgula
        let downloadName = []
          for(let i=0; i<download.length; i++){
            downloadName[i] = download[i].split('/')//extrai o nome de cada arquivo e coloca num array
          }
         texto += '<h3><span class="glyphicon glyphicon-download"></span> Arquivos para download </h3>'
         for(let i=0; i<download.length; i++){
           texto += '<h4> - <a href="' + download[i]  +'" download>' + downloadName[i][2] + '</a>'  + '</h4>'//o indice é 2 pq é onde fica no caminho site/livros/nomedolivro
           //console.log(downloadName)
         }
         texto += '<hr>'
       }else {
        texto += '<h4> Não foram disponibilizados arquivos para download </h4><hr>'
       }


       if(referencias != '' && referencias != null)
         texto += '<h3><span class="glyphicon glyphicon-tags"></span> Referências: </h3>'
                  + '<h4>' + referencias + '</h4>'
       else {
         texto += '<h4> As referências desse chef não foram disponibilizadas </h4>'
       }

       //document.getElementById('chefAtual').innerHTML = texto;//coloca todo o texto na div com id informado
       $('#chefAtual').html(texto);//coloca todo o texto na div com id informado
    })
    .fail(function(){
      console.log('erro')
    })
  })
}

function editChef(){
  $(document).ready(function(){
    $.getJSON("/json/dados.json", function(){
    })
    .done(function(current){//ADICIONA OS DADOS DO JSON dados.json PARA A PAGINA DO CHEF
      current.reverse()//inverte o json para ficar na ordem normal
      //pega o ID pela URL
      let id = location.search.split('=')//divide a url pelo '='
      id = id[1] //pega o indice 1 que é o id da pagina(chef)
      let indice = id-1
      let data = current[indice].data
      let titulo = current[indice].titulo
      let local = current[indice].local
      let topicos = current[indice].topicos
      let linksuteis = current[indice].linksuteis
      let referencias = current[indice].referencias
      let resumo = current[indice].resumo
      let form = ''
      form += '<div class="post-chef">'
              + '<h3>Editar Chef ' + id + '</h3><hr>'
              + '<form method="post" action="php/editar-chef.php" enctype="multipart/form-data" onsubmit="return validaChef(this);">'
              + '<div class="form-group"> <input class="form-control" id="id" type="text" name="id" value="'+ id +'" readonly/>'
              + '<div class="form-group">'
              + '  <label>Nome do Chef: </label>'
              + '  <input class="form-control" id="titulo" type="text" name="titulo" value="' + titulo + '" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Data de Nascimento: </label>'
              + '  <input class="form-control" id="data" type="date" name="data" value="' + data + '" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Local: </label>'
              + '  <input class="form-control" id="local" type="text" name="local" value="'+ local +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Links úteis: </label>'
              + '  <input class="form-control" id="linksuteis" type="text" name="linksuteis" value="'+ linksuteis +'"/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Especialidades: </label>'
              + '  <input class="form-control" id="topicos" type="text" name="topicos" value="'+ topicos +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Referências: </label>'
              + '  <input class="form-control" id="referencias" type="text" name="referencias" value="'+ referencias +'"/>'
              + '</div>'
              + '<div class="form-group">'
              + '<label>Resumo: </label>'
              +  '<textarea class="form-control" id="resumo" name="resumo" rows="8" cols="80" required>'+ resumo +'</textarea>'
              + '</div>'
              + '<div class="input-group-btn">'
              +  '<button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>'
              +  '<button type="submit" class="btn btn-default">Editar <span class="glyphicon glyphicon-plus"></span></button>'
              + '</div></form></div>'

       $('#edit-chef').html(form);//coloca todo o texto na div com id informado
    })
    .fail(function(){
      console.log('erro')
    })
  })
}


function loadCalendar(){
  $.getJSON("/json/calendario.json", function(){
  })
    .done(function(calendario){
      let texto = ''
      for(var x of Object.keys(calendario)){
        let id = calendario[x].id
        let titulo = calendario[x].titulo
        let data = calendario[x].data
        let local = calendario[x].local
        let hora = calendario[x].hora

        /*texto += '<li class="list-group-item"><h4> ' + id + ' ' + titulo + ' '
        + data + ' ' + local + ' ' + hora + '</h4></li>'*/
        texto += '<li class="list-group-item"><h4> ' + id + ' - ' + titulo
        + '</h4><h6>'
        + data + ' ' + local + ' ' + hora + '</h6></li>'

    }

      //if(document.title == 'Chef em Casa - CALENDÁRIO') document.getElementById('calendar').innerHTML = texto;
      if(document.title == 'Chef em Casa - CALENDÁRIO') $('#calendar').html(texto);
    })
}

function atualizarChefs() {
  $.ajax({
      url: "php/salvar-dados.php",
      method: 'POST',
      dataType: 'json',
      success: function (data) {
          console.log(data);
      }
  });
}

function atualizarEventos() {
  $.ajax({
      url: "php/add-event.php",
      method: 'POST',
      dataType: 'json',
      success: function (data) {
          console.log(data);
      }
  });
}

//Barra de pesquisa para filtrar o evento na pag calendario.php
function searchCalendar(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#calendar li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}

//Barra de pesquisa para filtrar o chef na pag chefs.php
function searchChef(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#chefsRegistrados li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}
