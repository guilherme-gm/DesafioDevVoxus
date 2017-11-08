<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Google {

    public function __construct() {
        $CI = & get_instance();
        $CI->config->load('google');

        set_include_path(APPPATH . 'third_party/' . PATH_SEPARATOR . get_include_path());
        require APPPATH . 'third_party/google-api-php-client/vendor/autoload.php';

        $this->client = new Google_Client();
        $this->client->setApplicationName($CI->config->item('application_name', 'google'));
        $this->client->setClientId($CI->config->item('client_id', 'google'));
        $this->client->setClientSecret($CI->config->item('client_secret', 'google'));
        $this->client->setRedirectUri($CI->config->item('redirect_uri', 'google'));
        $this->client->setDeveloperKey($CI->config->item('api_key', 'google'));
        $this->client->setScopes($CI->config->item('scopes', 'google'));
        $this->client->setAccessType('online');
        $this->client->setApprovalPrompt('auto');
        $this->oauth2 = $this->client->getOAuth2Service();

        if ($CI->session->has_userdata('google_token')) {
            $this->client->setAccessToken($CI->session->google_token);
        }
    }

    public function authenticate($code) {
        $CI = & get_instance();

        $token = $this->client->fetchAccessTokenWithAuthCode($code);
        $this->client->setAccessToken($token);
        $CI->session->google_token = $token;

        return $token;
    }

    public function getData() {
        if ($this->client->getAccessToken()) {
            return $this->client->verifyIdToken();
        }

        return null;
    }

    public function loginURL() {
        return $this->client->createAuthUrl();
    }

}
