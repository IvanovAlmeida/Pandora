<?php
namespace App\Resources;
/**
 * Class Session
 * @package App\Resources
 */
final class Session
{
    /**
     * Inicia a sessão
     */
    public static function init(){
        if (!self::isActive()) {
            session_cache_expire(480);
            session_start();
        }
    }

    /**
    * Verifica se a sessão está ativa
    * @return bool
    */
    public static function isActive(){
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     * Seta um elemento na sessão
     * @param string $name
     * @param $values
     */
    public static function set(string $name, $values){
        self::init();
        $_SESSION[$name] = $values;
    }

    /**
     * Remove um item da sessão
     * @param string $key
     */
    public static function unset(string $key){
        if(self::isActive() && isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    /**
     * Retorna um elemento da sessão
     * @param string $key
     * @return null|array|mixed
     */
    public static function get(string $key){
        if(self::isActive() && !is_null($key) && isset($_SESSION[$key]))
            return $_SESSION[$key];
        return null;
    }

    /**
     * @return null|mixed
     */
    public static function getSession(){
        if(self::isActive())
            return $_SESSION;
        return null;
    }

    /**
     * Destroy a sessão
     */
    public static function destroy(){
        if(self::isActive()){
            session_unset();
            session_destroy();
        }
    }
}