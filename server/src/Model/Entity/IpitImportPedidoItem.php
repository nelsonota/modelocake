<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IpitImportPedidoItem Entity
 *
 * @property int $ipit_codigo
 * @property int $ipit_iped_codigo
 * @property int|null $ipit_pite_codigo
 * @property string $ipit_prod_codigo_interno
 * @property int|null $ipit_prod_codigo
 * @property float $ipit_quantidade
 * @property float $ipit_valor_realizado
 * @property int $ipit_empr_codigo
 * @property int $ipit_usua_codigo
 * @property \Cake\I18n\FrozenTime|null $ipit_imported
 * @property array|null $ipit_message
 * @property \Cake\I18n\FrozenTime $ipit_created
 * @property \Cake\I18n\FrozenTime|null $ipit_modified
 * @property \Cake\I18n\FrozenTime|null $ipit_deleted
 */
class IpitImportPedidoItem extends Entity
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
        'ipit_iped_codigo' => true,
        'ipit_pite_codigo' => true,
        'ipit_prod_codigo_interno' => true,
        'ipit_prod_codigo' => true,
        'ipit_quantidade' => true,
        'ipit_valor_realizado' => true,
        'ipit_empr_codigo' => true,
        'ipit_usua_codigo' => true,
        'ipit_imported' => true,
        'ipit_message' => true,
        'ipit_created' => true,
        'ipit_modified' => true,
        'ipit_deleted' => true
    ];
}
