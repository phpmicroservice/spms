<?php

namespace spms;

use pms\bear\CounnectInterface;
use pms\Serialize\SerializeTrait;

/**
 * 数据处理 返回数据
 * Class Data
 * @package spms
 */
class Data
{
    private $counnect;
    private $passing;

    use SerializeTrait;

    /**
     *
     * Data constructor.
     * @param CounnectInterface $counnect
     */
    public function __construct(CounnectInterface $counnect)
    {
        $this->counnect = $counnect;
        $this->passing = $this->counnect->getData('p');
    }

    /**
     * 组装数据
     * @param array $d
     * @param $m
     * @param $e
     * @param $t
     * @param $passing
     * @return array
     */
    public static function zhuzhuang($d = [], $m, $e, $t, $passing = '')
    {
        $data = [
            'm' => $m,
            'd' => $d,
            'e' => $e,
            't' => $t,
            'p' => $passing,
            'time'=>time()
        ];
        if ($passing) {
            $data['p'] = $passing;
        }
        $data['f'] = strtolower(SERVICE_NAME);
        return $data;
    }

    /**
     * 发送一个成功
     * @param $m 消息
     * @param array $d 数据
     * @param int $t 类型/控制器
     */
    public function succee($d = [], $m = '成功', $t = '')
    {
        $data =self::zhuzhuang($d,$m,0,
            empty($t) ? $this->counnect->getRouterString() : $t,
            $this->passing
            );
        return $data;
    }

    /**
     * 发送一个错误的消息
     * @param $m 错误消息
     * @param array $d 错误数据
     * @param int $e 错误代码
     * @param int $t 类型,路由
     */
    public function error($m, $d = [], $e = 1, $t = '')
    {
        $data =self::zhuzhuang($d,$m,$e,
            empty($t) ? $this->counnect->getRouterString() : $t,
            $this->passing
        );
        return $data;
        return $data;
    }

}