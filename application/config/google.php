<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  |  Google API Configuration
  | -------------------------------------------------------------------
  |  client_id         string   Your Google API Client ID.
  |  client_secret     string   Your Google API Client secret.
  |  redirect_uri      string   URL to redirect back to after login.
  |  application_name  string   Your Google application name.
  |  api_key           string   Developer key.
  |  scopes            string   Specify scopes
 */
$config['google']['client_id'] = '817242338408-lnfus3820vm6oip3jujq4c8cme1m2ru6.apps.googleusercontent.com';
$config['google']['client_secret'] = 'V_PtZTxadLxZDcg-2KwvNk-v';
$config['google']['redirect_uri'] = base_url();
$config['google']['application_name'] = 'Logar na Dashboard';
$config['google']['api_key'] = '';
$config['google']['scopes'] = array('email', 'https://www.googleapis.com/auth/userinfo.profile');


