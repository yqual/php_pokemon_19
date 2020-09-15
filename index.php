<?php
require_once(__DIR__.'/Classes/Controller/IndexController.php');
session_start();
$controller = new IndexController();
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
                        <h1>PHPポケモン</h1>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <main>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-5">
                        <h2 class="mb-3">最初のポケモンを選択</h2>
                        <?php include('Resources/Partials/Index/Forms/select_pokemon.php'); ?>
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
