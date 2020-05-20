<?php

namespace uutan\Fulu\Support;

use ArrayAccess;


class Config implements ArrayAccess
{
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }


    public function get($key, $default = null)
    {
        $config = $this->config;

        if( isset($config[$key]) )
        {
            return $config[$key];
        }

        foreach (explode('.', $key) as $val)
        {
            if( !is_array($config) || !array_key_exists($val, $config) )
            {
                return $default;
            }
            $config = $config[$val];
        }
        return $config;
    }


    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->config);
    }


    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
        if( isset($this->config[$offset]) ) {
            $this->config[$offset] = $value;
        }
    }


    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
        if( isset($this->config[$offset]) ) {
            unset($this->config[$offset]);
        }
    }


}
