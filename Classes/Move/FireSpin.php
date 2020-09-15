<?php
require_once(__DIR__.'/../Move.php');

// ほのおのうず
class FireSpin extends Move
{

    /**
    * 正式名称
    * @var string
    */
    protected $name = 'ほのおのうず';

    /**
    * 説明文
    * @var string
    */
    protected $description = '相手をバインド状態にし、2〜5ターン連続でHPを減らし続ける。相手は逃げたり交換したりすることができなくなる。';

    /**
    * タイプ
    * @var string
    */
    protected $type = 'Fire';

    /**
    * 分類
    * @var string(physical:物理|special:特殊|status:変化)
    */
    protected $species = 'special';

    /**
    * 威力
    * @var integer
    */
    protected $power = 35;

    /**
    * 命中率
    * @var integer
    */
    protected $accuracy = 85;

    /**
    * 使用回数
    * @var integer
    */
    protected $pp = 15;

    /**
    * 優先度
    * @var integer
    */
    protected $priority = 0;

}
