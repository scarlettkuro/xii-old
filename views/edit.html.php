<form action="/<?= empty($post) ? 'new' : $post->id?>/save" method="post" >
	<textarea  rows="3" name="text"><?= empty($post) ?  '' : $post->text?></textarea>
	<input type="submit" value="send">
</form>
