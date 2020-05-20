<?php


namespace uutan\Fulu\Sdk;

/**
 * 微信退款接口
 *
 * Class FuluWechatpayH5Refund
 * @package uutan\Fulu\Sdk
 */
class FuluWechatpayH5Refund extends BaseSdk
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