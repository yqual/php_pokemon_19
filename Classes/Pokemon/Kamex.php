<?php
require_once(__DIR__.'/../Pokemon.php');

// カメックス
class Kamex extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'カメックス';

    /**
    * タイプ
    * @var array
    */
    protected $types = ['Water'];

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Kameil';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        36
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'Tackle'],
        [1, 'TailWhip'],
        [1, 'WaterGun'],
        [1, 'Bubble'],
        [8, 'Bubble'],
        [15, 'WaterGun'],
        [24, 'Bite'],
        [31, 'Withdraw'],
        [42, 'SkullBash'],
        [52, 'HydroPump'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 79,
        'Attack' => 83,
        'Defense' => 100,
        'SpAtk' => 85,
        'SpDef' => 105,
        'Speed' => 78,
    ];

}
