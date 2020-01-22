<?php

class Session
{
    private static $_sessionStarted = false;
    private static $session_name = 'SHOPAHOLICSID';

    public static function init()
    {
        if (self::$_sessionStarted == false) {
            ini_set("session.use_strict_mode", 1);
            ini_set("session.cookie_httponly", 1);
            ini_set("session.sid_length", 48);
            ini_set("session.sid_bits_per_character", 6);
            ini_set("session.hash_function", "sha256");
            ini_set("session.cache_limiter", 'nocache');
            ini_set("session.use_trans_sid", 0);
            
            // set up the session name
            // session_name(self::$session_name); 	
            
            //sync to the previous/current session (if any)
            // Устанавливаем время жизни равным одному дню.
            
            session_start(
                ['cookie_lifetime' => 86400,]
            );
            self::$_sessionStarted = true;
        }
        return session_id();
    }

    public static function set($key, $value)
    {
        $_SESSION[SESSION_PREFIX.$key] = $value;
    }

    public static function get($key, $secondkey = false)
    {

		if($secondkey == true){

			if(isset($_SESSION[SESSION_PREFIX.$key][$secondkey])){
				return $_SESSION[SESSION_PREFIX.$key][$secondkey];
			}

		} else {

			if(isset($_SESSION[SESSION_PREFIX.$key])){
				return $_SESSION[SESSION_PREFIX.$key];
			}

		}

		return false;

	}

	public static function display(){
		return $_SESSION;
	}

	public static function destroy($key){

		if(self::$_sessionStarted == true){
			session_unset($key);
			session_destroy();
		}

	}

}