<div class="post-aula">
  <h3>Cadastrar Aula</h3><hr>
  <form method="post" action="php/cadastrar-aula.php" enctype="multipart/form-data" onsubmit="return validaAula(this);">
    <div class="form-group">
      <label>Título da Aula: </label>
      <input class="form-control" id="titulo" type="text" name="titulo" placeholder="DIGITE O TÍTULO DA AULA" required/>
    </div>
    <div class="form-group">
      <label>Data: </label>
      <input class="form-control" id="data" type="text" name="data" placeholder="DIGITE A DATA DA AULA" required/>
    </div>
    <div class="form-group">
      <label>Local: </label>
      <input class="form-control" id="local" type="text" name="local" placeholder="DIGITE O LOCAL DA AULA" required/>
    </div>
    <div class="form-group">
      <label>Links úteis: </label>
      <input class="form-control" id="linksuteis" type="text" name="linksuteis" placeholder="DIGITE OS LINKS ÚTEIS DA AULA" required/>
    </div>
    <div class="form-group">
      <label>Tópicos: </label>
      <input class="form-control" id="topicos" type="text" name="topicos" placeholder="DIGITE UM TÓPICO" required/>
    </div>
    <div class="form-group">
      <label>Referências: </label>
      <input class="form-control" id="referencias" type="text" name="referencias" placeholder="DIGITE AS REFERÊNCIAS DA AULA" required/>
    </div>
    <div class="form-group">
      <label>Arquivos: </label>
      <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="15000000"
      accept=".pdf,.jpeg,.jpg,.png,.doc,.txt,.mp3,.rar,.zip">
      <input class="form-control" name="userfile" type="file" id="userfile">
    </div>
    <div class="form-group">
      <label>Resumo: </label>
      <textarea class="form-control" id="resumo" name="resumo" rows="8" cols="80" placeholder="DIGITE O RESUMO DA AULA" required></textarea>
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
