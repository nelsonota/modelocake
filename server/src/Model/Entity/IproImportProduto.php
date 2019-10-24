<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IproImportProduto Entity
 *
 * @property int $ipro_codigo
 * @property int $ipro_ifil_codigo
 * @property int|null $ipro_prod_codigo
 * @property int|null $ipro_forn_codigo
 * @property string|null $ipro_forn_cnpjcpf
 * @property string|null $ipro_forn_nome
 * @property string $ipro_codigo_interno
 * @property string|null $ipro_codigo_externo
 * @property string $ipro_descricao
 * @property float $ipro_valor
 * @property float $ipro_valor_custo
 * @property string|null $ipro_unidade
 * @property string|null $ipro_tamanho
 * @property string|null $ipro_cor
 * @property int|null $ipro_status
 * @property int $ipro_empr_codigo
 * @property int $ipro_usua_codigo
 * @property \Cake\I18n\FrozenTime|null $ipro_imported
 * @property array|null $ipro_message
 * @property \Cake\I18n\FrozenTime $ipro_created
 * @property \Cake\I18n\FrozenTime|null $ipro_modified
 * @property \Cake\I18n\FrozenTime|null $ipro_deleted
 *
 * @property \App\Model\Entity\ProdProduto $prod_produto
 */
class IproImportProduto extends Entity
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
        'ipro_ifil_codigo' => true,
        'ipro_prod_codigo' => true,
        'ipro_forn_codigo' => true,
        'ipro_forn_cnpjcpf' => true,
        'ipro_forn_nome' => true,
        'ipro_codigo_interno' => true,
        'ipro_codigo_externo' => true,
        'ipro_descricao' => true,
        'ipro_valor' => true,
        'ipro_valor_custo' => true,
        'ipro_unidade' => true,
        'ipro_tamanho' => true,
        'ipro_cor' => true,
        'ipro_status' => true,
        'ipro_empr_codigo' => true,
        'ipro_usua_codigo' => true,
        'ipro_imported' => true,
        'ipro_message' => true,
        'ipro_created' => true,
        'ipro_modified' => true,
        'ipro_deleted' => true,
        'prod_produto' => true
    ];
}
