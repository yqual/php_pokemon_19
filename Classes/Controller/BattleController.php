<?php
require_once(__DIR__.'/../Controller.php');
require_once(__DIR__.'/../../Traits/Battle/AttackTrait.php');

// バトル用コントローラー
class BattleController extends Controller
{
    use AttackTrait;

    /**
    * 敵ポケモン格納用
    * @var object
    */
    protected $enemy;

    /**
    * @return void
    */
    public function __construct()
    {
        // 親コンストラクタの呼び出し
        parent::__construct();
        // 自ポケモンの格納
        $this->myPokemon($_SESSION['pokemon']);
        // 敵ポケモンの格納
        if(isset($_SESSION['enemy'])){
            $this->enemyPokemon($_SESSION['enemy']);
        }else{
            $this->enemyPokemon();
        }
        // アクションが選択された
        if(isset($_POST['action'])){
            // アクションメソッドの実行
            $this->action(htmlspecialchars($_POST['action']), htmlspecialchars($_POST['param'] ?? null));
            return;
        }
    }

    /**
    * 自ポケモンの格納
    *
    * @param array $pokemon
    * @return void
    */
    private function myPokemon($pokemon)
    {
        $this->pokemon = new $pokemon['class_name']($pokemon);
    }

    /**
    * 敵ポケモンの格納
    *
    * @param array|null $pokemon
    * @return void
    */
    private function enemyPokemon($pokemon=null)
    {
        if(is_null($pokemon)){
            $this->enemy = new Fushigidane();
            $this->setMessage('野生の'.$this->enemy->getName().'が現れた！');
        }else{
            $this->enemy = new $pokemon['class_name']($pokemon);
        }
    }

    /**
    * アクション
    *
    * @param string $action
    * @param mixed $param
    * @return void
    */
    private function action($action, $param)
    {

        switch ($action) {
            // にげる
            case 'run':
            unset($_SESSION['enemy']);
            header("Location: ./home.php", true, 307) ;
            exit;
            // たたかう
            case 'fight':
            $message = $this->attack($this->pokemon, $this->enemy, $param);
            $this->setMessage($message);
            break;
        }
    }

    /**
    * 敵ポケモン情報の取得
    *
    * @return object
    */
    public function getEnemy()
    {
        return $this->enemy;
    }

}
