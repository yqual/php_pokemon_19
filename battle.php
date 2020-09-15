<?php
require_once(__DIR__.'/Classes/Controller/BattleController.php');
require_once(__DIR__.'/Resources/Lang/Translation.php');
session_start();
$controller = new BattleController();
$pokemon = $controller->getPokemon();
$enemy = $controller->getEnemy();
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHPポケモン -バトル-</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/Assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12">
                        <h1>PHPポケモン -バトル-</h1>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <main>
        <div class="container">
            <section>
                <div class="row">
                    <?php # 敵ポケモン詳細 ?>
                    <div class="col-6">
                        <p><?=$enemy->getName()?> Lv:<?=$enemy->getLevel()?></p>
                    </div>
                    <div class="col-6">
                        <img src="Resources/Assets/img/pokemon/dots/<?=get_class($enemy)?>.gif" alt="<?=$enemy->getName()?>">
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-5">
                        <?php $_SESSION['pokemon'] = $pokemon->export(); # 自ポケモンの情報をセッションに格納 ?>
                        <?php $_SESSION['enemy'] = $enemy->export(); # 敵ポケモンの情報をセッションに格納 ?>
                        <?php include('Resources/Partials/Battle/Forms/move.php'); # たたかう ?>
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="hidden" name="action" value="run">
                                <input class="btn btn-danger" type="submit" value="逃げる">
                            </div>
                        </form>
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
