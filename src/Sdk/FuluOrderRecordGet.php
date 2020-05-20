<?php


namespace uutan\Fulu\Sdk;

/**
 * 对账单申请接口
 *
 * Class FuluOrderRecordGet
 * @package uutan\Fulu\Sdk
 */
class FuluOrderRecordGet extends BaseSdk
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