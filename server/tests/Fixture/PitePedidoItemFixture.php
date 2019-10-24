<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PitePedidoItemFixture
 */
class PitePedidoItemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pite_pedido_item';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'pite_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pite_pedi_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pite_prod_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pite_quantidade' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pite_valor_custo' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pite_valor' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pite_valor_realizado' => ['type' => 'decimal', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'pite_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pite_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pite_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'pite_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'pite_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['pite_codigo'], 'length' => []],
            'pite_empr' => ['type' => 'foreign', 'columns' => ['pite_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pite_prod' => ['type' => 'foreign', 'columns' => ['pite_prod_codigo'], 'references' => ['prod_produto', 'prod_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pite_usua' => ['type' => 'foreign', 'columns' => ['pite_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                // 'pite_codigo' => 1,
                'pite_pedi_codigo' => 1,
                'pite_prod_codigo' => 1,
                'pite_quantidade' => 2,
                'pite_valor_custo' => 1.5,
                'pite_valor' => 1.5,
                'pite_valor_realizado' => 1.5,
                'pite_usua_codigo' => 1,
                'pite_empr_codigo' => 1,
                'pite_created' => 1560020871,
                'pite_modified' => 1560020871,
                'pite_deleted' => null
            ],
            [
                // 'pite_codigo' => 1,
                'pite_pedi_codigo' => 1,
                'pite_prod_codigo' => 2,
                'pite_quantidade' => 10,
                'pite_valor_custo' => 2.5,
                'pite_valor' => 2.5,
                'pite_valor_realizado' => 2.5,
                'pite_usua_codigo' => 1,
                'pite_empr_codigo' => 1,
                'pite_created' => 1560020871,
                'pite_modified' => 1560020871,
                'pite_deleted' => null
            ],
            [
                // 'pite_codigo' => 1,
                'pite_pedi_codigo' => 4,
                'pite_prod_codigo' => 1,
                'pite_quantidade' => 1,
                'pite_valor_custo' => 1.5,
                'pite_valor' => 1.5,
                'pite_valor_realizado' => 1.5,
                'pite_usua_codigo' => 1,
                'pite_empr_codigo' => 1,
                'pite_created' => 1560020871,
                'pite_modified' => 1560020871,
                'pite_deleted' => null
            ],
            [
                // 'pite_codigo' => 1,
                'pite_pedi_codigo' => 4,
                'pite_prod_codigo' => 2,
                'pite_quantidade' => 2,
                'pite_valor_custo' => 2.5,
                'pite_valor' => 2.5,
                'pite_valor_realizado' => 2.5,
                'pite_usua_codigo' => 1,
                'pite_empr_codigo' => 1,
                'pite_created' => 1560020871,
                'pite_modified' => 1560020871,
                'pite_deleted' => null
            ],
        ];
        parent::init();
    }
}
