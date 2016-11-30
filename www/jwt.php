<?php
use \Firebase\JWT\JWT;
require_once('config.php');

$CONFIG = new Config();

/* Function to authenticate user, returns empty string if failed */
function authenticateUser($username, $password) {
    /*get user from database w/ this username 
    $user = findUSerSomeHow($username);
    */
    if (isset($user)){
        if (password_verify($password, $user.password){
	    return signToken($user);
	} else {
	    return "";
	}
    }
};
    

/* Function to register user by checking if username is availble */
function registerUser($username, $password) {
    /* $user = findUserSomehow */
    if (!isset($user)){
        //create new user with password
	$hash = password_hash($password, PASSWORD_BCRYPT)
	$user->username = $username
	$user->password = $password
    }
};

function signToken($user) {
    global $CONFIG;
    $now = new DateTime();
    $now = $now->getTimestamp();
    $token_data = array(
			'iss' => $CONFIG->JWT_ISSUER,
			'aud' => "GENERAL",
			'nbf' => $now,
			'iat' => $now,
			'exp' => $now + $CONFIG->JWT_EXPIRY_TIME,
			'user_id' => $user->ID
    );
    return JWT->encode($token_data, $CONFIG->JWT_SECRET, $alg=$CONFIG->JWT_HASH);
};

function isValid($token) {
    global $CONFIG;
    try {
        $decoded = JWT->decode($token, $CONFIG->JWT_SECRET, $CONFIG->JWT_HASH);
    } catch (Exception $e) {
        return false;
    }
    return $decoded;
};

function anonymousToken() {
    /* $anonymousUser = findAnonymousUser(); */
    $anaonymousUser = "";
    return signToken($anonymousUser);
};
