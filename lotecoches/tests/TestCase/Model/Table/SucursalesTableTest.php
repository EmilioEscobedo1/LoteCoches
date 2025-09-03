<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SucursalesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SucursalesTable Test Case
 */
class SucursalesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SucursalesTable
     */
    protected $Sucursales;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Sucursales',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sucursales') ? [] : ['className' => SucursalesTable::class];
        $this->Sucursales = $this->getTableLocator()->get('Sucursales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sucursales);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\SucursalesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
