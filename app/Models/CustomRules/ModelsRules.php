<?php

namespace App\Models\CustomRules;

use App\Models\RolesEntitiesModel;



class ModelsRules
{
    // Se requiere crear las funciones concernientes a las otroas llaves foraneas.

    // Se crearan funciones para las tablas: 
    /*
        - JobsPosted => [IdSchedule, IdBussiness, IdCategories]
    */

    // Es decir, se realizaran 3 funciones, el naming de estas debe ser parecido a la funcion ya creada. (is_valid_role)

    // No olvidar poner las validaciones en sus correspondientes espacios dentro del modelo que corresponda.
    
    public function is_valid_role(int $id): bool
    {
        $model = new RolesEntitiesModel();
        $role = $model->find($id);

        return $role == null ? false : true;
    }
}
