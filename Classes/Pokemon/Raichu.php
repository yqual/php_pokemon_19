<?php
require_once(__DIR__.'/../Pokemon.php');

// ライチュウ
class Raichu extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'ライチュウ';

    /**
    * タイプ
    * @var array
    */
    protected $types = ['Water'];

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Pikachu';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        55, 56, 57,
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'でんきショック'],
        [1, 'なきごえ'],
        [1, 'でんじは'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 60,
        'Attack' => 90,
        'Defense' => 55,
        'SpAtk' => 90,
        'SpDef' => 80,
        'Speed' => 110,
    ];

}
