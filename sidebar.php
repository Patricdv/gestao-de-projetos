<ul id="nav-mobile" class="side-nav fixed" style="width: 240px;">
	<li class="bold"><a href="/gestao-de-projetos/" class="waves-effect waves-teal">Home</a></li>


	<?php 
		
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { 	
	?>
	<li class="no-padding">
	  <ul class="collapsible collapsible-accordion">
	    <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Cadastrar Rotas</a>
	      <div class="collapsible-body" style="">
	        <ul>
	          <li><a href="rota.php">Cadastro</a></li>
	        </ul>
	      </div>
	    </li>
	  </ul>
	</li>
	<?php } ?>
</ul>