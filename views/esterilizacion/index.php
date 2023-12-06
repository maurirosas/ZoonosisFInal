<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;

/** @var array $esterilizacion */
?>

<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 800px;
    }

    h1 {
        color: #28a745; /* Verde (#28a745) */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Sombra */
    }

    .btn-primary {
        background-color: #28a745; /* Verde (#28a745) */
        border-color: #28a745; /* Verde (#28a745) */
    }

    .btn-primary:hover {
        background-color: #218838; /* Verde oscuro (#218838) */
        border-color: #218838; /* Verde oscuro (#218838) */
    }

    .form-control {
        border-color: #28a745; /* Verde (#28a745) */
    }

    th {
        background-color: #28a745; /* Verde (#28a745) */
        color: #fff;
    }

    td a {
        margin-right: 5px;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4">Lista de esterilizaciones</h1>

    <div class="mb-3">
        <a href="<?= Url::to(['esterilizacion/create']) ?>" class="btn btn-primary">Nuevo Registro de Esterilizacion</a>
    </div>

    <input class="form-control mb-3" id="myInput" type="text" placeholder="Buscar...">

    <table class="table table-striped">
        <thead>
            <th>ID Esterilizacion</th>
            <th>Tatuaje</th>
            <th>Fecha</th>
            <th>Datatype</th>
            <th>Dueño</th>
            <th>Animal</th>
            <th>Acciones</th>
            <th>Inventario Usado</th>
            <th>Crear, Modificar</th>
            <th></th>
        </thead>
        <tbody id="myTable">
            <?php foreach ($esterilizacion as $row) : ?>
                <tr>
                    <td> <?= $row['id'] ?> </td>
                    <td> <?= $row['tatuaje'] ?> </td>
                    <td> <?= $row['fecha_esterilizacion'] ?> </td>
                    <td> <?= $row['datatype'] ?> </td>
                    <td> <?= $row['id_dueno'] ?> </td>
                    <td> <?= $row['id_animal'] ?> </td>
                    <td>
                        <a href="<?= Url::to(['esterilizacion/view', 'id' => $row['id']]) ?>" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="<?= Url::to(['esterilizacion/update', 'id' => $row['id']]) ?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                        <?= Html::a('<i class="fa-solid fa-trash-can"></i>', ['esterilizacion/delete', 'id' => $row['id']], ['data-confirm' => 'Desea eliminar el producto?', 'class' => 'btn btn-outline-danger btn-sm']) ?>
                    </td>

                    <td>
                        <a href="<?= Url::to(['esterilizacion/estein', 'id' => $row['id']]) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-business-time"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php
$script = <<< JS
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
JS;

$this->registerJs($script);
?>
