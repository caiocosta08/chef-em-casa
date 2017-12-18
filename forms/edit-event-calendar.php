<div class="post-calendar" style="display:none;">
  <h3>Adicionar evento ao calendário</h3><hr>
  <form method="post" action="php/post-calendar.php" onsubmit="return validaEvento(this);">
    <div class="form-group">
      <label>Título do Evento: </label>
      <input class="form-control" id="titulo" type="text" name="titulo" value=""/>
    </div>
    <div class="form-group">
      <label>Data: </label>
      <input class="form-control" id="data" type="text" name="data" value=""/>
    </div>
    <div class="form-group">
      <label>Horário: </label>
      <input class="form-control" id="hora" type="text" name="hora" value=""/>
    </div>
    <div class="form-group">
      <label>Local: </label>
      <input class="form-control" id="local" type="text" name="local" value=""/>
    </div>
    <div class="input-group-btn">
      <button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>
      <button type="submit" class="btn btn-default">Adicionar <span class="glyphicon glyphicon-plus"></span></button>
    </div>
  </form>
</div>
