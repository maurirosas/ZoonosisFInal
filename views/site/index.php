<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Zoonosis Tarija';
?>

<div class="site-index">

    <div class="container text-center"> <!-- Modificado el margen superior a mt-3 -->
        <div class="jumbotron bg-transparent">
            <h1 class="display-4">Sistema de Zoonosis Tarija</h1>
            <p class="lead">Bienvenido al sistema de documentación de Zoonosis Tarija</p>
            <?= Html::a('Comenzar', ['/animal/create'], ['class' => 'btn btn-lg btn-success']) ?>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 mx-auto">
                <?= Html::beginTag('div', ['class' => 'text-center']) ?>
                    <?= Html::img('@web/img/goldenret2.png', ['class' => 'img-fluid img-hover', 'alt' => 'Imagen 2']) ?>
                <?= Html::endTag('div') ?>
            </div>
        </div>
    </div>
</div>

<style>
    .img-hover:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }
</style>
