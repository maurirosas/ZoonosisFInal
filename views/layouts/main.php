<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-success text-white align-items-center">
                <div class="col-12 text-center mt-3 mb-3">
                    <?= Html::img('@web/img/logo2.png', ['class' => 'img-fluid', 'alt' => 'Tu Imagen']) ?>
                </div>
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <ul class="nav flex-column text-center">
                        <!-- Imagen en la parte superior -->
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-home fa-2x"></i><br> Inicio', ['/site/index'], ['class' => 'nav-link h5 text-white mb-3']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-box fa-2x"></i><br> Inventario', ['/inventario/index'], ['class' => 'nav-link h5 text-white mb-3']) ?>
                        </li>
                        <li class="nav-item dropdown">
                            <?= Html::a('<i class="fas fa-plus-circle fa-2x"></i><br> Nuevo Registro', '#', ['class' => 'nav-link dropdown-toggle h5 text-white mb-3', 'id' => 'nuevoRegistroDropdown', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false']) ?>
                            <ul class="dropdown-menu text-center bg-success" aria-labelledby="nuevoRegistroDropdown">
                                <li class="nav-item">
                                    <?= Html::a('<i class="fas fa-syringe fa-lg"></i><br> Esterilización', ['/esterilizacion/index'], ['class' => 'nav-link h6 text-white mb-2']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('<i class="fas fa-chart-line fa-lg"></i><br> Seguimiento Epidemiológico', ['/rabia/index'], ['class' => 'nav-link h6 text-white mb-2']) ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-paw fa-2x"></i><br> Lista de animales', ['/animal/index'], ['class' => 'nav-link h5 text-white mb-3']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-user fa-2x"></i><br> Lista de propietarios', ['/propietario/index'], ['class' => 'nav-link h5 text-white mb-3']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-users fa-2x"></i><br> Usuarios', ['/usuario/index'], ['class' => 'nav-link h5 text-white mb-3']) ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= Html::encode($this->title) ?></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <!-- Inserta aquí tu código para el buscador -->
                        </div>
                    </div>
                </div>
                <div class="container">
                    <?php if (!empty($this->params['breadcrumbs'])) : ?>
                        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                    <?php endif ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </main>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>