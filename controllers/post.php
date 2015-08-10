<?php
class PostController {
	 static function index() {
		
		set('posts', Post::all());
		return html('index.html.php');
	}

	 static function post() {
		set('post', Post::find_by_id(params('id')));
		return html('post.html.php');
	}

	 static function newpost() {
		return html('edit.html.php');
	}

	 static function edit() {
		set('post', Post::find_by_id(params('id')));
		return html('edit.html.php');
	}

	 static function save() {
		if (params('id')=='new')
			 $post = Post::create(array('text' =>  $_POST['text']));
		else 
		{	$post = Post::find_by_id(params('id'));
			$post->text = $_POST['text'];
			$post->save();
		}
		redirect_to('/');
	}

	 static function delete() {
		$post = Post::find_by_id(params('id'));
		$id = $post->id;
		$post->delete();
		redirect_to('/');
	}
}

?>
