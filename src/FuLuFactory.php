<?php

namespace uutan\Fulu;

use Closure;

class FuLuFactory
{

    protected $config;

    static public function factory($method, array $config)
    {
        // 根据方法获取
        $className = self::formatMethodClassName($method);
        return new $className($config);
    }


    /**
     * 获取接口
     *
     * @param $name
     * @return string
     */
    static protected function formatMethodClassName($name)
    {
        $name = ucwords(str_replace('.', ' ', $name));
        $name = str_replace(' ','',lcfirst($name));
        $name = ucfirst($name);
        return __NAMESPACE__."\\Sdk\\$name";
    }







}