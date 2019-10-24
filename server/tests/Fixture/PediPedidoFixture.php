<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PediPedidoFixture
 */
class PediPedidoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pedi_pedido';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'pedi_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pedi_pedi_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_tipo' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        'pedi_baixado' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'pedi_clie_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_forn_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_vend_codigo_estoque' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_vend_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_frete' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pedi_desconto' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pedi_comissao' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pedi_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pedi_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'pedi_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'pedi_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['pedi_codigo'], 'length' => []],
            'pedi_clie' => ['type' => 'foreign', 'columns' => ['pedi_clie_codigo'], 'references' => ['clie_cliente', 'clie_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pedi_empr' => ['type' => 'foreign', 'columns' => ['pedi_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pedi_forn' => ['type' => 'foreign', 'columns' => ['pedi_forn_codigo'], 'references' => ['forn_fornecedor', 'forn_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pedi_usua' => ['type' => 'foreign', 'columns' => ['pedi_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pedi_vend' => ['type' => 'foreign', 'columns' => ['pedi_vend_codigo'], 'references' => ['vend_vendedor', 'vend_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'pedi_pedi_codigo' => null,
                'pedi_tipo' => 'C',
                'pedi_baixado' => 1560992250,
                'pedi_clie_codigo' => null,
                'pedi_forn_codigo' => 1,
                'pedi_vend_codigo_estoque' => 1,
                'pedi_vend_codigo' => 1,
                'pedi_frete' => null,
                'pedi_desconto' => null,
                'pedi_comissao' => null,
                'pedi_usua_codigo' => 1,
                'pedi_empr_codigo' => 1,
                'pedi_created' => 1560992250,
                'pedi_modified' => null,
                'pedi_deleted' => null
            ],
            [
                'pedi_pedi_codigo' => null,
                'pedi_tipo' => 'S',
                'pedi_baixado' => 1560992250,
                'pedi_clie_codigo' => null,
                'pedi_forn_codigo' => 1,
                'pedi_vend_codigo_estoque' => 1,
                'pedi_vend_codigo' => 1,
                'pedi_frete' => null,
                'pedi_desconto' => null,
                'pedi_comissao' => null,
                'pedi_usua_codigo' => 1,
                'pedi_empr_codigo' => 1,
                'pedi_created' => 1560992250,
                'pedi_modified' => null,
                'pedi_deleted' => null
            ],
            [
                'pedi_pedi_codigo' => 2,
                'pedi_tipo' => 'E',
                'pedi_baixado' => 1560992250,
                'pedi_clie_codigo' => null,
                'pedi_forn_codigo' => 1,
                'pedi_vend_codigo_estoque' => 2,
                'pedi_vend_codigo' => 1,
                'pedi_frete' => null,
                'pedi_desconto' => null,
                'pedi_comissao' => null,
                'pedi_usua_codigo' => 1,
                'pedi_empr_codigo' => 1,
                'pedi_created' => 1560992250,
                'pedi_modified' => null,
                'pedi_deleted' => null
            ],
            [
                'pedi_pedi_codigo' => null,
                'pedi_tipo' => 'V',
                'pedi_baixado' => 1560992250,
                'pedi_clie_codigo' => 1,
                'pedi_forn_codigo' => null,
                'pedi_vend_codigo_estoque' => 1,
                'pedi_vend_codigo' => 1,
                'pedi_frete' => null,
                'pedi_desconto' => null,
                'pedi_comissao' => null,
                'pedi_usua_codigo' => 1,
                'pedi_empr_codigo' => 1,
                'pedi_created' => 1560992250,
                'pedi_modified' => null,
                'pedi_deleted' => null
            ],
        ];
        parent::init();
    }
}
