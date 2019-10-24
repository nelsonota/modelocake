<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IproImportProdutoFixture
 */
class IproImportProdutoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ipro_import_produto';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ipro_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ipro_ifil_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipro_prod_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipro_forn_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipro_forn_cnpjcpf' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_forn_nome' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_codigo_interno' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_codigo_externo' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_descricao' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_valor' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'ipro_valor_custo' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'ipro_unidade' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_tamanho' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_cor' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipro_status' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ipro_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipro_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipro_imported' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipro_message' => ['type' => 'json', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipro_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'ipro_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipro_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ipro_codigo'], 'length' => []],
            'ipro_empr' => ['type' => 'foreign', 'columns' => ['ipro_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipro_forn' => ['type' => 'foreign', 'columns' => ['ipro_forn_codigo'], 'references' => ['forn_fornecedor', 'forn_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipro_ifil' => ['type' => 'foreign', 'columns' => ['ipro_ifil_codigo'], 'references' => ['ifil_import_file', 'ifil_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipro_prod' => ['type' => 'foreign', 'columns' => ['ipro_prod_codigo'], 'references' => ['prod_produto', 'prod_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipro_usua' => ['type' => 'foreign', 'columns' => ['ipro_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                // 'ipro_codigo' => 1,
                'ipro_ifil_codigo' => 1,
                'ipro_prod_codigo' => null,
                'ipro_forn_codigo' => null,
                'ipro_forn_cnpjcpf' => null,
                'ipro_forn_nome' => null,
                'ipro_codigo_interno' => '001',
                'ipro_codigo_externo' => '001e',
                'ipro_descricao' => 'Produto1',
                'ipro_valor' => 1.5,
                'ipro_valor_custo' => 1.5,
                'ipro_unidade' => 'UN',
                'ipro_tamanho' => 'G',
                'ipro_cor' => 'PRETO',
                'ipro_status' => null,
                'ipro_message' => null,
                'ipro_empr_codigo' => 1,
                'ipro_usua_codigo' => 1,
                'ipro_imported' => null,
                'ipro_created' => 1562374957,
                'ipro_modified' => null,
                'ipro_deleted' => null
            ],
            [
                // 'ipro_codigo' => 1,
                'ipro_ifil_codigo' => 1,
                'ipro_prod_codigo' => null,
                'ipro_forn_codigo' => null,
                'ipro_forn_cnpjcpf' => '68038428000167',
                'ipro_forn_nome' => 'Fornecedor 2',
                'ipro_codigo_interno' => 'i002',
                'ipro_codigo_externo' => '002e',
                'ipro_descricao' => 'Produto2',
                'ipro_valor' => 1.5,
                'ipro_valor_custo' => 1.5,
                'ipro_unidade' => 'UN',
                'ipro_tamanho' => 'G',
                'ipro_cor' => 'PRETO',
                'ipro_status' => null,
                'ipro_message' => null,
                'ipro_empr_codigo' => 1,
                'ipro_usua_codigo' => 1,
                'ipro_imported' => null,
                'ipro_created' => 1562374957,
                'ipro_modified' => null,
                'ipro_deleted' => null
            ],
            [
                // 'ipro_codigo' => 1,
                'ipro_ifil_codigo' => 1,
                'ipro_prod_codigo' => null,
                'ipro_forn_codigo' => null,
                'ipro_forn_cnpjcpf' => '52173606000122',
                'ipro_forn_nome' => 'Novo Fornecedor',
                'ipro_codigo_interno' => '003',
                'ipro_codigo_externo' => '003e',
                'ipro_descricao' => 'Produto3',
                'ipro_valor' => 1.5,
                'ipro_valor_custo' => 1.5,
                'ipro_unidade' => 'UN',
                'ipro_tamanho' => 'G',
                'ipro_cor' => 'PRETO',
                'ipro_status' => null,
                'ipro_message' => null,
                'ipro_empr_codigo' => 1,
                'ipro_usua_codigo' => 1,
                'ipro_imported' => null,
                'ipro_created' => 1562374957,
                'ipro_modified' => null,
                'ipro_deleted' => null
            ],
        ];
        parent::init();
    }
}
