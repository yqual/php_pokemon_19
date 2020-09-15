<?php
require_once(__DIR__.'/../Pokemon.php');

// フシギバナ
class Fushigibana extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'フシギバナ';

    /**
    * タイプ
    * @var array
    */
    protected $types = ['Grass', 'Poison'];

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Fushigisou';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        32
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'Tackle'],
        [1, 'Growl'],
        [1, 'LeechSeed'],
        [1, 'VineWhip'],
        [7, 'PoisonPowder'],
        [13, 'VineWhip'],
        [22, 'PoisonPowder'],
        [30, 'RazorLeaf'],
        [43, 'Growth'],
        [55, 'SleepPowder'],
        [65, 'SolarBeam'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 80,
        'Attack' => 82,
        'Defense' => 83,
        'SpAtk' => 100,
        'SpDef' => 100,
        'Speed' => 80,
    ];

}
