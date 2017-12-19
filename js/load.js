function loadAulas(){
  $.getJSON( "/json/dados.json", function() {
  })
  .done(function(dados){ //se pegar o json corretamente essa função done escreve
    //no id contentNews os dados que recebeu do servidor no dados.json
    let feed = ''
    let aulas = ''
    for (var x of Object.keys(dados)) {
      let titulo = dados[x].titulo
      let data = dados[x].data
      let link = dados[x].link
      let local = dados[x].local
      let topicos = dados[x].topicos
      let id = dados[x].id
      aulas += '<li class="list-group-item"><a href="'
      aulas += link + '"><h3>'
      aulas += titulo + '</h3></a>'
      aulas += data
      aulas += ' - Chef '
      aulas += id
      aulas += '</h6><br> Local: '
      aulas += local
      aulas += '<br> Tópicos: '
      aulas += topicos
      aulas += '</p></li>'
      if(x<3){
        feed += '<li class="well"><h6>'
        feed += data
        feed += '</h6><p><a href="'
        feed += link
        feed += '">'
        feed += titulo
        feed += '</a></p></li>'
      }

    }

    document.getElementById('contentNews').innerHTML = feed;
    if(document.title == 'Chef em Casa - CHEFS'){
      document.getElementById('aulasRegistradas').innerHTML = aulas;
    }
  })
}

function loadAula(){
  $(document).ready(function(){
    $.getJSON("/json/dados.json", function(){
    })
    .done(function(current){//ADICIONA OS DADOS DO JSON dados.json PARA A PAGINA DA AULA
      current.reverse()//inverte o json para ficar na ordem normal
      //pega o ID pela URL
      let id = location.search.split('=')//divide a url pelo '='
      id = id[1] //pega o indice 1 que é o id da pagina(aula)
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

      texto += '<div class="jumbotron">' //construindo banner de cada aula
      //+ '<img src="img/crucifixo-1.jpg" alt="">' //imagem do banner
      + ' <h1><span style="font-size: 100px;" class="glyphicon glyphicon-user"></span>'
      +' Chef ' /*+ id + ' - ' */+ titulo + '</h1>'
      + '<h6><span class="glyphicon glyphicon-map-marker"></span> ' + local + ' - ' + data + '</h6>'
      +'</div>'
      topicos = topicos.split(',')
      if(topicos.length>0){
        texto += '<h3><span class="glyphicon glyphicon-th-list"></span> Tópicos principais: </h3>'
        for(let i=0; i<topicos.length; i++){
          texto += '<h4> - ' + topicos[i] + '</h4>'
        }
        texto += '<hr>'
      }else{
          texto += '<h4> Os tópicos dessa aula não foram disponibilizados </h4>'
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
         texto += '<h4> As referências dessa aula não foram disponibilizadas </h4>'
       }

       document.getElementById('aulaAtual').innerHTML = texto;//coloca todo o texto na div com id informado
    })
    .fail(function(){
      console.log('erro')
    })
  })
}

function editAula(){
  $(document).ready(function(){
    $.getJSON("/json/dados.json", function(){
    })
    .done(function(current){//ADICIONA OS DADOS DO JSON dados.json PARA A PAGINA DA AULA
      current.reverse()//inverte o json para ficar na ordem normal
      //pega o ID pela URL
      let id = location.search.split('=')//divide a url pelo '='
      id = id[1] //pega o indice 1 que é o id da pagina(aula)
      let indice = id-1
      let data = current[indice].data
      let titulo = current[indice].titulo
      let local = current[indice].local
      let topicos = current[indice].topicos
      let linksuteis = current[indice].linksuteis
      let referencias = current[indice].referencias
      let resumo = current[indice].resumo
      let form = ''
      form += '<div class="post-aula">'
              + '<h3>Editar Chef ' + id + '</h3><hr>'
              + '<form method="post" action="php/editar-aula.php" enctype="multipart/form-data" onsubmit="return validaAula(this);">'
              + '<div class="form-group"> <input class="form-control" id="id" type="text" name="id" value="'+ id +'" readonly/>'
              + '<div class="form-group">'
              + '  <label>Título do Chef: </label>'
              + '  <input class="form-control" id="titulo" type="text" name="titulo" value="' + titulo + '" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Data: </label>'
              + '  <input class="form-control" id="data" type="text" name="data" value="' + data + '" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Local: </label>'
              + '  <input class="form-control" id="local" type="text" name="local" value="'+ local +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Links úteis: </label>'
              + '  <input class="form-control" id="linksuteis" type="text" name="linksuteis" value="'+ linksuteis +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Tópicos: </label>'
              + '  <input class="form-control" id="topicos" type="text" name="topicos" value="'+ topicos +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '  <label>Referências: </label>'
              + '  <input class="form-control" id="referencias" type="text" name="referencias" value="'+ referencias +'" required/>'
              + '</div>'
              + '<div class="form-group">'
              + '<label>Resumo: </label>'
              +  '<textarea class="form-control" id="resumo" name="resumo" rows="8" cols="80" required>'+ resumo +'</textarea>'
              + '</div>'
              + '<div class="input-group-btn">'
              +  '<button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>'
              +  '<button type="submit" class="btn btn-default">Editar <span class="glyphicon glyphicon-plus"></span></button>'
              + '</div></form></div>'

       document.getElementById('edit-aula').innerHTML = form;//coloca todo o texto na div com id informado
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

      if(document.title == 'Chef em Casa - CALENDÁRIO') document.getElementById('calendar').innerHTML = texto;
    })
}

function atualizarAulas() {
  $.ajax({
      url: "php/salvar-dados.php",
      method: 'POST',
      dataType: 'json',
      success: function (data) {
          console.log(data);
      },
      complete: function(){
          setTimeout(atualizarAulas, 3000);
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
      },
      complete: function(){
          setTimeout(atualizarEventos, 3000);
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

//Barra de pesquisa para filtrar a aula na pag aulas.php
function searchAula(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#aulasRegistradas li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}
