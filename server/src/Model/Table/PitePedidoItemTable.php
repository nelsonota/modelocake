<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PitePedidoItem Model
 *
 * @method \App\Model\Entity\PitePedidoItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PitePedidoItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PitePedidoItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PitePedidoItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PitePedidoItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PitePedidoItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PitePedidoItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PitePedidoItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PitePedidoItemTable extends AppTable
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

        $this->setTable('pite_pedido_item');
        $this->setDisplayField('pite_codigo');
        $this->setPrimaryKey('pite_codigo');
        $this->belongsTo('ProdProduto')->setForeignKey('pite_prod_codigo');
        $this->belongsTo('PediPedido')->setForeignKey('pite_pedi_codigo');
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
            ->integer('pite_codigo')
            ->allowEmptyString('pite_codigo', 'create');

        $validator
            ->integer('pite_pedi_codigo')
            // ->requirePresence('pite_pedi_codigo', 'create')
            ->allowEmptyString('pite_pedi_codigo', false);

        $validator
            ->integer('pite_prod_codigo')
            ->requirePresence('pite_prod_codigo', 'create')
            ->allowEmptyString('pite_prod_codigo', false);

        $validator
            ->decimal('pite_quantidade')
            ->requirePresence('pite_quantidade', 'create')
            ->allowEmptyString('pite_quantidade', false)
            ->add('pite_quantidade', 'comparison', [
                'rule' => ['comparison','>',0],
                'message' => 'A quantidade deve ser maior que zero.'
            ]);

        $validator
            ->decimal('pite_valor_custo')
            ->requirePresence('pite_valor_custo', 'create')
            ->allowEmptyString('pite_valor_custo', false);

        $validator
            ->decimal('pite_valor')
            ->requirePresence('pite_valor', 'create')
            ->allowEmptyString('pite_valor', false);

        $validator
            ->decimal('pite_valor_realizado')
            ->requirePresence('pite_valor_realizado', 'create')
            ->allowEmptyString('pite_valor_realizado', false);

        $validator
            ->integer('pite_usua_codigo')
            // ->requirePresence('pite_usua_codigo', 'create')
            ->allowEmptyString('pite_usua_codigo', false);

        $validator
            ->integer('pite_empr_codigo')
            // ->requirePresence('pite_empr_codigo', 'create')
            ->allowEmptyString('pite_empr_codigo', false);

        $validator
            ->dateTime('pite_created')
            // ->requirePresence('pite_created', 'create')
            ->allowEmptyDateTime('pite_created', false);

        $validator
            ->dateTime('pite_modified')
            ->allowEmptyDateTime('pite_modified');

        $validator
            ->dateTime('pite_deleted')
            ->allowEmptyDateTime('pite_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->addCreate(function ($entity, $options) {
            $pedido = $this->PediPedido->find()->select(['pedi_vend_codigo_estoque', 'pedi_tipo'])->where(['pedi_codigo' => $entity->pite_pedi_codigo])->first();
            if (in_array($pedido->pedi_tipo,['V', 'S'])) {
                $produto = $this->find()->select(["saldo" => "SUM(pite_quantidade * (CASE WHEN pedi_tipo IN ('V','S') THEN -1 ELSE 1 END))"])
                ->contain(['PediPedido'])
                ->where([
                    'pedi_vend_codigo_estoque' => $pedido->pedi_vend_codigo_estoque,
                    'pite_prod_codigo' => $entity->pite_prod_codigo
                ])
                ->first();
                return ($produto->saldo - $entity->pite_quantidade) >= 0;
            }
            return true;
        }, 'saldo', [
            'errorField' => 'pite_quantidade',
            'message' => 'Sem estoque disponível'
        ]);

        $rules->addUpdate(function ($entity, $options) {
            $pedido = $this->PediPedido->find()->select(['pedi_vend_codigo_estoque', 'pedi_tipo'])->where(['pedi_codigo' => $entity->pite_pedi_codigo])->first();
            if (in_array($pedido->pedi_tipo,['V', 'S'])) {
                $produto = $this->find()->select(["saldo" => "SUM(pite_quantidade * (CASE WHEN pedi_tipo IN ('V','S') THEN -1 ELSE 1 END))"])
                ->contain(['PediPedido'])
                ->where([
                    'pedi_vend_codigo_estoque' => $pedido->pedi_vend_codigo_estoque,
                    'pite_prod_codigo' => $entity->pite_prod_codigo
                ])
                ->first();
                return ($produto->saldo + $entity->getOriginal('pite_quantidade') - $entity->pite_quantidade) >= 0;
            }
            return true;
        }, 'saldo', [
            'errorField' => 'pite_quantidade',
            'message' => 'Sem estoque disponível'
        ]);
        return $rules;
    }
}
