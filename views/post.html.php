<html>
<head>
<title>xii | Riid</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<br><br>
<a href="/" class="glyphicon glyphicon-home" aria-hidden="true" style="font-size:26px; color:black;margin-right:10px;"></a>
There could be your date, but no, there's post's id : <?=$post->id?>
<hr>
<?=getHTMLfromBB($post->text)?> <hr>

<?php if ($allowEdit): ?>
	<a href="/<?=$post->id?>/edit" class="btn btn-primary">Edit</a>
	<a href="/<?=$post->id?>/delete" class="btn btn-danger">Delete</a>
<? else: ?>
	<a href="<?=getLoginUrl() ?>">Зайти через Google</a>

<? endif; ?>

<?
	//dechex ($_SESSION['user']['id'])
?>


</div>
</body>
</html>
