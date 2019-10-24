<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdProdutoFixture
 */
class ProdProdutoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'prod_produto';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'prod_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'prod_forn_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'prod_codigo_interno' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_codigo_externo' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_descricao' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_valor' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'prod_valor_custo' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'prod_unidade' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_tamanho' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_cor' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'prod_status' => ['type' => 'smallinteger', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'prod_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'prod_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'prod_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'prod_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'prod_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['prod_codigo'], 'length' => []],
            'prod_codigo_externo' => ['type' => 'unique', 'columns' => ['prod_forn_codigo', 'prod_codigo_externo', 'prod_tamanho', 'prod_cor'], 'length' => []],
            'prod_empr' => ['type' => 'foreign', 'columns' => ['prod_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prod_forn' => ['type' => 'foreign', 'columns' => ['prod_forn_codigo'], 'references' => ['forn_fornecedor', 'forn_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prod_usua' => ['type' => 'foreign', 'columns' => ['prod_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'prod_forn_codigo' => 1,
                'prod_codigo_interno' => 'i001',
                'prod_codigo_externo' => 'e001',
                'prod_descricao' => 'Produto 1',
                'prod_valor' => 1.5,
                'prod_valor_custo' => 1.5,
                'prod_unidade' => 'Lo',
                'prod_tamanho' => 'Lor',
                'prod_cor' => 'Lorem ipsum dolor ',
                'prod_status' => 1,
                'prod_empr_codigo' => 1,
                'prod_usua_codigo' => 1,
                'prod_created' => 1560115944,
                'prod_modified' => null,
                'prod_deleted' => null
            ],
            [
                'prod_forn_codigo' => 1,
                'prod_codigo_interno' => 'i002',
                'prod_codigo_externo' => 'e002',
                'prod_descricao' => 'Produto 2',
                'prod_valor' => 2.5,
                'prod_valor_custo' => 2.5,
                'prod_unidade' => 'Lo',
                'prod_tamanho' => 'Lor',
                'prod_cor' => 'Lorem ipsum dolor ',
                'prod_status' => 1,
                'prod_empr_codigo' => 1,
                'prod_usua_codigo' => 1,
                'prod_created' => 1560115944,
                'prod_modified' => null,
                'prod_deleted' => null
            ],
            [
                'prod_forn_codigo' => 1,
                'prod_codigo_interno' => 'i003',
                'prod_codigo_externo' => 'e003',
                'prod_descricao' => 'Produto 3',
                'prod_valor' => 2.5,
                'prod_valor_custo' => 2.5,
                'prod_unidade' => 'Lo',
                'prod_tamanho' => 'Lor',
                'prod_cor' => 'Lorem ipsum dolor ',
                'prod_status' => 1,
                'prod_empr_codigo' => 1,
                'prod_usua_codigo' => 1,
                'prod_created' => 1560115944,
                'prod_modified' => null,
                'prod_deleted' => null
            ],
        ];
        parent::init();
    }
}
