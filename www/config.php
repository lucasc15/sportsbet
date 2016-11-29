class Config {
    /* JWT INFO */
    JWT_SECRET = "SomethingVerySecretWeShouldChange";
    JWT_HASH = "HS256";

    /* DB CONNECTION INFO */ 
    DB_HOST = "localhost";
    DB_NAME = "";
    DB_USER = "";
    DB_PASSWORD = "";

    /* Sports Supported */
    SUPPORTED_SPORTS = array("hockey", "basketball", "football");
    function IsSport(sport) {
        return (in_array(sport, SUPPORTED_SPORTS));
    }
}