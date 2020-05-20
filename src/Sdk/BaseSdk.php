<?php


namespace uutan\Fulu\Sdk;


use uutan\Fulu\Contracts\FuLuInterface;
use uutan\Fulu\Support\Config;
use uutan\Fulu\Traits\HasHttpRequest;


abstract class BaseSdk implements FuLuInterface
{

    use HasHttpRequest;

    const ENDPOINT_URL = 'https://openapi.fulu.com/api/getway';

    const ENDPOINT_VERSION = '2.0';

    const ENDPOINT_FORMAT = 'json';

    const ENDPOINT_CHARSET = 'utf-8';

    const ENDPOINT_SIGN_TYPE = 'md5';

    const ENDPOINT_METHOD = 'fulu.order.mobile.add';

    const SUCCESS_CODE = 0;

    const ENDPOINT_APP_AUTH_TOKEN = '';


    protected $config;

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
     * 获取全部请求
     *
     * @param array $content
     * @return array
     */
    public function getPublicParams(array $content)
    {
        $params = [
            'app_key' => $this->config->get('app_key'),
            'method' => $this->config->get('method'),
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => $this->config->get('version',self::ENDPOINT_VERSION),
            'format' => $this->config->get('format',self::ENDPOINT_FORMAT),
            'sign_type' => $this->config->get('sign_type',self::ENDPOINT_SIGN_TYPE),
            'charset' => $this->config->get('charset',self::ENDPOINT_CHARSET),
            'app_auth_token' => $this->config->get('app_auth_token',self::ENDPOINT_APP_AUTH_TOKEN),
            'biz_content' => json_encode($content)
        ];

        $params['sign'] = $this->getSign($params);

        return $params;
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
        $string = $string. $this->config->get('secret');
        return strtolower(md5($string));
    }

}