<?php

	//Constants
	define("CLIENT_ID",     "489886553367-3s3bjvj3ahcb7rj838tdpn7bul9onskq.apps.googleusercontent.com");
	define("CLIENT_SECRET",     "Xr4Q9Xb5AjYfUFlQCwokHTg8");
	define("REDIRECT_URL",     "http://xmp.dev/google-auth");

	define("LOGIN_URL",     "https://accounts.google.com/o/oauth2/auth");
	define("TOKEN_URL",     "https://accounts.google.com/o/oauth2/token");



	//get url for login link
	function getLoginUrl() { 

		$params = array(
			'redirect_uri'  => REDIRECT_URL,
			'response_type' => 'code',
			'client_id'     => CLIENT_ID,
			'scope'         => 'https://www.googleapis.com/auth/userinfo.profile'
		);

		return LOGIN_URL . '?' . urldecode(http_build_query($params));
	}

	//get token with code
	function getTokenInfo($code) {

		$data = array(
					'code' => $code,
					'client_id' => CLIENT_ID,
					'client_secret' => CLIENT_SECRET,
	    			'grant_type'    => 'authorization_code',
					'redirect_uri' => REDIRECT_URL
		);
	
		$options = array(
			'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($data),
			),
		);

		$context  = stream_context_create($options);
		$result = file_get_contents(TOKEN_URL, false, $context);	

		return json_decode($result, true);
	}

	function getHTMLfromBB($bb) {
		$parser = new JBBCode\Parser();
		$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
		return $parser->parse($bb)->getAsHtml();
	}

	function getPlainFromBB($bb) {
		$parser = new JBBCode\Parser();
		$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
		return $parser->parse($bb)->getAsText();
	}
?>
