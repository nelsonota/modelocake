<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdProduto Entity
 *
 * @property int $prod_codigo
 * @property int|null $prod_forn_codigo
 * @property string $prod_codigo_interno
 * @property string|null $prod_codigo_externo
 * @property string $prod_descricao
 * @property float $prod_valor
 * @property float $prod_valor_custo
 * @property string|null $prod_unidade
 * @property string|null $prod_tamanho
 * @property string|null $prod_cor
 * @property int|null $prod_status
 * @property int $prod_empr_codigo
 * @property int $prod_usua_codigo
 * @property \Cake\I18n\FrozenTime $prod_created
 * @property \Cake\I18n\FrozenTime|null $prod_modified
 * @property \Cake\I18n\FrozenTime|null $prod_deleted
 */
class ProdProduto extends Entity
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
        'prod_forn_codigo' => true,
        'prod_codigo_interno' => true,
        'prod_codigo_externo' => true,
        'prod_descricao' => true,
        'prod_valor' => true,
        'prod_valor_custo' => true,
        'prod_unidade' => true,
        'prod_tamanho' => true,
        'prod_cor' => true,
        'prod_status' => true,
        'prod_empr_codigo' => true,
        'prod_usua_codigo' => true,
        'prod_created' => true,
        'prod_modified' => true,
        'prod_deleted' => true
    ];
}
