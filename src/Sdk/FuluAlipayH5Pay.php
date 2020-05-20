<?php


namespace uutan\Fulu\Sdk;

/**
 * 支付宝H5支付接口
 *
 * Class FuluAlipayH5Pay
 * @package uutan\Fulu\Sdk
 */
class FuluAlipayH5Pay extends BaseSdk
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