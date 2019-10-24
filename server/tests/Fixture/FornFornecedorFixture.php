<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FornFornecedorFixture
 */
class FornFornecedorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'forn_fornecedor';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'forn_codigo' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'forn_nome' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_cnpjcpf' => ['type' => 'string', 'length' => 14, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_insestrg' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_insmun' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_cep' => ['type' => 'string', 'length' => 8, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_endereco' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_numero' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_complemento' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_bairro' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_cidade' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_uf' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_celular' => ['type' => 'string', 'length' => 11, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_telefone' => ['type' => 'string', 'length' => 11, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'forn_usua_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'forn_empr_codigo' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'forn_created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'forn_modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'forn_deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['forn_codigo'], 'length' => []],
            'forn_empr' => ['type' => 'foreign', 'columns' => ['forn_empr_codigo'], 'references' => ['empr_empresa', 'empr_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'forn_usua' => ['type' => 'foreign', 'columns' => ['forn_usua_codigo'], 'references' => ['usua_usuario', 'usua_codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'forn_nome' => 'Fornecedor 1',
                'forn_cnpjcpf' => '37840722000164',
                'forn_insestrg' => '940486180702',
                'forn_insmun' => 'Lorem ipsum d',
                'forn_cep' => 'Lorem ',
                'forn_endereco' => 'Lorem ipsum dolor sit amet',
                'forn_numero' => 'Lorem ip',
                'forn_complemento' => 'Lorem ipsum d',
                'forn_bairro' => 'Lorem ipsum dolor sit amet',
                'forn_cidade' => 'Lorem ipsum dolor sit amet',
                'forn_uf' => 'Lo',
                'forn_celular' => 'Lorem ips',
                'forn_telefone' => 'Lorem ips',
                'forn_usua_codigo' => 1,
                'forn_empr_codigo' => 1,
                'forn_created' => 1560026815,
                'forn_modified' => null,
                'forn_deleted' => null
            ],
            [
                'forn_nome' => 'Fornecedor 2',
                'forn_cnpjcpf' => '68038428000167',
                'forn_insestrg' => '874440039280',
                'forn_insmun' => 'Lorem ipsum d',
                'forn_cep' => 'Lorem ',
                'forn_endereco' => 'Lorem ipsum dolor sit amet',
                'forn_numero' => 'Lorem ip',
                'forn_complemento' => 'Lorem ipsum d',
                'forn_bairro' => 'Lorem ipsum dolor sit amet',
                'forn_cidade' => 'Lorem ipsum dolor sit amet',
                'forn_uf' => 'Lo',
                'forn_celular' => 'Lorem ips',
                'forn_telefone' => 'Lorem ips',
                'forn_usua_codigo' => 1,
                'forn_empr_codigo' => 1,
                'forn_created' => 1560026815,
                'forn_modified' => null,
                'forn_deleted' => null
            ],
        ];
        parent::init();
    }
}
