<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreferenciasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreferenciasTable Test Case
 */
class PreferenciasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PreferenciasTable
     */
    protected $Preferencias;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Preferencias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Preferencias') ? [] : ['className' => PreferenciasTable::class];
        $this->Preferencias = $this->getTableLocator()->get('Preferencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Preferencias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PreferenciasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
