<?php
// require_once(__DIR__.'/../Traits/AutoLoaderTrait.php');
require_once(__DIR__.'/../Traits/ResponseTrait.php');
require_once(__DIR__.'/../Traits/InstanceTrait.php');
require_once(__DIR__.'/../Traits/Pokemon/SetTrait.php');
require_once(__DIR__.'/../Traits/Pokemon/GetTrait.php');

// ポケモン
abstract class Pokemon
{
    // use AutoLoaderTrait;
    use ResponseTrait;
    use InstanceTrait;
    use SetTrait;
    use GetTrait;

    /**
    * ニックネーム
    * @var string(min:1 max:5)
    */
    protected $nickname;

    /**
    * 現在のレベル
    * @var integer(min:2 max:100)
    */
    protected $level;

    /**
    * 覚えている技
    * @var array(min:1 max:4)
    */
    protected $move = [];

    /**
    * 経験値
    * @var integer
    */
    protected $exp;

    /**
    * 個体値
    * @var array(value min:0 max:31)
    */
    protected $iv = [
        'HP' => null,
        'Attack' => null,
        'Defense' => null,
        'SpAtk' => null,
        'SpDef' => null,
        'Speed' => null,
    ];

    /**
    * 努力値
    * @var array
    */
    protected $ev = [
        'HP' => 0,
        'Attack' => 0,
        'Defense' => 0,
        'SpAtk' => 0,
        'SpDef' => 0,
        'Speed' => 0,
    ];

    /**
    * インスタンス作成時に実行される処理
    *
    * @param object|array|null
    * @return void
    */
    public function __construct($before=null)
    {
        switch (gettype($before)) {
            /**
            * 捕まえた際の処理
            * @var null $before
            */
            case 'NULL':
            $this->setLevel();
            $this->setDefaultExp();
            $this->setDefaultMove();
            $this->setIv();
            break;
            /**
            * 前の画面からの引き継ぎ
            * @var array $before
            */
            case 'array':
            $this->takeOverAbility($before);
            break;
            /**
            * 進化した際の処理
            * @var object $before
            */
            case 'object':
            // 進化前のポケモンと一致しているかチェック
            if(is_a($before, $this->before_class ?? null)){
                $this->takeOverAbility($before);
                // メッセージの引き継ぎ
                $this->setMessage($before->getMessages());
                $this->setMessage($this->name.'に進化した', 'success');
                $this->checkMove();
            }
            break;
        }
    }

    /**
    * レベルアップ処理
    *
    * @return void
    */
    protected function actionLevelUp()
    {
        // レベルアップ
        $this->level++;
        $this->setMessage($this->getNickName().'のレベルは'.$this->level.'になった！', 'success');
        // 現在のレベルで習得できる技があるか確認
        $this->checkMove();
    }

    /**
    * 進化
    *
    * @return Classes\Pokemon\$after_class
    */
    protected function evolve()
    {
        if(class_exists($this->after_class ?? null)){
            $pokemon = new $this->after_class($this);
            // 進化後のインスタンスを返却
            return $pokemon;
        }else{
            $this->setMessage('このポケモンは進化できません', 'error');
        }
    }

    /**
    * 現在のレベルで覚えられる技があるか確認する処理
    *
    * @var integer
    */
    protected function checkMove()
    {
        // レベルアップして覚えられる技があれば習得する
        $level_move_keys = array_keys(array_column($this->level_move, 0), $this->level);
        foreach($level_move_keys as $key){
            $move_class = $this->level_move[$key][1];
            // 覚えようとしている技（クラス）が存在かつ重複していないか
            if(class_exists($move_class) && !in_array($move_class, $this->move, true)){
                // 技クラスをセット
                $this->setMove($move_class);
                // インスタンス化
                $move = new $move_class();
                $this->setMessage($move->getName().'を覚えた！', 'success');
            }
        }
    }

    /**
    * 現在インスタンスを出力
    *
    * @return array
    */
    public function export()
    {
        return [
            'class_name' => get_class($this),   # クラス名
            'nickname' => $this->nickname,    # ニックネーム
            'level' => $this->level,          # レベル
            'ev' => $this->ev,                # 努力値
            'iv' => $this->iv,                # 個体値
            'exp' => $this->exp,              # 経験値
            'move' => $this->move,            # 技
        ];
    }

    /**
    * 進化時の能力引き継ぎ処理
    *
    * @param object $before 進化前
    * @return void
    */
    protected function takeOverAbility($before)
    {
        if(is_object($before)){
            $this->nickname = $before->nickname;    # ニックネーム
            $this->level = $before->level;          # レベル
            $this->ev = $before->ev;                # 努力値
            $this->iv = $before->iv;                # 個体値
            $this->exp = $before->exp;              # 経験値
            $this->move = $before->move;            # 技
        }elseif(is_array($before)){
            $this->nickname = $before['nickname'];    # ニックネーム
            $this->level = $before['level'];          # レベル
            $this->ev = $before['ev'];                # 努力値
            $this->iv = $before['iv'];                # 個体値
            $this->exp = $before['exp'];              # 経験値
            $this->move = $before['move'];            # 技
        }
    }
}
