<?php
namespace App\Common;

class ArrayWrapper
{
    protected $properties;

    public function __construct($array)
    {
        if ( is_array($array) )
        {
            $this->properties = $array;
        }
        else
        {
            $this->$properties = [];
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->properties))
        {
            return $this->properties[$name];
        }
        throw new \Exception('Key "' . $name . '" Not found.');
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name) 
    {
        return isset($this->properties[$name]);
    }
}
