<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample7">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				タイトル
			</a>
		</div>
		
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				&nbsp;
			</ul>

			<ul class="nav navbar-nav navbar-right">
			<?php 
				session_start();
				if(isset($_SESSION["userid"])){ 
			?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION["userid"]."さま"; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="../hack/logout.hh">ログアウト</a></li>
						<li><a href="#">リング</a></li>							
						<li><a href="#">リンク・リストＤ３</a></li>
					</ul>
				</li>
			<?php }else{?>
				<li><a href="login.php" role="button">ログイン</a></li>
				<li><a href="shinki.php" role="button">新規登録</a></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</nav>