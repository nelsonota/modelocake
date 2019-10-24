<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PediPedido Model
 *
 * @method \App\Model\Entity\PediPedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\PediPedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PediPedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PediPedido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PediPedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PediPedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PediPedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PediPedido findOrCreate($search, callable $callback = null, $options = [])
 */
class PediPedidoVendaTable extends AppTable
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

        $this->setTable('pedi_pedido');
        $this->setDisplayField('pedi_codigo');
        $this->setPrimaryKey('pedi_codigo');
        $this->hasMany('PitePedidoItem', ['saveStrategy' => 'replace', 'dependent' => true])->setForeignKey('pite_pedi_codigo');
        $this->belongsTo('ClieCliente')->setForeignKey('pedi_clie_codigo');
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
            ->integer('pedi_codigo')
            ->allowEmptyString('pedi_codigo', 'create');

        $validator
            ->integer('pedi_pedi_codigo')
            ->allowEmptyString('pedi_pedi_codigo');

        $validator
            ->scalar('pedi_tipo')
            ->maxLength('pedi_tipo', 1)
            ->requirePresence('pedi_tipo', 'create')
            ->allowEmptyString('pedi_tipo', false);

        $validator
            ->dateTime('pedi_baixado')
            ->allowEmptyDateTime('pedi_baixado');

        $validator
            ->integer('pedi_clie_codigo')
            ->requirePresence('pedi_clie_codigo', 'create')
            ->allowEmptyString('pedi_clie_codigo', false);

        $validator
            ->integer('pedi_forn_codigo')
            // ->requirePresence('pedi_forn_codigo', 'create')
            ->allowEmptyString('pedi_clie_codigo', true);

        $validator
            ->integer('pedi_vend_codigo_estoque')
            ->requirePresence('pedi_vend_codigo_estoque', 'create')
            ->allowEmptyString('pedi_vend_codigo_estoque', false);

        $validator
            ->integer('pedi_vend_codigo')
            ->requirePresence('pedi_vend_codigo', 'create')
            ->allowEmptyString('pedi_vend_codigo', false);

        $validator
            ->decimal('pedi_frete')
            ->allowEmptyString('pedi_frete');

        $validator
            ->decimal('pedi_desconto')
            ->allowEmptyString('pedi_desconto');

        $validator
            ->decimal('pedi_comissao')
            ->allowEmptyString('pedi_comissao');

        $validator
            ->integer('pedi_usua_codigo')
            // ->requirePresence('pedi_usua_codigo', 'create')
            ->allowEmptyString('pedi_usua_codigo', false);

        $validator
            ->integer('pedi_empr_codigo')
            // ->requirePresence('pedi_empr_codigo', 'create')
            ->allowEmptyString('pedi_empr_codigo', false);

        $validator
            ->dateTime('pedi_created')
            // ->requirePresence('pedi_created', 'create')
            ->allowEmptyDateTime('pedi_created', false);

        $validator
            ->dateTime('pedi_modified')
            ->allowEmptyDateTime('pedi_modified');

        $validator
            ->dateTime('pedi_deleted')
            ->allowEmptyDateTime('pedi_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->validCount('pite_pedido_item', 0, '>', 'Deve ser informado pelo menos 1 produto'));
        return $rules;
    }
}
