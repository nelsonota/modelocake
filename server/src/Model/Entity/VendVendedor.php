<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendVendedor Entity
 *
 * @property int $vend_codigo
 * @property string $vend_nome
 * @property string|null $vend_cnpjcpf
 * @property string|null $vend_insestrg
 * @property string|null $vend_insmun
 * @property string|null $vend_cep
 * @property string|null $vend_endereco
 * @property string|null $vend_numero
 * @property string|null $vend_complemento
 * @property string|null $vend_bairro
 * @property string|null $vend_cidade
 * @property string|null $vend_uf
 * @property string|null $vend_celular
 * @property string|null $vend_telefone
 * @property int $vend_usua_codigo
 * @property int $vend_empr_codigo
 * @property \Cake\I18n\FrozenTime $vend_created
 * @property \Cake\I18n\FrozenTime|null $vend_modified
 * @property \Cake\I18n\FrozenTime|null $vend_deleted
 */
class VendVendedor extends Entity
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
        'vend_nome' => true,
        'vend_cnpjcpf' => true,
        'vend_insestrg' => true,
        'vend_insmun' => true,
        'vend_cep' => true,
        'vend_endereco' => true,
        'vend_numero' => true,
        'vend_complemento' => true,
        'vend_bairro' => true,
        'vend_cidade' => true,
        'vend_uf' => true,
        'vend_celular' => true,
        'vend_telefone' => true,
        'vend_usua_codigo' => true,
        'vend_empr_codigo' => true,
        'vend_created' => true,
        'vend_modified' => true,
        'vend_deleted' => true
    ];
}
