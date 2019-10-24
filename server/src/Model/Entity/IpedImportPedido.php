<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IpedImportPedido Entity
 *
 * @property int $iped_codigo
 * @property int $iped_ifil_codigo
 * @property int|null $iped_pedi_codigo
 * @property string $iped_tipo
 * @property \Cake\I18n\FrozenTime|null $iped_baixado
 * @property string|null $iped_clie_cnpjcpf
 * @property string|null $iped_clie_nome
 * @property int|null $iped_clie_codigo
 * @property string|null $iped_forn_cnpjcpf
 * @property string|null $iped_forn_nome
 * @property int|null $iped_forn_codigo
 * @property string $iped_vend_cnpjcpf_estoque
 * @property int|null $iped_vend_codigo_estoque
 * @property string $iped_vend_cnpjcpf
 * @property int|null $iped_vend_codigo
 * @property int $iped_empr_codigo
 * @property int $iped_usua_codigo
 * @property \Cake\I18n\FrozenTime|null $iped_imported
 * @property array|null $iped_message
 * @property \Cake\I18n\FrozenTime $iped_created
 * @property \Cake\I18n\FrozenTime|null $iped_modified
 * @property \Cake\I18n\FrozenTime|null $iped_deleted
 */
class IpedImportPedido extends Entity
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
        'iped_ifil_codigo' => true,
        'iped_pedi_codigo' => true,
        'iped_tipo' => true,
        'iped_baixado' => true,
        'iped_clie_cnpjcpf' => true,
        'iped_clie_nome' => true,
        'iped_clie_codigo' => true,
        'iped_forn_cnpjcpf' => true,
        'iped_forn_nome' => true,
        'iped_forn_codigo' => true,
        'iped_vend_cnpjcpf_estoque' => true,
        'iped_vend_codigo_estoque' => true,
        'iped_vend_cnpjcpf' => true,
        'iped_vend_codigo' => true,
        'iped_empr_codigo' => true,
        'iped_usua_codigo' => true,
        'iped_imported' => true,
        'iped_message' => true,
        'iped_created' => true,
        'iped_modified' => true,
        'iped_deleted' => true,
        'ipit_import_pedido_item' => true,
    ];
}
