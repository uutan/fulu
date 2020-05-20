<?php


namespace uutan\Fulu\Sdk;

/**
 * 获取商品信息接口
 *
 * Class FuluGoodsInfoGet
 * @package uutan\Fulu\Sdk
 */
class FuluGoodsInfoGet extends BaseSdk
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