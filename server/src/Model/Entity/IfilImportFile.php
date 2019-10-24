<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IfilImportFile Entity
 *
 * @property int $ifil_codigo
 * @property string $ifil_nome_arquivo
 * @property string $ifil_model
 * @property int $ifil_empr_codigo
 * @property int $ifil_usua_codigo
 * @property \Cake\I18n\FrozenTime|null $ifil_imported
 * @property string|null $ifil_status
 * @property \Cake\I18n\FrozenTime $ifil_created
 * @property \Cake\I18n\FrozenTime|null $ifil_modified
 * @property \Cake\I18n\FrozenTime|null $ifil_deleted
 */
class IfilImportFile extends Entity
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
        'ifil_nome_arquivo' => true,
        'ifil_model' => true,
        'ifil_empr_codigo' => true,
        'ifil_usua_codigo' => true,
        'ifil_imported' => true,
        'ifil_status' => true,
        'ifil_created' => true,
        'ifil_modified' => true,
        'ifil_deleted' => true,
        'ipro_import_produto' => true,
        'iped_import_pedido' => true,
    ];
}
