<?php

namespace uutan\Fulu\Sdk;


/**
 * 话费下单接口
 *
 * Class FuluOrderMobileAdd
 * @package uutan\Fulu\Sdk
 */
class FuluOrderMobileAdd extends BaseSdk
{

    const ENDPOINT_URL = 'https://openapi.fulu.com/api/getway';

    const ENDPOINT_VERSION = '2.0';

    const ENDPOINT_FORMAT = 'json';

    const ENDPOINT_CHARSET = 'utf-8';

    const ENDPOINT_SIGN_TYPE = 'md5';

    const ENDPOINT_METHOD = 'fulu.order.mobile.add';

    const SUCCESS_CODE = 0;


    public function send(array $content)
    {
        $params = [
            'app_key' => $this->config['app_key'],
            'method' => self::ENDPOINT_METHOD,
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => self::ENDPOINT_VERSION,
            'format' => self::ENDPOINT_FORMAT,
            'sign_type' => self::ENDPOINT_SIGN_TYPE,
            'charset' => self::ENDPOINT_CHARSET,
            'app_auth_token' => '',
            'biz_content' => json_encode($content)
        ];

        $params['sign'] = $this->getSign($params);

        $result = $this->postJson(self::ENDPOINT_URL, $params);

        if( self::SUCCESS_CODE != $result['code'] )
        {
            throw new \ErrorException($result['message'],$result['code']);
        }

        return $result;
    }


}