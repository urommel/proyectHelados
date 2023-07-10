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
 * @property string $direccion
 * @property string $foto
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property User $user
 * @package App\Models
 * @mixin \Eloquent
 * @method static \Database\Factories\PersonalsFactory factory(...$parameters)
 */

class Personals extends Model
{
    use HasFactory;
}
