<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 29/03/2018
 * Time: 20:15
 */

namespace Chat\Entities;

class User extends Model
{
    protected $username;
    protected $password;
    protected $connected_at;
    protected $connected;

    /**
     * User constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    /**
     * @return mixed
     */
    public function getConnectedAt()
    {
        return $this->connected_at;
    }

    /**
     * @param mixed $connected_at
     */
    public function setConnectedAt($connected_at)
    {
        $this->connected_at = $connected_at;
    }

    /**
     * @return mixed
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * @param mixed $connected
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;
    }

    public function hashPwd()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        return $this;
    }
    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['id']);

        return $attributes;
    }
}