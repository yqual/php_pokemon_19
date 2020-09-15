<?php
trait AttackTrait
{
    /**
    * 攻撃する
    *
    * @param object $atk_pokemon
    * @param object $def_pokemon
    * @param string $move_class
    * @return array
    */
    protected function attack($atk_pokemon, $def_pokemon, $move_class)
    {
        // 技のインスタンスを取得
        $move = $this->getInstance($move_class);
        // タイプ相性チェック
        $type_comp = $this->checkTypeCompatibility($move->getType(), $def_pokemon->getTypes());
        // 技種類での分岐
        switch ($move->getSpecies()) {
            // 物理
            case 'physical':
            // ここに物理技の処理
            break;
            // 特殊
            case 'special':
            // ここに特殊技の処理
            break;
            // 変化
            case 'status':
            // ここに変化技の処理
            break;
        }
        return $type_comp['message'];
    }

    /**
    * タイプ相性チェック
    *
    * @param object $atk_type
    * @param array $def_types
    * @return array
    */
    private function checkTypeCompatibility($atk_type, $def_types)
    {
        // ダメージ補正(初期値は等倍)
        $damage_comp = 1;
        // 補正判定
        foreach($def_types as $def_type){
            // 「こうかがない」かチェック
            if(in_array($def_type, $atk_type->getAtkDoesntAffectTypes(), true)){
                // ダメージ無し
                $damage_comp = 0;
                // ループ終了
                break;
            }
            // 「こうかばつぐん」かチェック
            if(in_array($def_type, $atk_type->getAtkExcellentTypes(), true)){
                // 2倍
                $damage_comp *= 2;
                // 次の処理へスキップ
                continue;
            }
            // 「こうかいまひとつ」かチェック
            if(in_array($def_type, $atk_type->getAtkNotVeryTypes(), true)){
                // 半減
                $damage_comp /= 2;
            }
        }
        // 補正によるメッセージの分岐
        if($damage_comp === 0){
            $message = 'こうかがないみたいみたいだ';
        }elseif($damage_comp > 1){
            $message = 'こうかはばつぐんだ！';
        }elseif($damage_comp < 1){
            $message = 'こうかはいまひとつだ';
        }
        // ダメージ補正とメッセージを配列にして返却
        return [
            'damage_comp' => $damage_comp,
            'message' => $message ?? '',
        ];
    }
}
