<?php
	function getLoginUrl() {

		$client_id = '489886553367-3s3bjvj3ahcb7rj838tdpn7bul9onskq.apps.googleusercontent.com';
		$client_secret = 'Xr4Q9Xb5AjYfUFlQCwokHTg8';
		$redirect_uri = 'http://xmp.dev/google-auth'; 

		$url = 'https://accounts.google.com/o/oauth2/auth';

		$params = array(
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code',
			'client_id'     => $client_id,
			'scope'         => 'https://www.googleapis.com/auth/userinfo.profile'
		);

		return $url . '?' . urldecode(http_build_query($params));
	}
?>
