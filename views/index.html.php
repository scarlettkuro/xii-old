<html>
<head>
<title>xii | <?=$_SESSION['user']['name'] ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<div class="jumbotron">
  <h3><?= count($posts)>0 ? $posts[0]->text : "There are no such blog for now. Want start blogging? Sign in"?></h3>
  <p><a href="/<?=count($posts)>0 ? $posts[0]->id : ''?>"><?=count($posts)>0 ? $posts[0]->created->format('d M Y H:i:s'): ""?></a></p>

  <?php if (isset($_SESSION['user'])): ?><?=$_SESSION['user']['name'] ?> <a href="/logout" >Log out</a><? endif; ?>
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
    <?=getPlainFromBB($post->text)?>
  </div>
  <div class="panel-footer">
	<a href="/<?=$post->id?>"><?=$post->created->format('d M Y H:i:s')?></a>
  </div>
</div>
       
<?php endforeach; ?>


</div>
</body>
</html>
