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

    const ENDPOINT_METHOD = 'fulu.order.mobile.add';


    public function send(array $content)
    {
        $params = [
            'app_key' => $this->config->get('app_key'),
            'method' => $this->config->get('method',self::ENDPOINT_METHOD),
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => $this->config->get('version',self::ENDPOINT_VERSION),
            'format' => $this->config->get('format',self::ENDPOINT_FORMAT),
            'sign_type' => $this->config->get('sign_type',self::ENDPOINT_SIGN_TYPE),
            'charset' => $this->config->get('charset',self::ENDPOINT_CHARSET),
            'app_auth_token' => $this->config->get('app_auth_token',self::ENDPOINT_APP_AUTH_TOKEN),
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