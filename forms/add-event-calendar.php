<div class="post-calendar" style="display:none;">
  <h3>Adicionar evento ao calendário</h3><hr>
  <form method="post" action="php/post-calendar.php" onsubmit="return validaEvento(this);">
    <div class="form-group">
      <label>Título do Evento: </label>
      <input class="form-control" id="titulo" type="text" name="titulo" placeholder="DIGITE O TÍTULO DO EVENTO"/>
    </div>
    <div class="form-group">
      <label>Data: </label>
      <input class="form-control" id="data" type="text" name="data" placeholder="DIGITE A DATA DO EVENTO"/>
    </div>
    <div class="form-group">
      <label>Horário: </label>
      <input class="form-control" id="hora" type="text" name="hora" placeholder="DIGITE O HORÁRIO DO EVENTO"/>
    </div>
    <div class="form-group">
      <label>Local: </label>
      <input class="form-control" id="local" type="text" name="local" placeholder="DIGITE O LOCAL DO EVENTO"/>
    </div>
    <div class="input-group-btn">
      <button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>
      <button type="submit" class="btn btn-default">Adicionar <span class="glyphicon glyphicon-plus"></span></button>
    </div>
  </form>
</div>
