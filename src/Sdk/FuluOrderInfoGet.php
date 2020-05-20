<?php


namespace uutan\Fulu\Sdk;

/**
 * 订单查询接口
 *
 * Class FuluOrderInfoGet
 * @package uutan\Fulu\Sdk
 */
class FuluOrderInfoGet extends BaseSdk
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