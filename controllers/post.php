<?php
class PostController {
	 static function index() {
		if (!isset($_SESSION['user'])) {
			$ids = Post::find('all', array('select' => 'DISTINCT user_id'));
			set('ids',$ids);
			return html('welcome.html.php');
		}

		redirect_to('/blog/' . $_SESSION['user']['id']);
	}

	static function blog() {
		$posts = array_reverse(Post::find_all_by_user_id(params('user_id')));
		//$posts = Post::find('all', array('order' => 'created desc','conditions' => array('user_id = ?', params('user_id'))));
		set('posts', $posts); 
		return html('index.html.php');
	}

	 static function post() {
		//everybody could see this
		$post = Post::find_by_id(params('id'));
		set('post', $post);
		set('allowEdit', $post->user_id == $_SESSION['user']['id']); //only owner
		return html('post.html.php');
	}

	 static function newpost() {
		//only authorized
		if (!isset($_SESSION['user'])) return html('login.html.php');

		set('back_url', '/');
		return html('edit.html.php');
			
	}

	 static function edit() {
		$post = Post::find_by_id(params('id'));

		if ($post->user_id != $_SESSION['user']['id']) redirect_to('/' . params('id'));
		//only owner
		else {	
			set('back_url', '/' . params('id'));
			set('post', $post);
			return html('edit.html.php'); 
		}
	}

	 static function save() {
		//only authorized
		if (!isset($_SESSION['user'])) return html('login.html.php');
		
		//if new, create
		if (params('id')=='new')
			$post = Post::create(array('text' =>  $_POST['text'], 
										'user_id'=>$_SESSION['user']['id'],
										'created' => date('Y-m-d H:i:s',time())));

		else {	
			$post = Post::find_by_id(params('id'));
			//on edit, check if owner
			if ($_SESSION['user']['id'] == $post->user_id) {
				$post->text = $_POST['text'];
				$post->save();
			}
		}
		redirect_to('/' . $post->id);
	}

	 static function delete() {
		$post = Post::find_by_id(params('id'));

		//only owner
		if ($_SESSION['user']['id'] != $post->user_id) redirect_to('/' . $post->id);
		else {
			$post->delete();
			redirect_to('/');
		}
	}
}

?>
