<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PediPedidoCompraTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PediPedidoTable Test Case
 */
class PediPedidoCompraTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PediPedidoCompraTable
     */
    public $PediPedidoCompra;

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
        $config = TableRegistry::getTableLocator()->exists('PediPedidoCompra') ? [] : ['className' => PediPedidoCompraTable::class];
        $this->PediPedidoCompra = TableRegistry::getTableLocator()->get('PediPedidoCompra', $config);
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
        unset($this->PediPedidoCompra);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testEditComMesmaQtdItens()
    {
        $id = 1;
        $pediPedidoCompra = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(2.5, $pediPedidoCompra->pite_pedido_item[1]['pite_valor']);
        $data = [
            "pedi_codigo" => 1,
            "pedi_pedi_codigo" => 1,
            "pedi_tipo" => "C",
            "pedi_forn_codigo" => 2,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 1,
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 1,
                        "pite_quantidade" => 1,
                        "pite_valor" => 1.5,
                        "pite_valor_custo" => 1.5,
                        "pite_valor_realizado" => 1.5,
                    ],
                    [
                        "pite_codigo" => 2,
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 3.5,
                        "pite_valor_custo" => 3.5,
                        "pite_valor_realizado" => 3.5,
                    ]
            ],        
        ];
        $pediPedidoCompra = $this->PediPedidoCompra->patchEntity($pediPedidoCompra, $data);
        $this->PediPedidoCompra->save($pediPedidoCompra);
        $this->assertEmpty($pediPedidoCompra->getErrors());
        $result = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(3.5, $result->pite_pedido_item[1]['pite_valor']);
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testEditExclusaoItem()
    {
        $id = 1;
        $pediPedidoCompra = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(2, count($pediPedidoCompra->pite_pedido_item));
        $data = [
            "pedi_codigo" => 1,
            "pedi_pedi_codigo" => 1,
            "pedi_tipo" => "C",
            "pedi_forn_codigo" => 2,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 2,
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 3.5,
                        "pite_valor_custo" => 3.5,
                        "pite_valor_realizado" => 3.5,
                    ]
            ],        
        ];
        $pediPedidoCompra = $this->PediPedidoCompra->patchEntity($pediPedidoCompra, $data, ['associated' => ['PitePedidoItem']]);
        $pediPedidoCompra->setDirty('pite_pedido_item', true);
        $this->PediPedidoCompra->save($pediPedidoCompra);
        $this->assertEmpty($pediPedidoCompra->getErrors());
        $result = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(1, count($result->pite_pedido_item));
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testEditAddQtdItens()
    {
        $id = 1;
        $pediPedidoCompra = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(2.5, $pediPedidoCompra->pite_pedido_item[1]['pite_valor']);
        $data = [
            "pedi_codigo" => 1,
            "pedi_pedi_codigo" => 1,
            "pedi_tipo" => "C",
            "pedi_forn_codigo" => 2,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 1,
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 1,
                        "pite_quantidade" => 1,
                        "pite_valor" => 1.5,
                        "pite_valor_custo" => 1.5,
                        "pite_valor_realizado" => 1.5,
                    ],
                    [
                        "pite_codigo" => 2,
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 3.5,
                        "pite_valor_custo" => 3.5,
                        "pite_valor_realizado" => 3.5,
                    ],
                    [
                        "pite_pedi_codigo" => 1,
                        "pite_prod_codigo" => 3,
                        "pite_quantidade" => 2,
                        "pite_valor" => 4.5,
                        "pite_valor_custo" => 4.5,
                        "pite_valor_realizado" => 4.5,
                    ]
            ],        
        ];
        $pediPedidoCompra = $this->PediPedidoCompra->patchEntity($pediPedidoCompra, $data);
        $this->PediPedidoCompra->save($pediPedidoCompra);
        $this->assertEmpty($pediPedidoCompra->getErrors());
        $result = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(3.5, $result->pite_pedido_item[1]['pite_valor']);
        $this->assertEquals(3, count($result->pite_pedido_item));
    }
}
