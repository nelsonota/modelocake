<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IpedImportPedidoFixture
 */
class IpedImportPedidoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'iped_import_pedido';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'iped_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'iped_ifil_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_pedi_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_tipo' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        'iped_baixado' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'iped_clie_cnpjcpf' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_clie_nome' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_clie_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_forn_cnpjcpf' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_forn_nome' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_forn_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_vend_cnpjcpf_estoque' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_vend_codigo_estoque' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_vend_cnpjcpf' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'iped_vend_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'iped_imported' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'iped_message' => ['type' => 'json', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'iped_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'iped_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'iped_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['iped_codigo'], 'length' => []],
            'iped_empr' => ['type' => 'foreign', 'columns' => ['iped_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'iped_ifil' => ['type' => 'foreign', 'columns' => ['iped_ifil_codigo'], 'references' => ['ifil_import_file', 'ifil_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'iped_usua' => ['type' => 'foreign', 'columns' => ['iped_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                // 'iped_codigo' => 1,
                'iped_ifil_codigo' => 2,
                'iped_pedi_codigo' => null,
                'iped_tipo' => 'C',
                'iped_baixado' => null,
                'iped_clie_cnpjcpf' => null,
                'iped_clie_nome' => null,
                'iped_clie_codigo' => null,
                'iped_forn_cnpjcpf' => '68038428000167',
                'iped_forn_nome' => 'Fornecedor 2',
                'iped_forn_codigo' => null,
                'iped_vend_cnpjcpf_estoque' => '26800298875',
                'iped_vend_codigo_estoque' => null,
                'iped_vend_cnpjcpf' => '26800298875',
                'iped_vend_codigo' => null,
                'iped_empr_codigo' => 1,
                'iped_usua_codigo' => 1,
                'iped_imported' => null,
                'iped_message' => null,
                'iped_created' => 1562703322,
                'iped_modified' => null,
                'iped_deleted' => null
            ],
        ];
        parent::init();
    }
}
