<?php
namespace Config{
    class Config {
        /* JWT INFO */
        public $JWT_SECRET = "SomethingVerySecretWeShouldChange";
        public $JWT_HASH = "HS256";
	public $JWT_ISSUER = "Sportbet";
	/*public $JWT_TOKEN_EXPIRY_TIME = 60*60*24*7; /*1 week token expiry*/

        /* DB CONNECTION INFO */ 
        public $DB_HOST = "localhost";
        public $DB_NAME = "";
        public $DB_USER = "";
        public $DB_PASSWORD = "";

        /* Sports Supported */
        private $SUPPORTED_SPORTS = array("hockey", "basketball", "football");
        public function IsSport($sport) {
            return (in_array($sport, $this->SUPPORTED_SPORTS));
        }
    }
}