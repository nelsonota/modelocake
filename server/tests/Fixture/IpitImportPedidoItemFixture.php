<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IpitImportPedidoItemFixture
 */
class IpitImportPedidoItemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ipit_import_pedido_item';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ipit_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ipit_iped_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipit_pite_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipit_prod_codigo_interno' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ipit_prod_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipit_quantidade' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'ipit_valor_realizado' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'ipit_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipit_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ipit_imported' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipit_message' => ['type' => 'json', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipit_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'ipit_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ipit_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ipit_codigo'], 'length' => []],
            'ipit_empr' => ['type' => 'foreign', 'columns' => ['ipit_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipit_iped' => ['type' => 'foreign', 'columns' => ['ipit_iped_codigo'], 'references' => ['iped_import_pedido', 'iped_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipit_prod' => ['type' => 'foreign', 'columns' => ['ipit_prod_codigo'], 'references' => ['prod_produto', 'prod_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ipit_usua' => ['type' => 'foreign', 'columns' => ['ipit_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                // 'ipit_codigo' => 1,
                'ipit_iped_codigo' => 1,
                'ipit_pite_codigo' => null,
                'ipit_prod_codigo_interno' => 'i002',
                'ipit_prod_codigo' => null,
                'ipit_quantidade' => 1,
                'ipit_valor_realizado' => 1.5,
                'ipit_empr_codigo' => 1,
                'ipit_usua_codigo' => 1,
                'ipit_imported' => null,
                'ipit_message' => '',
                'ipit_created' => 1562703369,
                'ipit_modified' => null,
                'ipit_deleted' => null
            ],
        ];
        parent::init();
    }
}
