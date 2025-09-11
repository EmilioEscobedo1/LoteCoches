<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiculo Entity
 *
 * @property int $id
 * @property string $marca
 * @property string|null $modelo
 * @property string|null $anio
 * @property string|null $precio
 * @property string|null $kilometraje
 * @property string|null $color
 * @property string|null $numero_de_serie
 * @property int|null $categoria_id
 * @property int|null $sucursal_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 */
class Vehiculo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'marca' => true,
        'modelo' => true,
        'anio' => true,
        'precio' => true,
        'kilometraje' => true,
        'color' => true,
        'numero_de_serie' => true,
        'categoria_id' => true,
        'sucursal_id' => true,
        'categoria' => true,
        'imagen' => true, // Permite guardar la ruta de la imagen
    ];
}
