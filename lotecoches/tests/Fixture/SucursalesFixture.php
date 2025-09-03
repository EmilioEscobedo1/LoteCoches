<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SucursalesFixture
 */
class SucursalesFixture extends TestFixture
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
                'nombre' => 'Lorem ipsum dolor sit amet',
                'direccion' => 'Lorem ipsum dolor sit amet',
                'telefono' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
