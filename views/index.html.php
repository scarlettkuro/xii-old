<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<div class="jumbotron">
  <h3><?=$posts[0]->text?></h3>
  <p><a href="/<?=$posts[0]->id?>">There could be your date. Now there's id : <?=$posts[0]->id?></p>

  <?php if (isset($_SESSION['user'])): ?><a href="/logout" >Log out</a><? endif; ?>
</div>

<?php if (isset($_SESSION['user'])): ?>
	<div>
		<a href="/new" class="btn btn-primary btn-lg btn-block">Add</a>
	</div>
	<? else: ?>
		<a href="<?=getLoginUrl() ?>" class="btn btn-primary btn-lg btn-block">Вход через Google</a>

<? endif; ?>
<br><br><br>

<?php foreach(array_slice($posts,1) as $post): ?>
<div class="panel panel-default" >
  <div class="panel-body">
    <?=$post->text?>
  </div>
  <div class="panel-footer">
	<a href="/<?=$post->id?>">There could be your date. Now there's id : <?=$post->id?></a>
  </div>
</div>
       
<?php endforeach; ?>


</div>
</body>
</html>
