<?php

namespace spms;

use pms\bear\CounnectInterface;
use pms\Serialize\SerializeTrait;

/**
 * 数据处理 发送数据
 * Class Data2
 * @package spms
 */
class Data2
{

    use SerializeTrait;
    private $sid = '';
    private $uid = 0;

    public function __construct($sid = '', $uid = 0)
    {
        $this->sid = $sid;
        $this->uid = $uid;
    }

    /**
     * 请求数据
     * @param $server
     * @param $router
     * @param $data
     * @return array
     */
    public function request($server, $router, $data,$p=[])
    {
        return [
            's' => $server,
            'r' => $router,
            'd' => $data,
            'f' => strtolower(SERVICE_NAME),
            'p'=>$p,
            'sid' => $this->sid,
            'uid' => $this->uid
        ];
    }


}