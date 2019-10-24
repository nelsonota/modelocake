<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PediPedidoTransferenciaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PediPedidoTable Test Case
 */
class PediPedidoTransferenciaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PediPedidoTransferenciaTable
     */
    public $PediPedidoTransferencia;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmprEmpresa',
        'app.UsuaUsuario',
        'app.FornFornecedor',
        'app.ProdProduto',
        'app.VendVendedor',
        'app.ClieCliente',
        'app.PediPedido',
        'app.PitePedidoItem',
        'app.JourJournal',
        'app.JdetJournalDetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PediPedidoTransferencia') ? [] : ['className' => PediPedidoTransferenciaTable::class];
        $this->PediPedidoTransferencia = TableRegistry::getTableLocator()->get('PediPedidoTransferencia', $config);
        $_SESSION['Auth']['User'] = [
            'usua_codigo' => 1,
            'usua_empr_codigo' => 1,
        ];
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PediPedidoTransferencia);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testTransferir()
    {
        $data = [
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pedi_vend_codigo_destino" => 2,
            "pite_pedido_item" => [
                    [
                        "pite_prod_codigo" => 1,
                        "pite_quantidade" => 1,
                        "pite_valor_custo" => 0,
                        "pite_valor" => 0,
                        "pite_valor_realizado" => 0,
                    ],
                    [
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor_custo" => 0,
                        "pite_valor" => 0,
                        "pite_valor_realizado" => 0,
                    ]
            ],        
        ];
        $data['pedi_tipo'] = 'S';
        $pedido = $data;
        $data['pedi_tipo'] = 'E';
        $data['pedi_vend_codigo_estoque'] = $data['pedi_vend_codigo_destino'];
        $pedido['pedi_pedido_origem'] = $data;
        $pediPedidoTransferencia = $this->PediPedidoTransferencia->newEntity($pedido, ['associated' => ['PitePedidoItem', 'PediPedidoOrigem', 'PediPedidoOrigem.PitePedidoItem']]);
        $this->PediPedidoTransferencia->save($pediPedidoTransferencia);
        $this->assertEquals(2, $this->PediPedidoTransferencia->find()->where(['pedi_tipo' => 'S'])->count());
        $this->assertEquals(2, $this->PediPedidoTransferencia->find()->where(['pedi_tipo' => 'E'])->count());        
    }
}
