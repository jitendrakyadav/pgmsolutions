<?php
/*** Crate this file parallely to PHP-OAuth2/src/OAuth2/Client.php ***/
require('./../../vendor/autoload.php');

const CLIENT_ID         = 'XXXXXXXXXXX';
const CLIENT_SECRET     = 'XXXXXXXXXXXXXXXX';
const TOKEN_ENDPOINT    = 'XXXXXXXXXXX'; //For Ex: 'https://XXX.com/connect/token'
const SCOPE             = 'read write'; 
const GRANT_TYPE        = 'client_credentials'; 
const RBAC_CONTEXT      = '[{"XXX":XXXX,"XX":{"XXX":XX,"XXX":"XXXXXXXXXXXXXXXXX","XXX":X,"XXX":"XXXXX"},"XXX":{"XXX":X,"XXX":"","XXX":X,"XXX":""},"XX":XXXX,"XXX":XX}]';
const APPLICATION_JSON  = 'application/json';

try {
    $client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET);
    $params = array(
        'client_id'         => CLIENT_ID, 
        'client_secret'     => CLIENT_SECRET,
        'scope'             => SCOPE,
        'grant_type'        => GRANT_TYPE
    );
    $responseT = $client->getAccessToken(TOKEN_ENDPOINT, 'client_credentials', $params);
    $client->setAccessToken($responseT['result']['access_token']);
    $http_headers = array(
        'Authorization'     => 'Bearer '.$responseT['result']['access_token'],
        'RBACContext'       => RBAC_CONTEXT,
        'Accept'            => APPLICATION_JSON,
        'Content-Type'      => APPLICATION_JSON,
        'Accept-Language'   => APPLICATION_JSON
    );
    $responseR = $client->fetch(
        'http://XXX.com?{"key":[{"EntityKey":0,"Range":[{"StartDate":"01/01/2011","EndDate":"01/01/2018"}]}]}', 
        array(), 
        'GET', 
        $http_headers
    );
    echo "<pre>";print_r($responseR);
} catch (Exception $e) {
    echo \sprintf('%s: %s', \get_class($e), $e->getMessage());
}