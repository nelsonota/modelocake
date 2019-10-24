<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdProduto Model
 *
 * @method \App\Model\Entity\ProdProduto get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdProduto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdProduto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdProduto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdProduto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdProduto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdProduto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdProduto findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdProdutoTable extends AppTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prod_produto');
        $this->setDisplayField('prod_codigo');
        $this->setPrimaryKey('prod_codigo');
        $this->belongsTo('FornFornecedor')->setForeignKey('prod_forn_codigo');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('prod_codigo')
            ->allowEmptyString('prod_codigo', 'create');

        $validator
            ->integer('prod_forn_codigo')
            ->allowEmptyString('prod_forn_codigo');

        $validator
            ->scalar('prod_codigo_interno')
            ->maxLength('prod_codigo_interno', 20)
            ->requirePresence('prod_codigo_interno', 'create')
            ->allowEmptyString('prod_codigo_interno', false);

        $validator
            ->scalar('prod_codigo_externo')
            ->maxLength('prod_codigo_externo', 20)
            ->allowEmptyString('prod_codigo_externo');

        $validator
            ->scalar('prod_descricao')
            ->maxLength('prod_descricao', 60)
            ->requirePresence('prod_descricao', 'create')
            ->allowEmptyString('prod_descricao', false);

        $validator
            ->decimal('prod_valor')
            ->requirePresence('prod_valor', 'create')
            ->allowEmptyString('prod_valor', false);

        $validator
            ->decimal('prod_valor_custo')
            ->requirePresence('prod_valor_custo', 'create')
            ->allowEmptyString('prod_valor_custo', false);

        $validator
            ->scalar('prod_unidade')
            ->maxLength('prod_unidade', 2)
            ->allowEmptyString('prod_unidade');

        $validator
            ->scalar('prod_tamanho')
            ->maxLength('prod_tamanho', 5)
            ->allowEmptyString('prod_tamanho');

        $validator
            ->scalar('prod_cor')
            ->maxLength('prod_cor', 20)
            ->allowEmptyString('prod_cor');

        $validator
            ->allowEmptyString('prod_status');

        $validator
            ->integer('prod_empr_codigo')
            // ->requirePresence('prod_empr_codigo', 'create')
            ->allowEmptyString('prod_empr_codigo', false);

        $validator
            ->integer('prod_usua_codigo')
            // ->requirePresence('prod_usua_codigo', 'create')
            ->allowEmptyString('prod_usua_codigo', false);

        $validator
            ->dateTime('prod_created')
            // ->requirePresence('prod_created', 'create')
            ->allowEmptyDateTime('prod_created', false);

        $validator
            ->dateTime('prod_modified')
            ->allowEmptyDateTime('prod_modified');

        $validator
            ->dateTime('prod_deleted')
            ->allowEmptyDateTime('prod_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['prod_codigo_interno']));

        return $rules;
    }
}
