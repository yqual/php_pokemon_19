<?php
require_once(__DIR__.'/../Move.php');

// かみつく
class Bite extends Move
{

    /**
    * 正式名称
    * @var string
    */
    protected $name = 'かみつく';

    /**
    * 説明文
    * @var string
    */
    protected $description = '30％の確率で敵をひるませる。';

    /**
    * タイプ
    * @var string
    */
    protected $type = 'Dark';

    /**
    * 分類
    * @var string(physical:物理|special:特殊|status:変化)
    */
    protected $species = 'physical';

    /**
    * 威力
    * @var integer
    */
    protected $power = 60;

    /**
    * 命中率
    * @var integer
    */
    protected $accuracy = 100;

    /**
    * 使用回数
    * @var integer
    */
    protected $pp = 25;

    /**
    * 優先度
    * @var integer
    */
    protected $priority = 0;

}
