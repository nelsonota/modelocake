<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IfilImportFileFixture
 */
class IfilImportFileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ifil_import_file';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ifil_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ifil_nome_arquivo' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ifil_model' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ifil_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ifil_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ifil_imported' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ifil_status' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'ifil_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'ifil_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ifil_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ifil_codigo'], 'length' => []],
            'ifil_empr' => ['type' => 'foreign', 'columns' => ['ifil_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ifil_usua' => ['type' => 'foreign', 'columns' => ['ifil_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'ifil_nome_arquivo' => 'teste1.csv',
                'ifil_model' => 'ProdProduto',
                'ifil_empr_codigo' => 1,
                'ifil_usua_codigo' => 1,
                'ifil_imported' => null,
                'ifil_status' => null,
                'ifil_created' => 1562113417,
                'ifil_modified' => null,
                'ifil_deleted' => null
            ],
            [
                'ifil_nome_arquivo' => 'teste2.csv',
                'ifil_model' => 'PediPedido',
                'ifil_empr_codigo' => 1,
                'ifil_usua_codigo' => 1,
                'ifil_imported' => null,
                'ifil_status' => null,
                'ifil_created' => 1562113417,
                'ifil_modified' => null,
                'ifil_deleted' => null
            ],
        ];
        parent::init();
    }
}
