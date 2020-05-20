<?php


namespace uutan\Fulu\Sdk;


/**
 * 手机号归属地接口
 *
 * Class FuluMobileInfoGet
 * @package uutan\Fulu\Sdk
 */
class FuluMobileInfoGet extends BaseSdk
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