<?php
class GoogleAuthController {

	static function logout() {
		$_SESSION['user'] = null;
		redirect_to('/');
	}

	static function auth() {
		$tokenInfo = getTokenInfo($_GET['code']);

		if (isset($tokenInfo['access_token'])) {
			$params['access_token'] = $tokenInfo['access_token'];

			$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . 
																		urldecode(http_build_query($params))), true);

			if (isset($userInfo['id'])) {
				$userInfo = $userInfo;
				$result = true;
			}

			$_SESSION['user'] = $userInfo;

		redirect_to('/');

		}
	}
}
