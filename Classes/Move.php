<?php
require_once(__DIR__.'/../Traits/InstanceTrait.php');

// 技
abstract class Move
{
    use InstanceTrait;

    /**
    * インスタンス作成時に実行される処理
    *
    * @return void
    */
    public function __construct()
    {
        //
    }

    /**
    * 名称の取得
    *
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * 説明文の取得
    *
    * @return string
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * タイプの取得
    *
    * @return object
    */
    public function getType()
    {
        return $this->getInstance($this->type);
    }

    /**
    * 分類の取得
    *
    * @return string
    */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
    * 命中率の取得
    *
    * @return integer
    */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
    * 使用回数の取得
    *
    * @return integer
    */
    public function getPp()
    {
        return $this->pp;
    }

    /**
    * 優先度の取得
    *
    * @return integer
    */
    public function getPriority()
    {
        return $this->priority;
    }

}
