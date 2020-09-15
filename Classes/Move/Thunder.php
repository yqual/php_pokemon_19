<?php
require_once(__DIR__.'/../Move.php');

// かみなり
class Thunder extends Move
{

    /**
    * 正式名称
    * @var string
    */
    protected $name = 'かみなり';

    /**
    * 説明文
    * @var string
    */
    protected $description = '30％の確立で相手をまひ状態にする。';

    /**
    * タイプ
    * @var string
    */
    protected $type = 'Electric';

    /**
    * 分類
    * @var string(physical:物理|special:特殊|status:変化)
    */
    protected $species = 'special';

    /**
    * 威力
    * @var integer
    */
    protected $power = 110;

    /**
    * 命中率
    * @var integer
    */
    protected $accuracy = 70;

    /**
    * 使用回数
    * @var integer
    */
    protected $pp = 10;

    /**
    * 優先度
    * @var integer
    */
    protected $priority = 0;



}
