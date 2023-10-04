<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $Rol
 * @property string $NombreUsuario
 * @property string $Correo
 * @property string $Documento
 * @property string $NumeroCelular
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $fillable = [
		'Rol',
		'NombreUsuario',
		'Correo',
		'Documento',
		'NumeroCelular'
	];
}
