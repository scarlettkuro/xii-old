 
<?php foreach($posts as $post): ?>
     <a href="/<?=$post->id?>"><?=$post->id?>  <?=$post->text?></a><hr>
<?php endforeach; ?>

<?php if (isset($_SESSION['user'])): ?>
	
	<hr>
	<a href="/new">+ Add</a>
		<a href="/logout">Log out</a>
	<? else: ?>
	Want add something?
		<a href="<?=getLoginUrl() ?>">Аутентификация через Google</a>

<? endif; ?>
