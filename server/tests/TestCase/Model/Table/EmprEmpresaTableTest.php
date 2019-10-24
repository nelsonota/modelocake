<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmprEmpresaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmprEmpresaTable Test Case
 */
class EmprEmpresaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmprEmpresaTable
     */
    public $EmprEmpresa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmprEmpresa'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EmprEmpresa') ? [] : ['className' => EmprEmpresaTable::class];
        $this->EmprEmpresa = TableRegistry::getTableLocator()->get('EmprEmpresa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmprEmpresa);

        parent::tearDown();
    }

    /**
     * Test Add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'empr_documento' => '52173606000122',
            'empr_razao_social' => 'Levance',
        ];
        $emprEmpresa = $this->EmprEmpresa->newEntity();
        $this->EmprEmpresa->patchEntity($emprEmpresa, $data);
        $this->EmprEmpresa->save($emprEmpresa);
        $this->assertEmpty($emprEmpresa->getErrors());
    }
}