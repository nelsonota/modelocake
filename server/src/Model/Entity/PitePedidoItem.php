<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PitePedidoItem Entity
 *
 * @property int $pite_codigo
 * @property int $pite_pedi_codigo
 * @property int $pite_prod_codigo
 * @property float $pite_quantidade
 * @property float $pite_valor_custo
 * @property float $pite_valor
 * @property float $pite_valor_realizado
 * @property int $pite_usua_codigo
 * @property int $pite_empr_codigo
 * @property \Cake\I18n\FrozenTime $pite_created
 * @property \Cake\I18n\FrozenTime|null $pite_modified
 * @property \Cake\I18n\FrozenTime|null $pite_deleted
 */
class PitePedidoItem extends Entity
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
        'pite_pedi_codigo' => true,
        'pite_prod_codigo' => true,
        'pite_quantidade' => true,
        'pite_valor_custo' => true,
        'pite_valor' => true,
        'pite_valor_realizado' => true,
        'pite_usua_codigo' => true,
        'pite_empr_codigo' => true,
        'pite_created' => true,
        'pite_modified' => true,
        'pite_deleted' => true
    ];
}
