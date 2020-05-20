<?php


namespace uutan\Fulu\Sdk;

/**
 * 爱奇艺用户身份校验接口
 *
 * Class fuluAiqiyiUserCheck
 * @package uutan\Fulu\Sdk
 */
class FuluAiqiyiUserCheck extends BaseSdk
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