<?php
require_once(__DIR__.'/Classes/Controller/HomeController.php');
require_once(__DIR__.'/Resources/Lang/Translation.php');
session_start();
$controller = new HomeController();
$pokemon = $controller->getPokemon();
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHPポケモン</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/Assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12">
                        <h1>PHPポケモン -ホーム-</h1>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <main>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="Resources/Assets/img/pokemon/dots/<?=get_class($pokemon)?>.gif" alt="<?=$pokemon->getName()?>">
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <?php # 詳細 ?>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" colspan="2">詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pokemon->getDetails() as $key => $val): ?>
                                    <tr>
                                        <th scope="row" class="w-50"><?=transJp($key)?></th>
                                        <td><?=$val?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <?php # ステータス ?>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" colspan="2">ステータス</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pokemon->getStats() as $key => $val): ?>
                                    <tr>
                                        <th scope="row" class="w-50"><?=transJp($key)?></th>
                                        <td><?=$val?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <?php # 覚えている技 ?>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">覚えている技</th>
                                    <th scope="col">タイプ</th>
                                    <th scope="col">PP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pokemon->getMove() as $move): ?>
                                    <tr>
                                        <th scope="row" class="w-50"><?=$move->getName()?></th>
                                        <td><?=$move->getType()->getName()?></td>
                                        <td><?=$move->getPp()?>/<?=$move->getPp()?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-5">
                        <?php $_SESSION['pokemon'] = $pokemon->export(); # ポケモンの情報をセッションに格納 ?>
                        <?php include('Resources/Partials/Home/Forms/change_nickname.php'); # ニックネームの変更?>
                        <?php include('Resources/Partials/Home/Forms/add_exp.php'); # 経験値の取得 ?>
                        <?php include('Resources/Partials/Home/Forms/battle.php'); # バトル ?>
                        <?php include('Resources/Partials/Home/Forms/reset.php'); # リセット ?>
                    </div>
                    <div class="col-12 col-sm-6 mb-5">
                        <div class="result-box border p-3 mb-3">
                            <?php foreach($controller->getMessages() as list($msg, $status)): ?>
                                <?php if($status == 'error') $class = 'text-danger'; ?>
                                <?php if($status == 'success') $class = 'text-success'; ?>
                                <p class="<?=$class ?? ''?>"><?=$msg?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
