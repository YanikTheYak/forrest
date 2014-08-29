<?php namespace Omniphx\Forrest\AuthenticationFlows;

use GuzzleHttp\ClientInterface;
use Omniphx\Forrest\Interfaces\AuthenticationInterface;


class UsernamePassword implements AuthenticationInterface{
	
	/**
     * Interface for HTTP Client
     * @var GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * Array of OAuth settings: client Id, client secret, callback URI, login URL, and redirect URL after authenticaiton.
     * @var array
     */
    protected $settings;

    public function __construct(
        ClientInterface $client,
        $settings)
    {
        $this->client   = $client;
        $this->settings = $settings;
    }

    /**
     * Call this method to get Authentication token from Username Password OAuth Authentication Flow.
     * @return void
     */
    public function authenticate()
    {
        $tokenURL = $this->settings['oauth']['loginURL'] . '/services/oauth2/token';
        $response = $this->client->post($tokenURL, [
            'body' => [
                'grant_type'    => $this->settings['oauth']['grantType'],
                'client_id'     => $this->settings['oauth']['clientId'],
                'client_secret' => $this->settings['oauth']['clientSecret'],
                'username'      => $this->settings['oauth']['username'],
                'password'      => $this->settings['oauth']['password'],
            ]
        ]);
        return $response;
    }

}