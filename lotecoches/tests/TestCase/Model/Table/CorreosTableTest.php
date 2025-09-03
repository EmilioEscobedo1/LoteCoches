<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorreosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorreosTable Test Case
 */
class CorreosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorreosTable
     */
    protected $Correos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Correos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Correos') ? [] : ['className' => CorreosTable::class];
        $this->Correos = $this->getTableLocator()->get('Correos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Correos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CorreosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
