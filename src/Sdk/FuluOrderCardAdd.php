<?php


namespace uutan\Fulu\Sdk;

/**
 * 卡密下单接口
 *
 * Class FuluOrderCardAdd
 * @package uutan\Fulu\Sdk
 */
class FuluOrderCardAdd extends BaseSdk
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