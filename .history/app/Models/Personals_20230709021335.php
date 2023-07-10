<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Personals
 *
 * @property int $id
 * @property string $dni
 * @property string $apellidos
 * @property string $celular
 * @property \Illuminate\Support\Carbon $fecha_nacimiento
 */

class Personals extends Model
{
    use HasFactory;
}
