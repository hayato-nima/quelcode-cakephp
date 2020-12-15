<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DealingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DealingsTable Test Case
 */
class DealingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DealingsTable
     */
    public $Dealings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dealings',
        'app.Bidinfos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dealings') ? [] : ['className' => DealingsTable::class];
        $this->Dealings = TableRegistry::getTableLocator()->get('Dealings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dealings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
