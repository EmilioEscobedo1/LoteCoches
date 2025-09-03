<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiculosFixture
 */
class VehiculosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'marca' => 'Lorem ipsum dolor sit amet',
                'modelo' => 'Lorem ipsum dolor sit amet',
                'anio' => 'Lo',
                'precio' => 'Lorem ipsum dolor ',
                'kilometraje' => 'Lorem ipsum dolor ',
                'color' => 'Lorem ipsum dolor sit amet',
                'numero_de_serie' => 'Lorem ipsum dolor sit amet',
                'categoria_id' => 1,
            ],
        ];
        parent::init();
    }
}
