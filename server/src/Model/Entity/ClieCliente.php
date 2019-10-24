<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClieCliente Entity
 *
 * @property int $clie_codigo
 * @property string $clie_nome
 * @property string|null $clie_cnpjcpf
 * @property string|null $clie_insestrg
 * @property string|null $clie_insmun
 * @property string|null $clie_cep
 * @property string|null $clie_endereco
 * @property string|null $clie_numero
 * @property string|null $clie_complemento
 * @property string|null $clie_bairro
 * @property string|null $clie_cidade
 * @property string|null $clie_uf
 * @property string|null $clie_celular
 * @property string|null $clie_telefone
 * @property int $clie_usua_codigo
 * @property int $clie_empr_codigo
 * @property \Cake\I18n\FrozenTime $clie_created
 * @property \Cake\I18n\FrozenTime|null $clie_modified
 * @property \Cake\I18n\FrozenTime|null $clie_deleted
 */
class ClieCliente extends Entity
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
        'clie_nome' => true,
        'clie_cnpjcpf' => true,
        'clie_insestrg' => true,
        'clie_insmun' => true,
        'clie_cep' => true,
        'clie_endereco' => true,
        'clie_numero' => true,
        'clie_complemento' => true,
        'clie_bairro' => true,
        'clie_cidade' => true,
        'clie_uf' => true,
        'clie_celular' => true,
        'clie_telefone' => true,
        'clie_usua_codigo' => true,
        'clie_empr_codigo' => true,
        'clie_created' => true,
        'clie_modified' => true,
        'clie_deleted' => true
    ];
}
