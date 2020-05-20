<?php


namespace uutan\Fulu\Sdk;


/**
 * 支付宝查单接口
 *
 * Class FuluAlipayH5Auery
 * @package uutan\Fulu\Sdk
 */
class FuluAlipayH5Auery extends BaseSdk
{


    public function send(array $content)
    {
        $params = $this->getPublicParams($content);
        $result = $this->postJson(self::ENDPOINT_URL, $params);

        if( self::SUCCESS_CODE != $result['code'] )
        {
            throw new \Exception($result['message'],$result['code']);
        }

        return $result;
    }

}