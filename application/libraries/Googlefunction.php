<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Googlefunction
{

    public function __construct()
    {

        include_once APPPATH . "third_party/google-api-php/src/Google/autoload.php";
        $client_id = '939231276908-pvp186orbnqvkr51ug29ur5lh0pm280o.apps.googleusercontent.com';
        $client_secret = 'g3QWT5whblmCv6DbR72rLe3A';
        $redirect_uri = base_url() . 'login/oauth';
        // $simple_api_key = 'AIzaSyDE1Zs_FZmIk2Hu3Wd-cZEOOVN0kkA3cQw';

        $this->client = new Google_Client();
        $this->client->setApplicationName("PHP Google OAuth Login Example");
        $this->client->setClientId($client_id);
        $this->client->setClientSecret($client_secret);
        $this->client->setRedirectUri($redirect_uri);
        // $this->client->setDeveloperKey($simple_api_key);
        $this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $this->client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        $this->client->addScope('profile');
        $this->client->setAccessType('offline');
        // $this->client->setApprovalPrompt ("force");

    }
    public function getUserInfo()
    {
        $google_ouath = new Google_Service_Oauth2($this->client);
        return (object)$google_ouath->userinfo->get();
    }

    public function getLoginUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }

    public function revokeToken()
    {
        $CI = get_instance();
        $CI->session->unset_userdata('google_login_access_token');
        return $this->client->revokeToken();
    }

    public function refreshToken()
    {
        return $this->client->getRefreshToken();
    }

    public function login($code)
    {
        $CI = get_instance();
        $login = $this->client->authenticate($code);
        if ($login) {
            //set token ke session
            $token = $this->client->getAccessToken();
            $CI->session->set_userdata('google_login_access_token', $token);
            return true;
        }
    }

    //Pengecekan apakah user login google ketika pertama kali membuka layananakademik
    public function isLogin()
    {
        $CI = get_instance();
        $token = $CI->session->userdata('google_login_access_token');
        if ($token) {
            $this->client->setAccessToken($token);
        }
        if ($this->client->isAccessTokenExpired()) {

            return false;
        }
        return $token;
    }

    public function isAccessTokenExpired()
    {
        return $this->client->isAccessTokenExpired();
    }
}
