<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;

/** @var array $propietario */
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
    <h1 class="mb-4">Lista de propietarios registrados</h1>

    <div class="mb-3">
        <a href="<?= Url::to(['propietario/create']) ?>" class="btn btn-primary">Registrar nuevo propietario</a>
    </div>

    <input class="form-control mb-3" id="myInput" type="text" placeholder="Buscar...">

    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </thead>
        <tbody id="myTable">
            <?php foreach ($propietario as $row) : ?>
                <tr>
                    <td> <?= $row['id_dueno'] ?> </td>
                    <td> <?= $row['nombre'] ?> </td>
                    <td> <?= $row['apellidos'] ?> </td>
                    <td> <?= $row['celular'] ?> </td>
                    <td> <?= $row['direccion'] ?> </td>
                    <td>
                        <a href="<?= Url::to(['propietario/view', 'id_dueno' => $row['id_dueno']]) ?>" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="<?= Url::to(['propietario/update', 'id_dueno' => $row['id_dueno']]) ?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                        <?= Html::a('<i class="fa-solid fa-trash-can"></i>', ['propietario/delete', 'id_dueno' => $row['id_dueno']], ['data-confirm' => '¿Desea eliminar el registro?', 'class' => 'btn btn-outline-danger btn-sm']) ?>
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
