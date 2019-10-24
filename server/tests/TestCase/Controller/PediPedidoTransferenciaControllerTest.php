<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PediPedidoTransferenciaController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\PediPedidoTransferenciaController Test Case
 */
class PediPedidoTransferenciaControllerTest extends TestCase
{
    use IntegrationTestTrait;

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

    public $token = null;

    public function setUp()
    {
        $login = [
            "usua_email" => "teste@teste.com", 
            "usua_senha" => "teste",
        ];
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $this->post('/api/usuario/login', $login);
        $response = json_decode((string)$this->_response->getBody());
        $this->token = $response->usuario->token;
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
                // 'Content-Type' => 'multipart/form-data',
                'model' => 'pedido_compra'
            ]
        ]);

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
        $this->post('/api/pedido_transferencia', $data, ['headers' => ['Accept' => 'application/json']]);

        $this->assertResponseSuccess();
        $PediPedidoTransferencia = TableRegistry::getTableLocator()->get('PediPedidoTransferencia');
        $this->assertEquals(2, $PediPedidoTransferencia->find()->where(['pedi_tipo' => 'S'])->count());
        $this->assertEquals(2, $PediPedidoTransferencia->find()->where(['pedi_tipo' => 'E'])->count());
    }
}
