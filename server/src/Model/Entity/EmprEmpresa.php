<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmprEmpresa Entity
 *
 * @property int $empr_codigo
 * @property string $empr_documento
 * @property string $empr_razao_social
 * @property \Cake\I18n\FrozenTime|null $empr_ativacao
 * @property \Cake\I18n\FrozenTime $empr_created
 * @property \Cake\I18n\FrozenTime|null $empr_modified
 * @property \Cake\I18n\FrozenTime|null $empr_deleted
 */
class EmprEmpresa extends Entity
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
        'empr_documento' => true,
        'empr_razao_social' => true,
        'empr_ativacao' => true,
        'empr_created' => true,
        'empr_modified' => true,
        'empr_deleted' => true
    ];
}
