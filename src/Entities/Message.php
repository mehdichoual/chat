<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 31/03/2018
 * Time: 23:27
 */

namespace Chat\Entities;


class Message extends Model
{
    protected $username;
    protected $message;

    /**
     * Message constructor.
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['id']);

        return $attributes;
    }
}