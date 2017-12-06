<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="css/index.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <!-- <link rel="stylesheet" type="text/css" href="css/navbar.css"> -->
	 <link href="css/animate.css" rel="stylesheet">
	 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	 <script src="js/jquery.lettering.js"></script>
	 <script src="js/jquery.textillate.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/lib/greensock/TweenMax.min.js"></script>
　　　<script type="text/javascript" src="js/lib/velocity.min.js"></script>
　　　<script type="text/javascript" src="js/scrollmagic/uncompressed/ScrollMagic.js"></script>
　　　<script type="text/javascript" src="js/scrollmagic/uncompressed/plugins/animation.gsap.js"></script>
	 <script type="text/javascript" src="js/scrollmagic/uncompressed/plugins/animation.velocity.js"></script>
	 <script type="text/javascript" src="js/scrollmagic/uncompressed/plugins/debug.addIndicators.js"></script>
	<title>Titlee</title>
<script type="text/javascript">
	var controller = new ScrollMagic.Controller({
			globalSceneOptions: {
				triggerHook: 'onLeave'
			}
		});
</script>
</head>
<body>
	<div id="animation_back">
		<div class="text-center animationtext1">施設を利用したい</div>
		<div class="text-center animationtext2">施設を利用してもらいたい</div>
		<img src="image/x.jpg" alt="" class="xImage">
		<div class="text-center animationtext3">二つの気持ちをマッチング</div>
	</div>
	<?php
		require('php/navbar.php');
	?>
	<div id="titletop">
		<div class="container">
			<div class="row titleName">
				<div class="text-center">
					<h1>新しい施設マッチングサイト誕生</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 serchbox vertical-center">
					<form class="form-horizontal" role="form" method="get" action="#">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="text-center">
									<h3>施設検索</h3>
								</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="keyword" class="col-md-4 control-label">キーワード</label>
									<div class="col-md-6">
										<input type="text" class="formtext" name="keyword" id="keyword">
									</div>
								</div>
								<div class="form-group">
									<label for="area" class="col-md-4 control-label">エリア</label>
									<div class="col-md-6">
										<select name="area" id="area" class="formtext">
											<option value="#">選択肢1</option>
											<option value="#">選択肢2</option>
											<option value="#">選択肢3</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<button type="submit" class="btn btn-primary">検索</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6 serchbox">
					<form class="form-horizontal" role="form" method="get" action="#">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="text-center">
									<h3>利用者ログイン</h3>
								</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="id" class="col-md-4 control-label">ユーザーID</label>
									<div class="col-md-6">
										<input type="text" name="id" id="id">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-md-4 control-label">パスワード</label>
									<div class="col-md-6">
										<input type="password" name="password" id="password">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<button type="submit" class="btn btn-primary">ログイン</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
<!-- 		<form method="post" action="hack/login.hh">
			<div id="account">
				<h3>利用者ログイン</h3>
				<div id="id">
					<label>ID</label><br>
					<input type="text" class="formtext" name="id" id="idin">
				</div>
				<div id="pass">
					<label>Password</label><br>
					<input type="password" class="formtext" name="pass" id="password">
				</div>
				<div id="logbutton">
					<input type="button" id="login" value="ログイン" class="submit"><br>
				</div>
				<a href="Shinki.html" id="sinki">新規登録はここから</a>
			</div>
		</form>
	</div> -->
			</div>
		</div>
	</div>
<div id="trigger1"></div>
<div class="titlesecond">
<h2>人々との繋がりを大事に</h2>
</div>
<script>

 var secne = new ScrollMagic.Scene({triggerElement:"#trigger1"})
 					.setTween(TweenMax.to(".titlesecond" , 1 ,{opacity: 1}))
 					.addIndicators()
 					.addTo(controller);
</script>
<script type="text/javascript" src="js/texteffect.js"></script>
</body>
</html>