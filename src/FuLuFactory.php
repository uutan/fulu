<?php

namespace uutan\Fulu;

use Closure;
use uutan\Fulu\Contracts\FuLuInterface;
use uutan\Fulu\Exceptions\InvalidArgumentException;

class FuLuFactory
{

    protected $config;

    static public function factory($method, array $config)
    {
        $config['method'] = $method;

        // 根据方法获取
        $className = self::formatMethodClassName($method);

        if (!\class_exists($className) || !\in_array(FuLuInterface::class, \class_implements($className))) {
            throw new InvalidArgumentException(\sprintf('Class "%s" is a invalid fulu sdk.', $className));
        }

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