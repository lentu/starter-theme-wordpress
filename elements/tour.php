<?php 
create_table_mailing();
if (isset($_POST['email']) && !empty($_POST['email'])) {
    global $wpdb;
    if (validEmail($_POST['email'])) {
      $data['email'] = $_POST['email'];
      if (!verify_mail($_POST['email'])) {
        $result = $wpdb->insert('mailing', $wpdb->escape($data));
        $mailingSuccess = "Cadastro efetuado com sucesso!";
      }else{
        $mailingError = 'Email já cadastrado!';
      }
    }else{
       $mailingError = "Email inválido!";
    }
  } 
?>
<!-- exemplos de compass -->
<div id="tour">
	<div class="compass-example">Abra o <strong>_tour.sass</strong> e compare</div>
	<div class="compass-example">...e eu sou uma div com inline-block.</div>
	<div class="compass-example">Eu tenho border-radius</div>
	<div class="compass-example">Eu tenho box-shadow</div>
	<div class="compass-example">Eu tenho opacity .5</div>
	<div class="compass-example">Passe o mouse em mim, tenho transition</div>
	<div class="compass-example"><a class="fancybox fancybox.iframe" href="http://maps.google.com.br/maps?q=Rual+Marechal+Hermes,+37+Boqueir%C3%A3o+-+Santos-SP&amp;hl=pt-BR&amp;ie=UTF8&amp;geocode=+&amp;hnear=R.+Mal.+Hermes,+37+-+Boqueir%C3%A3o,+Santos+-+S%C3%A3o+Paulo,+11025-040&amp;t=m&amp;hq=&amp;ll=-23.960331,-46.32115&amp;spn=0.007138,0.013078&amp;z=14&amp;iwloc=A&amp;output=embed" rel="fancybox">Abrindo mapa em lightbox</a></div>

	<div class="compass-example">
		Abrindo imagem em lightbox
		<a class="fancybox fancybox.iframe" href="<?php bloginfo('template_directory'); ?>/images/teste-lightbox.jpg" rel="fancybox">
			<?php #IMAGEM ESCALONADA SOMENTE PARA FINS DE DEMONSTRACAO ?>
			<img id="thumb" src="<?php bloginfo('template_directory'); ?>/images/teste-lightbox.jpg" alt="" width="150">
		</a>
	</div>
	
	<br>
	<br>
	<br>
	<div class="compass-example compass-sprites">
		Exemplos de sprites
		<span class="icones-search"></span>
		<span class="icones-mkt-virtual"></span>

	</div>
	<br>
	<br>
	<br>
	<ul>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
		<li>Sou uma lista zebrada</li>
	</ul>
	<br>
	<br>
	<br>
	<div>Nth-child (pseudo classes com fórmulas), entenda aqui: <a href="http://css-tricks.com/how-nth-child-works/" target="_blank">http://css-tricks.com/how-nth-child-works/< target="_blank"/a></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>
	<div class="square"></div>


	<div class="mailing">]
		<div class="message">
			<?php if (isset($mailingError)): ?>
				<p class="error" style="color: red;"><strong><?php echo $mailingError; ?></strong></p>
			<?php endif; ?>
			<?php if (isset($mailingSuccess)): ?>
				<p class="success" style="color: green;"><strong><?php echo $mailingSuccess; ?></strong></p>
			<?php endif; ?>
		</div>
		<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" accept-charset="utf-8">
			<input type="text" name="email" class="email" placeholder="Receba novidades">
			<input class="submit" type="submit" value="OK">
		</form>
	</div>
</div>