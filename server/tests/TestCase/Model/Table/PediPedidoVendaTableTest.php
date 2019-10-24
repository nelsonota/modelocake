<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PediPedidoVendaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PediPedidoTable Test Case
 */
class PediPedidoVendaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PediPedidoVendaTable
     */
    public $PediPedidoVenda;

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
        $config = TableRegistry::getTableLocator()->exists('PediPedidoVenda') ? [] : ['className' => PediPedidoVendaTable::class];
        $this->PediPedidoVenda = TableRegistry::getTableLocator()->get('PediPedidoVenda', $config);
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
        unset($this->PediPedidoVenda);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testEditComMesmaQtdItens()
    {
        $id = 4;
        $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(2.5, $pediPedidoVenda->pite_pedido_item[1]['pite_valor']);
        $data = [
            "pedi_tipo" => "V",
            "pedi_clie_codigo" => 1,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 3,
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 1,
                        "pite_quantidade" => 1,
                        "pite_valor" => 1.5,
                        "pite_valor_custo" => 1.5,
                        "pite_valor_realizado" => 1.5,
                    ],
                    [
                        "pite_codigo" => 4,
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 3.5,
                        "pite_valor_custo" => 3.5,
                        "pite_valor_realizado" => 3.5,
                    ]
            ],        
        ];
        $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data);
        $this->PediPedidoVenda->save($pediPedidoVenda);
        $this->assertEmpty($pediPedidoVenda->getErrors());
        $result = $this->PediPedidoVenda->get($id, [
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
        $id = 4;
        $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);
        $this->assertEquals(2, count($pediPedidoVenda->pite_pedido_item));
        $data = [
            "pedi_tipo" => "V",
            "pedi_clie_codigo" => 1,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 4,
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 3.5,
                        "pite_valor_custo" => 3.5,
                        "pite_valor_realizado" => 3.5,
                    ]
            ],        
        ];
        $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data, ['associated' => ['PitePedidoItem']]);
        $pediPedidoVenda->setDirty('pite_pedido_item', true);
        $this->PediPedidoVenda->save($pediPedidoVenda);
        $this->assertEmpty($pediPedidoVenda->getErrors());
        $result = $this->PediPedidoVenda->get($id, [
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
        $id = 4;
        $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
            'contain' => [
                'PitePedidoItem'
            ],
        ]);

        $data = [
            "pedi_tipo" => "V",
            "pedi_clie_codigo" => 1,
            "pedi_vend_codigo_estoque" => 1,
            "pedi_vend_codigo" => 1,
            "pite_pedido_item" => [
                    [
                        "pite_codigo" => 3,
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 1,
                        "pite_quantidade" => 1,
                        "pite_valor" => 1.5,
                        "pite_valor_custo" => 1.5,
                        "pite_valor_realizado" => 1.5,
                    ],
                    [
                        "pite_codigo" => 4,
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 2,
                        "pite_quantidade" => 2,
                        "pite_valor" => 2.5,
                        "pite_valor_custo" => 2.5,
                        "pite_valor_realizado" => 2.5,
                    ],
                    [
                        "pite_pedi_codigo" => 4,
                        "pite_prod_codigo" => 3,
                        "pite_quantidade" => 2,
                        "pite_valor" => 4.5,
                        "pite_valor_custo" => 4.5,
                        "pite_valor_realizado" => 4.5,
                    ]
            ],        
        ];
        $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data);
        $this->PediPedidoVenda->save($pediPedidoVenda);
        $expected['pite_pedido_item'][2]['pite_quantidade']['saldo'] = 'Sem estoque disponível';
        $this->assertEquals($expected, $pediPedidoVenda->getErrors());
    }

    /**
     * Test initialize method
     *
     * @return void
     */
     public function testEditMesmaQtdItensMasSemSaldo()
     {
         $id = 4;
         $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
             'contain' => [
                 'PitePedidoItem'
             ],
         ]);
         $this->assertEquals(2.5, $pediPedidoVenda->pite_pedido_item[1]['pite_valor']);
         $data = [
             "pedi_tipo" => "V",
             "pedi_clie_codigo" => 1,
             "pedi_vend_codigo_estoque" => 1,
             "pedi_vend_codigo" => 1,
             "pite_pedido_item" => [
                     [
                         "pite_codigo" => 3,
                         "pite_pedi_codigo" => 4,
                         "pite_prod_codigo" => 1,
                         "pite_quantidade" => 1,
                         "pite_valor" => 1.5,
                         "pite_valor_custo" => 1.5,
                         "pite_valor_realizado" => 1.5,
                     ],
                     [
                         "pite_codigo" => 4,
                         "pite_pedi_codigo" => 4,
                         "pite_prod_codigo" => 2,
                         "pite_quantidade" => 11,
                         "pite_valor" => 2.5,
                         "pite_valor_custo" => 2.5,
                         "pite_valor_realizado" => 2.5,
                     ]
             ],        
         ];
         $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data);
         $this->PediPedidoVenda->save($pediPedidoVenda);
         $expected['pite_pedido_item'][1]['pite_quantidade']['saldo'] = 'Sem estoque disponível';
         $this->assertEquals($expected, $pediPedidoVenda->getErrors());
     }
}
