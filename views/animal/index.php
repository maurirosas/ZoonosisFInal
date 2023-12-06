<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;

/** @var array $animal */
?>

<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 800px;
    }

    h1 {
        color: #28a745; /* Cambiado a verde (#28a745) */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Añadida sombra */
    }

    .btn-primary {
        background-color: #28a745; /* Cambiado a verde (#28a745) */
        border-color: #28a745; /* Cambiado a verde (#28a745) */
    }

    .btn-primary:hover {
        background-color: #218838; /* Cambiado a un tono más oscuro (#218838) */
        border-color: #218838; /* Cambiado a un tono más oscuro (#218838) */
    }

    .form-control {
        border-color: #28a745; /* Cambiado a verde (#28a745) */
    }

    th {
        background-color: #28a745; /* Cambiado a verde (#28a745) */
        color: #fff;
    }

    td a {
        margin-right: 5px;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4">Lista de animales</h1>

    <div class="mb-3">
        <a href="<?= Url::to(['animal/create']) ?>" class="btn btn-primary">Registrar animal/paciente</a>
    </div>

    <input class="form-control mb-3" id="myInput" type="text" placeholder="Buscar...">

    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Zona/Direccion</th>
            <th>Especie</th>
            <th>Acciones</th>
        </thead>
        <tbody id="myTable">
            <?php foreach ($animal as $row) : ?>
                <tr>
                    <td> <?= $row['id_animal'] ?> </td>
                    <td> <?= $row['nombre_animal'] ?> </td>
                    <td> <?= $row['genero'] ?> </td>
                    <td> <?= $row['zona_direccion'] ?> </td>
                    <td> <?= $row['especie'] ?> </td>
                    <td>
                        <a href="<?= Url::to(['animal/view', 'id_animal' => $row['id_animal']]) ?>" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="<?= Url::to(['animal/update', 'id_animal' => $row['id_animal']]) ?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                        <?= Html::a('<i class="fa-solid fa-trash-can"></i>', ['animal/delete', 'id_animal' => $row['id_animal']], ['data-confirm' => '¿Desea eliminar el registro?', 'class' => 'btn btn-outline-danger btn-sm']) ?>
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
