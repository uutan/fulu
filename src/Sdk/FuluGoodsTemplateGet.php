<?php


namespace uutan\Fulu\Sdk;

/**
 * 获取商品模板接口
 *
 * Class FuluGoodsTemplateGet
 * @package uutan\Fulu\Sdk
 */
class FuluGoodsTemplateGet extends BaseSdk
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