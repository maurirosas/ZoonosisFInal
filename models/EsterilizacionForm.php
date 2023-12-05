<?php

namespace app\models;

use yii\base\Model;
use app\models\domain\entity\Esterilizacion;


class EsterilizacionForm extends Model
{
    public $id;
    public $tatuaje;
    public $datatype;
    public $id_dueno;
    public $id_animal;
    public $id_stein;
    public $id_inventario;
    public $nombre;
    public $cantidad;
    public $fecha_esterilizacion;

    public function rules()
    {
        return [
            ['id', 'safe'],
            ['tatuaje', 'string' , 'min' => 3],
            ['datatype', 'safe'],
            ['id_dueno', 'string'],
            ['id_inventario', 'safe'],
            ['nombre', 'safe'],
            ['cantidad', 'safe'],
            ['id_animal', 'string'],
            
            
        ];
    }

    public function create() : bool{
        $this->id = uniqid();
        
        $esterilizacion = new Esterilizacion();
        $esterilizacion->id_inventario = $this->id_inventario ?? ''; // Proporcionar un valor predeterminado si $id_inventario es nulo
        $esterilizacion->load($this->attributes); 
        return $esterilizacion->create() > 0;
    }


    
    public function update() : bool{
        $esterilizacion = Esterilizacion::getById($this->id);
        $esterilizacion->tatuaje = $this->tatuaje;
        $esterilizacion->datatype = $this->datatype;
        $esterilizacion->id_dueno = $this->id_dueno;
        $esterilizacion->id_animal = $this->id_animal;
        
        return $esterilizacion->update() > 0;
    }


    


    
}