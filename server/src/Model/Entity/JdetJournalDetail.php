<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JdetJournalDetail Entity
 *
 * @property int $jdet_codigo
 * @property int $jdet_jour_codigo
 * @property string $jdet_property
 * @property string|null $jdet_prop_key
 * @property string $jdet_old_value
 * @property string $jdet_value
 */
class JdetJournalDetail extends Entity
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
        'jdet_jour_codigo' => true,
        'jdet_property' => true,
        'jdet_prop_key' => true,
        'jdet_old_value' => true,
        'jdet_value' => true
    ];
}
