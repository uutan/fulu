<?php


namespace uutan\Fulu\Sdk;


use uutan\Fulu\Contracts\FuLuInterface;
use uutan\Fulu\Support\Config;
use uutan\Fulu\Traits\HasHttpRequest;


abstract class BaseSdk implements FuLuInterface
{

    use HasHttpRequest;

    const DEFAULT_TIMEOUT = 5.0;

    protected $config;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var float
     */
    protected $timeout;

    /**
     * Gateway constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * 将中文拆分成字符数组
     *
     * @param $str
     * @return array|false|string[]
     */
    protected function mbStrSplit($str)
    {
        return preg_split('/(?<!^)(?!$)/u', $str);
    }


    /**
     * 获取当前内容签名
     *
     * @param $paramet
     * @return string
     */
    protected function getSign($paramet)
    {
        $json = json_encode($paramet, 320);
        $jsonArr = $this->mbStrSplit($json);
        sort($jsonArr);
        $string = implode('', $jsonArr);
        $string = $string. $this->config['secret'];
        return strtolower(md5($string));
    }

}