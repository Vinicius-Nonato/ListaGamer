<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = 0;
if(!isset($_SESSION['usuario'])){

}else{
	$user = 1;
}

 ?>
<section class="header">
		<section class="header-top">
			<div class="col-md-3 header-left">
				<a href="index.php">
					<div class="logo">
						<h2>LISTA GAMER</h2>
					</div>
				</a>
			</div>
			<div class="col-md-6 header-center">
				<form method="post" id="formEditar" action="formularios/direciona_pesquisa.php">
					<input class="search-input" type="text" name="search" placeholder="Digite o jogo que procura">
					<button type="submit" class="button">Pesquisar</button>
				</form>
			</div>
			<div class="col-md-3 header-right">
				<?php if($user != 1){ ?>
				<div class="menu-conta">
					<nav>
						<a href="cadastro.php">Criar Conta</a>
						<a href="login.php">Login</a>
					</nav>
				</div>
				<?php }else{ ?>
					<div class="menu-conta menu-logado">
						<nav>
							<a href="my_account.php?usuario=<?php echo $_SESSION['usuario']; ?>"><?php echo $_SESSION['usuario']; ?></a>
							<a href="formularios/desloga_usuario.php">Sair</a>
						</nav>
					</div>
				<?php } ?>
			</div>
		</section>
		<section class="header-bottom">
			<div class="menu-plataformas">
				<ul>
					<a href="category_list.php"><li class="pc">Todos</li></a>
					<a href="category_list.php?categoria=play"><li class="play">Playstation</li></a>
					<a href="category_list.php?categoria=xbox"><li class="xbox">XBOX</li></a>
					<a href="category_list.php?categoria=nintendo"><li class="nintendo">Nintendo</li></a>
					<a href="category_list.php?categoria=pc"><li class="pc">PC</li></a>
					<a href="category_list.php?categoria=retro"><li class="retro">Retro</li></a>
					<a href="category_list.php?categoria=mobile"><li class="mobile">Mobile</li></a>
				</ul>
			</div>
			<div class="menu-geral">
				<ul>
					<a href="ranking_jogos.php"><li class="rk">Mais Bem Avaliados</li></a>
					<li class="rk">Mais Populares</li>
					<li class="comunidade">Mais Completados</li>
					
				</ul>
			</div>
		</section>
	</section>