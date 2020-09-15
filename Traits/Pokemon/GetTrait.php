<?php
trait GetTrait
{

    /**
    * 詳細を取得する
    * @return integer
    */
    public function getDetails()
    {
        return [
            'Name' => $this->getName(),
            'Nickname' => $this->getNickName(),
            'Type' => $this->getTypes('string'),
            'Level' => $this->getLevel(),
            'Exp' => $this->getExp(),
            'NextLevel' => $this->getReqLevelUpExp(),
        ];
    }

    /**
    * 正式名称を取得する
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * ニックネームを取得する
    * @return string
    */
    public function getNickname()
    {
        if(empty($this->nickname)){
            return $this->name;
        }
        return $this->nickname;
    }

    /**
    * 覚えている技の一覧を取得する
    * @return array
    */
    public function getMove()
    {
        // array_mapで配列内の技クラスをインスタンス化
        return array_map([$this, 'getInstance'], $this->move);
    }

    /**
    * 現在のレベルを取得する
    * @return integer
    */
    public function getLevel()
    {
        return $this->level;
    }

    /**
    * 現在の経験値を取得する
    * @return integer
    */
    public function getExp()
    {
        return $this->exp;
    }

    /**
    * 次のレベルに必要な経験値
    * @return integer
    */
    public function getReqLevelUpExp()
    {
        if($this->level >= 100){
            return 0;
        }
        return ($this->level + 1) ** 3 - $this->exp;
    }

    /**
    * ステータスの取得
    *
    * @var void
    */
    public function getStats()
    {
        foreach($this->base_stats as $key => $val){
            /**
            * ステータスの計算式（小数点以下は切り捨て）
            * HP：(種族値×2+個体値+努力値÷4)×レベル÷100+レベル+10
            * HP以外：(種族値×2+個体値+努力値÷4)×レベル÷100+5
            */
            if($key === 'HP'){
                $correction = $this->level + 10;
            }else{
                $correction = 5;
            }
            $stats[$key] = (int)(($val * 2 + $this->iv[$key] + $this->ev[$key] / 4) * $this->level / 100 + $correction);
        }
        return $stats;
    }

    /**
    * タイプの取得
    *
    * @param string|array|object|null $return
    * @var mixed
    */
    public function getTypes($return=null)
    {
        if(is_null($return)){
            // 引数指定がなければそのまま返却
            return $this->types;
        }
        /**
        * タイプ名の取得用関数
        * @param object
        * @var string
        */
        function getTypesName($obj){
            return $obj->getName();
        }
        // array_mapで配列内のタイプクラスをインスタンス化
        $types = array_map([$this, 'getInstance'], $this->types);
        switch ($return) {
            case 'string':
            // array_mapでタイプ名の配列にしたものを、implodeで文字列に変換
            $types = implode(',', array_map('getTypesName', $types));
            break;
            case 'array':
            // array_mapでタイプ名の配列にして返却
            $types = array_map('getTypesName', $types);
            break;
        }
        return $types;
    }

}
