<?php
require_once(__DIR__.'/../Pokemon.php');

// ピカチュウ
class Pikachu extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'ピカチュウ';

    /**
    * タイプ
    * @var array
    */
    protected $types = ['Electric'];

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Raichu';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        5
    ];

    /**
    * レベルアップで覚える技
    * @var array[習得レベル(integer), 技名称(class_name)]
    */
    protected $level_move = [
        [1, 'ThunderShock'],
        [1, 'Growl'],
        [9, 'ThunderWave'],
        [16, 'QuickAttack'],
        [26, 'Swift'],
        [33, 'Agility'],
        [43, 'Thunder'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 35,
        'Attack' => 55,
        'Defense' => 40,
        'SpAtk' => 50,
        'SpDef' => 50,
        'Speed' => 90,
    ];

}
