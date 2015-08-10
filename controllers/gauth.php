<?php
class GoogleAuthController {

	static function logout() {
		$_SESSION['user'] = null;
		redirect_to('/');
	}

	static function auth() {
		$url = 'https://accounts.google.com/o/oauth2/token';
		$data = array(
						'code' => $_GET['code'],
						'client_id' => '489886553367-3s3bjvj3ahcb7rj838tdpn7bul9onskq.apps.googleusercontent.com',
						'client_secret' => 'Xr4Q9Xb5AjYfUFlQCwokHTg8',
	        			'grant_type'    => 'authorization_code',
						'redirect_uri' => 'http://xmp.dev/google-auth'
		);

		
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);	
		$tokenInfo = json_decode($result, true);

		if (isset($tokenInfo['access_token'])) {
			$params['access_token'] = $tokenInfo['access_token'];

			$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
			

			if (isset($userInfo['id'])) {
				$userInfo = $userInfo;
				$result = true;
			}

			$_SESSION['user'] = $userInfo;

		redirect_to('/');

		}
	}
}
