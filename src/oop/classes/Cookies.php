<?php

class Cookies
{
    private $cookies;

    public function __construct()
    {
        $this->cookies = $_COOKIE;
    }

    public function set($key, $value)
    {
        setcookie($key, $value);
    }

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->cookies) ? $this->cookies[$key] : $default;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->cookies) ? true : false;
    }

    public function all(array $only = [])
    {
        if (empty($only)) {
            return $this->cookies;
        } else {
            return implode(',', array_keys($this->cookies));
        }
    }

    public function remove($key)
    {
        return array_key_exists($key, $this->cookies) ? setcookie($key, "", time() - 3600) : null;
    }
}