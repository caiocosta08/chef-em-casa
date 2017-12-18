  <h3>Cadastro</h3><hr>
  <form name="form1" method="post" action="php/cadastrar-novo-aluno.php" onsubmit="return validNewUser();">
    <div class="form-group">
      <label>Login: </label>
      <input class="form-control" id="login" type="text" name="login" placeholder="DIGITE O LOGIN"/>
    </div>
    <div class="form-group">
      <label>Senha: </label>
      <input class="form-control" id="senha" type="text" name="senha" placeholder="DIGITE A SENHA"/>
    </div>
    <div class="form-group">
      <label>Confirme a senha: </label>
      <input class="form-control" id="senhaConfirm" type="text" name="senhaConfirm" placeholder="DIGITE A CONFIRMAÇÃO DA SENHA"/>
    </div>
    <div class="input-group-btn">
      <button type="reset" class="btn btn-default">Apagar <span class="glyphicon glyphicon-remove"></span></button>
      <button id="btnADD" type="submit" class="btn btn-default">Adicionar <span class="glyphicon glyphicon-plus"></span></button>
    </div>
  </form>
