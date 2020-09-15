<?php
require_once(__DIR__.'/../Move.php');

// せいちょう
class Growth extends Move
{

    /**
    * 正式名称
    * @var string
    */
    protected $name = 'せいちょう';

    /**
    * 説明文
    * @var string
    */
    protected $description = '自分のこうげきととくこうをそれぞれ1段階ずつ上げる。';

    /**
    * タイプ
    * @var string
    */
    protected $type = 'Normal';

    /**
    * 分類
    * @var string(physical:物理|special:特殊|status:変化)
    */
    protected $species = 'status';

    /**
    * 威力
    * @var integer
    */
    protected $power = null;

    /**
    * 命中率
    * @var integer
    */
    protected $accuracy = null;

    /**
    * 使用回数
    * @var integer
    */
    protected $pp = 20;

    /**
    * 優先度
    * @var integer
    */
    protected $priority = 0;

}
