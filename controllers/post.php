<?php
class PostController {
	 static function index() {
		//everybody could see this
		set('posts', Post::all());
		return html('index.html.php');
	}

	 static function post() {
		//everybody could see this
		set('post', Post::find_by_id(params('id')));
		return html('post.html.php');
	}

	 static function newpost() {
		//only authorized (any)
		if (isset($_SESSION['user'])) {
			set('back_url', '/');
			return html('edit.html.php');
		} else 
			return html('login.html.php');
	}

	 static function edit() {
		//only authorized
		if (isset($_SESSION['user'])) {
			set('back_url', '/' . params('id'));
			set('post', Post::find_by_id(params('id')));
			return html('edit.html.php'); 
		} else 
			return html('login.html.php');
	}

	 static function save() {
		//only authorized
		if (isset($_SESSION['user'])) {
			if (params('id')=='new')
				 $post = Post::create(array('text' =>  $_POST['text']));
			else {	
				$post = Post::find_by_id(params('id'));
				$post->text = $_POST['text'];
				$post->save();
			}
			redirect_to('/');
		} else 
			return html('login.html.php');
	}

	 static function delete() {
		//only authorized
		if (isset($_SESSION['user'])) {
			$post = Post::find_by_id(params('id'));
			$id = $post->id;
			$post->delete();
			redirect_to('/');
		} else 
			return html('login.html.php');
	}
}

?>
