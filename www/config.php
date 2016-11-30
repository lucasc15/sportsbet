<?php
namespace Config{
    class Config {
        /* JWT INFO */
        public $JWT_SECRET = "SomethingVerySecretWeShouldChange";
        public $JWT_HASH = "HS256";

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