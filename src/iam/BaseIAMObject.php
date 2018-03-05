<?php
// Copyright 1999-2018. Plesk International GmbH.

abstract class BaseIAMObject
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return null;

    }
}
