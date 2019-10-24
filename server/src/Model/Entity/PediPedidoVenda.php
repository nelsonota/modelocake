<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PediPedido Entity
 *
 * @property int $pedi_codigo
 * @property int|null $pedi_pedi_codigo
 * @property string $pedi_tipo
 * @property \Cake\I18n\FrozenTime|null $pedi_baixado
 * @property int $pedi_clie_codigo
 * @property int $pedi_vend_codigo_estoque
 * @property int $pedi_vend_codigo
 * @property int $pedi_usua_codigo
 * @property int $pedi_empr_codigo
 * @property \Cake\I18n\FrozenTime $pedi_created
 * @property \Cake\I18n\FrozenTime|null $pedi_modified
 * @property \Cake\I18n\FrozenTime|null $pedi_deleted
 */
class PediPedidoVenda extends Entity
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
        'pedi_pedi_codigo' => true,
        'pedi_tipo' => true,
        'pedi_baixado' => true,
        'pedi_clie_codigo' => true,
        'pedi_forn_codigo' => true,
        'pedi_vend_codigo_estoque' => true,
        'pedi_vend_codigo' => true,
        'pedi_frete' => true,
        'pedi_desconto' => true,
        'pedi_comissao' => true,
        'pedi_usua_codigo' => true,
        'pedi_empr_codigo' => true,
        'pedi_created' => true,
        'pedi_modified' => true,
        'pedi_deleted' => true,
        'pite_pedido_item' => true
    ];
}
