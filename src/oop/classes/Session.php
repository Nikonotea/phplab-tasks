<?php
declare(strict_types=1);

class Session
{
    private $session;

    public function __construct()
    {

        session_start();
        $this->session = $_SESSION;

    }

    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->session) ? $this->session[$key] : $default;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->session) ? true : false;
    }

    public function all(array $only = [])
    {
        return empty($only) ? $this->session : implode(',', array_keys($this->session));
    }

    public function remove($key)
    {
        if (array_key_exists($this->session, $key)) {
            unset($this->session[$key]);
        }
    }

    public function clear()
    {
        session_unset();
    }

}
