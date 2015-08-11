<html>
<head>
<title>xii | Wriite</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
<link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
<script>
	$(function() {
	  $("#editor").wysibb();
	})
</script>
</head>
<body>

<div class="container">

<?php if (isset($_SESSION['user'])): ?>

	<a href="<?=$back_url?>" class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size:26px; color:black;margin-right:10px;"></a>
	<hr>

	<form action="/<?= empty($post) ? 'new' : $post->id?>/save" method="post" >
		<textarea  id="editor" class="form-control" rows="7" style="resize: vertical;"name="text"><?= empty($post) ?  '' : $post->text?></textarea>
		<input type="submit" class="btn btn-info btn-lg btn-block" value="send">
	</form>
<? else: ?>
	<a href="/"><-to main</a>
	<hr>
	No, you can't
	<hr>
	<a href="<?=getLoginUrl() ?>">Аутентификация через Google</a>
<? endif; ?>

</div>
</body>
</html>
