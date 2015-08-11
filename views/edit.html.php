

<?php if (isset($_SESSION['user'])): ?>

	<a href="/<?=$post->id?>"><-to post</a>
	<hr>

	<form action="/<?= empty($post) ? 'new' : $post->id?>/save" method="post" >
		<textarea  rows="3" name="text"><?= empty($post) ?  '' : $post->text?></textarea>
		<input type="submit" value="send">
	</form>
<? else: ?>
	<a href="/"><-to main</a>
	<hr>
	No, you can't
	<hr>
	<a href="<?=getLoginUrl() ?>">Аутентификация через Google</a>
<? endif; ?>
