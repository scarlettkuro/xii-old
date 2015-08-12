<html>
<head>
<title>xii | Welcome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div style="vertical-align:middle;">
<? foreach($ids as $id) :?>
<a href="/blog/<?=$id->user_id;?>"><?=$id->user_id;?></a>
<?endforeach;?>
<h1 class="text-center"> Start blogging </h1>
<a href="<?=getLoginUrl() ?>" class="btn btn-primary btn-lg btn-block">Зайти через Google</a>
</div>
</div>
</body>
</html>
