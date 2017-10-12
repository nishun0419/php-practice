<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
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
		
		<div class="collapse navbar-collapse" id="navbarEexample7">
			<ul class="nav navbar-nav">
				&nbsp;
			</ul>

			<p class="navbar-text navbar-right">
				ようこそ 
				<a href="#" class="navbar-link">
				<?php
					session_start();
					if(isset($_SESSION['userid'])){
						print $_SESSION['userid'];
					}  
					else{
						print "ゲスト";
					}
				?>
				</a> 
				さん。
			</p>
		</div>
	</div>
</nav>