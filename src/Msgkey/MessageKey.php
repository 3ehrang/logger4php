<?php

namespace I3ehrang\Logger4php\Msgkey;

/**
 * This Class create log file using log4php lib
 *
 * @author Behrang
 *
 */
class MessageKey
{
    private static $_msgKey = [
            'USER_LOGIN'            => 'USER_LOGIN',
            'USER_LOGOUT' 	        => 'USER_LOGOUT',
            'USER_SIGNUP' 	        => 'USER_SIGNUP',
            'USER_CHANGE_PASSWORD'  => 'USER_CHANGE_PASSWORD',
            'USER_SEND_MESSAGE'     => 'USER_SEND_MESSAGE',
    ];
    
    /**
     * get message by key
     *
     * @param unknown $key
     */
    public static function get($key)
    {
        if (array_key_exists($key, self::$_msgKey)) {
            return self::$_msgKey[$key];
        }
        return null;
    }
}