<div class="mailing">
	<h2>Exemplo de Mailing com validação HTML5 no client e também no server</h2>
	<p>Placeholder com polyfill</p>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
		<input required title="Preencha um e-mail válido" type="text" name="email" class="email" placeholder="Receba novidades">
		<input class="submit" type="submit" value="OK">
	</form>
</div>