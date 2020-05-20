<?php


namespace uutan\Fulu\Sdk;


/**
 * 获取商品列表接口
 *
 * Class FuluGoodsListGet
 * @package uutan\Fulu\Sdk
 */
class FuluGoodsListGet extends BaseSdk
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