<?php
require_once(__DIR__.'/../Move.php');

//
class PoisonPowder extends Move
{

    /**
    * 正式名称
    * @var string
    */
    protected $name = 'どくのこな';

    /**
    * 説明文
    * @var string
    */
    protected $description = '相手をどく状態にする。';

    /**
    * タイプ
    * @var string
    */
    protected $type = 'Poison';

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
    protected $accuracy = 75;

    /**
    * 使用回数
    * @var integer
    */
    protected $pp = 35;

    /**
    * 優先度
    * @var integer
    */
    protected $priority = 0;

}
