<?php 

/**
 * Configuration options for Salesforce Oath settings and REST API defaults.
 */
return array(

	/**
	 * Enter your OAuth creditials:
	 */
	'oauth' => array(

			'clientId' => '',
			'clientSecret' => '',
			'callbackURI' => '',
			'loginURL' => 'https://login.salesforce.com',

	),

	/**
	 * Choose the type of authentication flow:
	 *  -WebServer
	 *  -UserAgent
	 *  -UsernamePassword
	 */
	'authenticationFlow' => 'WebServer',

	/**
	 * Display can be page, popup, touch or mobile
	 * Immediate determines whether the user should be prompted for login and approval. Values are either true or false. Default is false.
	 * State specifies any additional URL-encoded state data to be returned in the callback URL after approval.
	 * Scope specifies what data your application can access. For more details see: https://help.salesforce.com/HTViewHelpDoc?id=remoteaccess_oauth_scopes.htm&language=en_US
	 */
	'optional' => array(

		'display' => 'page',
		'immediate' => 'false',
		'state' => '',
		'scope' => '',

	),

	/**
	 * After authentication token is received, redirect to:
	 */
	'authRedirect' => '/',

	/**
	 * If you'd like to specify an API version manually it can be done here.
	 * Format looks like '30.0'
	 */
	'version' => '',

	/**
	 * Default settings for resource requests.
	 */
	'defaults' => array(

		'method' => 'get',
		'format' => 'json',
		
	),

	'language' => 'en_US'

);