<div class="post-chef">
  <h3>Cadastrar Chef</h3><hr>
  <form method="post" action="php/cadastrar-chef.php" enctype="multipart/form-data" onsubmit="/*return validaAula(this);*/">
    <div class="form-group">
      <label>Nome do Chef: </label>
      <input class="form-control" id="titulo" type="text" name="titulo" placeholder="DIGITE O NOME DO CHEF" required/>
    </div>
    <div class="form-group">
      <label>Data de Nascimento: </label>
      <input class="form-control" id="data" type="text" name="data" placeholder="DIGITE A DATA DE NASCIMENTO" required/>
    </div>
    <div class="form-group">
      <label>Local de Nascimento: </label>
      <input class="form-control" id="local" type="text" name="local" placeholder="DIGITE O LOCAL DE NASCIMENTO" required/>
    </div>
    <div class="form-group">
      <label>Especialidades </label>
      <input class="form-control" id="topicos" type="text" name="topicos" placeholder="DIGITE AS ESPECIALIDADES DO CHEF" required/>
    </div>
    <div class="form-group">
      <label>Links úteis: </label>
      <input class="form-control" id="linksuteis" type="text" name="linksuteis" placeholder="DIGITE OS LINKS ÚTEIS DO CHEF" required/>
    </div>
    <div class="form-group">
      <label>Referências: </label>
      <input class="form-control" id="referencias" type="text" name="referencias" placeholder="DIGITE AS REFERÊNCIAS DO CHEF" required/>
    </div>
    <div class="form-group">
      <label>Arquivos: </label>
      <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="15000000"
      accept=".pdf,.jpeg,.jpg,.png,.doc,.txt,.mp3,.rar,.zip">
      <input class="form-control" name="userfile" type="file" id="userfile">
    </div>
    <div class="form-group">
      <label>Resumo da carreira: </label>
      <textarea class="form-control" id="resumo" name="resumo" rows="8" cols="80" placeholder="DIGITE O RESUMO DA CARREIRA CHEF" required></textarea>
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <div class="input-group-btn">
      <button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>
      <button type="submit" class="btn btn-default">Adicionar <span class="glyphicon glyphicon-plus"></span></button>
    </div>
  </form>
</div>
