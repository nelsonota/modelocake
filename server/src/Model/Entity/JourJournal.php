<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JourJournal Entity
 *
 * @property int $jour_codigo
 * @property string $jour_model
 * @property int $jour_model_codigo
 * @property string|null $jour_json_data
 * @property \Cake\I18n\FrozenTime $jour_created
 * @property int|null $jour_usua_codigo
 */
class JourJournal extends Entity
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
        'jour_model' => true,
        'jour_model_codigo' => true,
        'jour_json_data' => true,
        'jour_created' => true,
        'jour_usua_codigo' => true
    ];
}
