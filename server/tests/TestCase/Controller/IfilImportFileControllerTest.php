<?php
namespace App\Test\TestCase\Controller;

use App\Controller\IfilImportFileController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;
use Cake\Http\Client\FormData;

/**
 * App\Controller\IfilImportFileController Test Case
 */
class IfilImportFileControllerTest extends TestCase
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
        'app.ClieCliente',
        'app.VendVendedor',
        'app.ProdProduto',
        'app.PediPedido',
        'app.PitePedidoItem',
        'app.JourJournal',
        'app.JdetJournalDetail',
        'app.IfilImportFile',
        'app.IproImportProduto',
        'app.IpedImportPedido',
        'app.IpitImportPedidoItem',
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
    public function testAddPedido()
    {
        
        $filename = ROOT.DS.'tests'.DS.'Csv'.DS.'pedidos.csv';

        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
                // 'Content-Type' => 'multipart/form-data',
                'model' => 'pedido_compra'
            ]
        ]);

        $_FILES = [
            'file' => [
                'error'    => UPLOAD_ERR_OK,
                'name'     => 'pedidos.csv',  // WRONG TYPE
                'size'     => 123,
                'tmp_name' => $filename,   // use THIS file - a real file
                'type'     => 'text/csv'
            ]
        ];
        
        $response = $this->post('/api/importacao', $_FILES);

        $this->assertResponseSuccess();

        $IfilImportFile = TableRegistry::getTableLocator()->get('IfilImportFile');
        $ifilImportFile = $IfilImportFile->find()->where(['ifil_codigo' => 3])->contain(['IpedImportPedido', 'IpedImportPedido.IpitImportPedidoItem']);
        $this->assertEquals(1, $ifilImportFile->count());
        $this->assertEquals(2, $ifilImportFile->first()->iped_import_pedido->iped_codigo);
        $this->assertEquals(2, count($ifilImportFile->first()->iped_import_pedido['ipit_import_pedido_item']));
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditProduto()
    {
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
                'model' => 'produto'
            ]
        ]);
        $this->put('/api/importacao/1', []);

        $this->assertResponseSuccess();
        $IfilImportFile = TableRegistry::getTableLocator()->get('IfilImportFile');
        $ifilImportFile = $IfilImportFile->find()->where(['ifil_codigo' => 1])->contain(['IproImportProduto', 'IproImportProduto.ProdProduto'])->first()->toArray();

        //Novo Produto + Sem Fornecedor
        $this->assertEquals(4   , $ifilImportFile['ipro_import_produto'][0]['ipro_prod_codigo']);
        $this->assertEquals(null, $ifilImportFile['ipro_import_produto'][0]['ipro_forn_codigo']);
        $this->assertEquals(1   , $ifilImportFile['ipro_import_produto'][0]['ipro_status']);

        //Atualizar Produto + Fornecedor Existente
        $this->assertEquals(2   , $ifilImportFile['ipro_import_produto'][1]['ipro_prod_codigo']);
        $this->assertEquals(2   , $ifilImportFile['ipro_import_produto'][1]['ipro_forn_codigo']);
        $this->assertEquals(2   , $ifilImportFile['ipro_import_produto'][1]['ipro_status']);

        //Novo Produto + Novo Fornecedor
        $this->assertEquals(5   , $ifilImportFile['ipro_import_produto'][2]['ipro_prod_codigo']);
        $this->assertEquals(3   , $ifilImportFile['ipro_import_produto'][2]['ipro_forn_codigo']);
        $this->assertEquals(1   , $ifilImportFile['ipro_import_produto'][2]['ipro_status']);
        
        $ProdProduto = TableRegistry::getTableLocator()->get('ProdProduto');
        $this->assertEquals(5, $ProdProduto->find()->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditPedido()
    {
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
                'model' => 'pedido'
            ]
        ]);
        $this->put('/api/importacao/2', []);

        $this->assertResponseSuccess();
        $IfilImportFile = TableRegistry::getTableLocator()->get('IfilImportFile');
        $ifilImportFile = $IfilImportFile->find()->where(['ifil_codigo' => 2])->contain(['IpedImportPedido', 'IpedImportPedido.IpitImportPedidoItem']);

        $this->assertEquals(1, $ifilImportFile->count());
        $this->assertEquals(5, $ifilImportFile->first()->iped_import_pedido['iped_pedi_codigo']);
        $this->assertEquals(1, count($ifilImportFile->first()->iped_import_pedido['ipit_import_pedido_item']));
    }

}
