<form id="formLogin" method="post" action="php/access.php" onsubmit="return validLogin();">
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input id="login" type="text" class="form-control" name="login" placeholder="login">
	</div>
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input id="senha" type="password" class="form-control" name="senha" placeholder="senha">
	</div>
	<button id="btnLogin" class="btn btn-default" type="submit">
		<i class="glyphicon glyphicon-log-in">LOGIN</i>
	</button>
	<div class="g-recaptcha" data-sitekey="6LfmhEUUAAAAAJGArrnIR-9FoavD80dm_iUh4AxP"></div>
</form>
