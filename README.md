<h1 align="center">uutan/fulu</h1>

<p align="center">福禄网络产品的SDK接口</p>

<p align="center">
</p>


## 特点

1. 支持武汉本土的网络公司
1. 未来需要对接的公司越来越多
1. 方便升级管理

## 环境需求

- PHP >= 5.6

## 安装

```shell
$ composer require "uutan/fulu"
```

## 使用

```php
use uutan\Fulu\FuLuFactory;

$config = [
    'app_key' => '',
    'serect' => '',
];

// 话费充值接口
$obj = FuLuFactory::factory('fulu.order.mobile.add',$config);

$obj->send([
    'charge_phone' => '186XXX',
    'charge_value' => '50',
    'customer_order_no' => '外部订单号',
]);
```

## License

MIT
