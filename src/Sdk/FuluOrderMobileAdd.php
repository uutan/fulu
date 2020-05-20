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