<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmprEmpresaController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\EmprEmpresaController Test Case
 */
class EmprEmpresaControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmprEmpresa',
        'app.UsuaUsuario'
    ];

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'empr_documento' => '52173606000122',
            'empr_razao_social' => 'Levance',
            'usua_email' => 'nelsonota@gmail.com',
            'usua_senha' => 'teste',
            'usua_nome' => 'Nelson Tatsuo Ota'
        ];
        $this->post('/api/empresa', $data, ['headers' => ['Accept' => 'application/json']]);

        $this->assertResponseSuccess();
        $empresa = TableRegistry::getTableLocator()->get('EmprEmpresa');
        $query = $empresa->find()->where(['empr_documento' => $data['empr_documento']]);
        $this->assertEquals(1, $query->count());
        $query = $empresa->UsuaUsuario->find()->where(['usua_email' => $data['usua_email']]);
        $this->assertEquals(1, $query->count());
    }
}
