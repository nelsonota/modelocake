<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FornFornecedor Entity
 *
 * @property int $forn_codigo
 * @property string $forn_nome
 * @property string|null $forn_cnpjcpf
 * @property string|null $forn_insestrg
 * @property string|null $forn_insmun
 * @property string|null $forn_cep
 * @property string|null $forn_endereco
 * @property string|null $forn_numero
 * @property string|null $forn_complemento
 * @property string|null $forn_bairro
 * @property string|null $forn_cidade
 * @property string|null $forn_uf
 * @property string|null $forn_celular
 * @property string|null $forn_telefone
 * @property int $forn_usua_codigo
 * @property int $forn_empr_codigo
 * @property \Cake\I18n\FrozenTime $forn_created
 * @property \Cake\I18n\FrozenTime|null $forn_modified
 * @property \Cake\I18n\FrozenTime|null $forn_deleted
 */
class FornFornecedor extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'forn_nome' => true,
        'forn_cnpjcpf' => true,
        'forn_insestrg' => true,
        'forn_insmun' => true,
        'forn_cep' => true,
        'forn_endereco' => true,
        'forn_numero' => true,
        'forn_complemento' => true,
        'forn_bairro' => true,
        'forn_cidade' => true,
        'forn_uf' => true,
        'forn_celular' => true,
        'forn_telefone' => true,
        'forn_usua_codigo' => true,
        'forn_empr_codigo' => true,
        'forn_created' => true,
        'forn_modified' => true,
        'forn_deleted' => true
    ];
}
