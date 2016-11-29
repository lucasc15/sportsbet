//composer require firebase/php-jwt:dev-master  -> for JWT logic

$config = Factory::fromFile('config/config.php'); //need to make this file

// Function to authenticate user, returns empty string if failed
authenticateUser = function($username, $password) {
    //get user from database; username, salt&hash, info...
    if (isset($user)){
        if (password_verify($password, $user.password){
	   //return JWT with their info!
	} else {
	    return "";
	}
    }
}

// Function to register user by checking if username is availble
registerUser = function($username, $password) {
    // $user = findUserSomehow
    if (!isset($user)){
        //create new user with password
	$hash = password_hash($password, PASSWORD_BCRYPT)
	$user.username = $username
	$user.password = $password
    }
}