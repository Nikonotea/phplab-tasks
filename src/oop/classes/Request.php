<?php
declare(strict_types=1);

class Request
{
    private $getRequest;
    private $postRequest;
    private $server;

    public function __construct()
    {
        $this->getRequest = $_GET;
        $this->postRequest = $_POST;
        $this->server = $_SERVER;
    }

    public function query(string $key, $default = null)
    {
        if (array_key_exists($key, $this->getRequest)) {
            return $this->getRequest[$key];
        }
        return $default;
    }

    public function post(string $key, $default = null)
    {
        if (array_key_exists($key, $this->postRequest)) {
            return $this->postRequest[$key];
        }
        return $default;
    }

    public function get($key)
    {
        if (isset($key) && $this->server['REQUEST_METHOD'] == 'POST') {
            return $this->post($key);
        } elseif (isset($key) && $this->server['REQUEST_METHOD'] == 'GET') {
            return $this->query($key);
        }
        return $key;
    }

    public function all(array $only = [])
    {
        if (empty($only)) {
            return array_merge($this->getRequest, $this->postRequest);
        } else {
            return implode(',', array_keys(array_merge($only, array_merge($this->getRequest, $this->postRequest))));
        }
    }

    public function has($key)
    {
        return (array_key_exists($key, $this->getRequest)) || (array_key_exists($key, $this->postRequest)) ? true : false;
    }

    public function ip()
    {
        return $this->server['REMOTE_ADDR'];
    }

    public function userAgent()
    {
        return $this->server['HTTP_USER_AGENT'];
    }
}