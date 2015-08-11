
<a href="/"><-main</a>
<hr>
<?=$post->text?> <hr>

<?php if (isset($_SESSION['user'])): ?>
	<a href="/<?=$post->id?>/edit">Edit <?=$post->id?></a>
	<a href="/<?=$post->id?>/delete">Delete <?=$post->id?></a>
	<br>
	<?=$_SESSION['user']['name']?>
	<?=dechex ($_SESSION['user']['id'])?>
	<a href="/logout">Log out</a>

<? else: ?>
	<a href="<?=getLoginUrl() ?>">Аутентификация через Google</a>

<? endif; ?>
