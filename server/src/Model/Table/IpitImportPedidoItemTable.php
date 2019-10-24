<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IpitImportPedidoItem Model
 *
 * @method \App\Model\Entity\IpitImportPedidoItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IpitImportPedidoItem findOrCreate($search, callable $callback = null, $options = [])
 */
class IpitImportPedidoItemTable extends AppTable
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

        $this->setTable('ipit_import_pedido_item');
        $this->setDisplayField('ipit_codigo');
        $this->setPrimaryKey('ipit_codigo');
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
            ->integer('ipit_codigo')
            ->allowEmptyString('ipit_codigo', 'create');

        $validator
            ->integer('ipit_iped_codigo')
            // ->requirePresence('ipit_iped_codigo', 'create')
            ->allowEmptyString('ipit_iped_codigo', false);

        $validator
            ->integer('ipit_pite_codigo')
            ->allowEmptyString('ipit_pite_codigo');

        $validator
            ->scalar('ipit_prod_codigo_interno')
            ->maxLength('ipit_prod_codigo_interno', 20)
            ->requirePresence('ipit_prod_codigo_interno', 'create')
            ->allowEmptyString('ipit_prod_codigo_interno', false);

        $validator
            ->integer('ipit_prod_codigo')
            ->allowEmptyString('ipit_prod_codigo');

        $validator
            ->decimal('ipit_quantidade')
            ->requirePresence('ipit_quantidade', 'create')
            ->allowEmptyString('ipit_quantidade', false);

        $validator
            ->decimal('ipit_valor_realizado')
            ->requirePresence('ipit_valor_realizado', 'create')
            ->allowEmptyString('ipit_valor_realizado', false);

        $validator
            ->integer('ipit_empr_codigo')
            // ->requirePresence('ipit_empr_codigo', 'create')
            ->allowEmptyString('ipit_empr_codigo', false);

        $validator
            ->integer('ipit_usua_codigo')
            // ->requirePresence('ipit_usua_codigo', 'create')
            ->allowEmptyString('ipit_usua_codigo', false);

        $validator
            ->dateTime('ipit_imported')
            ->allowEmptyDateTime('ipit_imported');

        $validator
            ->allowEmptyString('ipit_message');

        $validator
            ->dateTime('ipit_created')
            // ->requirePresence('ipit_created', 'create')
            ->allowEmptyDateTime('ipit_created', false);

        $validator
            ->dateTime('ipit_modified')
            ->allowEmptyDateTime('ipit_modified');

        $validator
            ->dateTime('ipit_deleted')
            ->allowEmptyDateTime('ipit_deleted');

        return $validator;
    }
}
