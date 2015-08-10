<?php if (isset($_SESSION['user'])): ?>
	<form action="/<?= empty($post) ? 'new' : $post->id?>/save" method="post" >
		<textarea  rows="3" name="text"><?= empty($post) ?  '' : $post->text?></textarea>
		<input type="submit" value="send">
	</form>
<? else: ?>
	No, you can't
	<hr>
	<a href="<?=getLoginUrl() ?>">Аутентификация через Google</a>
<? endif; ?>
