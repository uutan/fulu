<?php


namespace uutan\Fulu\Sdk;

/**
 * 获取用户信息接口
 *
 * Class FuluUserInfoGet
 * @package uutan\Fulu\Sdk
 */
class FuluUserInfoGet extends BaseSdk
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