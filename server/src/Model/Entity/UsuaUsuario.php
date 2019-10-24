<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * UsuaUsuario Entity
 *
 * @property int $usua_codigo
 * @property string $usua_nome
 * @property string $usua_senha
 * @property string $usua_email
 * @property int $usua_empr_codigo
 * @property \Cake\I18n\FrozenTime|null $usua_ativacao
 * @property int|null $usua_usua_codigo
 * @property \Cake\I18n\FrozenTime $usua_created
 * @property \Cake\I18n\FrozenTime|null $usua_modified
 * @property \Cake\I18n\FrozenTime|null $usua_deleted
 */
class UsuaUsuario extends Entity
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
        'usua_nome' => true,
        'usua_senha' => true,
        'usua_email' => true,
        'usua_empr_codigo' => true,
        'usua_ativacao' => true,
        'usua_usua_codigo' => true,
        'usua_created' => true,
        'usua_modified' => true,
        'usua_deleted' => true
    ];

    protected function _setUsuaSenha($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
