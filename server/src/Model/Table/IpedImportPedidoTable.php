<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IpedImportPedido Model
 *
 * @method \App\Model\Entity\IpedImportPedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\IpedImportPedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IpedImportPedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IpedImportPedido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IpedImportPedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IpedImportPedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IpedImportPedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IpedImportPedido findOrCreate($search, callable $callback = null, $options = [])
 */
class IpedImportPedidoTable extends AppTable
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

        $this->setTable('iped_import_pedido');
        $this->setDisplayField('iped_codigo');
        $this->setPrimaryKey('iped_codigo');
        $this->hasMany('IpitImportPedidoItem', ['dependent' => true])->setForeignKey('ipit_iped_codigo');
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
            ->integer('iped_codigo')
            ->allowEmptyString('iped_codigo', 'create');

        $validator
            ->integer('iped_ifil_codigo')
            // ->requirePresence('iped_ifil_codigo', 'create')
            ->allowEmptyString('iped_ifil_codigo', false);

        $validator
            ->integer('iped_pedi_codigo')
            ->allowEmptyString('iped_pedi_codigo');

        $validator
            ->scalar('iped_tipo')
            ->maxLength('iped_tipo', 1)
            ->requirePresence('iped_tipo', 'create')
            ->allowEmptyString('iped_tipo', false);

        $validator
            ->dateTime('iped_baixado')
            ->allowEmptyDateTime('iped_baixado');

        $validator
            ->scalar('iped_clie_cnpjcpf')
            ->maxLength('iped_clie_cnpjcpf', 14)
            ->allowEmptyString('iped_clie_cnpjcpf');

        $validator
            ->scalar('iped_clie_nome')
            ->maxLength('iped_clie_nome', 60)
            ->allowEmptyString('iped_clie_nome');

        $validator
            ->integer('iped_clie_codigo')
            ->allowEmptyString('iped_clie_codigo');

        $validator
            ->scalar('iped_forn_cnpjcpf')
            ->maxLength('iped_forn_cnpjcpf', 14)
            ->allowEmptyString('iped_forn_cnpjcpf');

        $validator
            ->scalar('iped_forn_nome')
            ->maxLength('iped_forn_nome', 60)
            ->allowEmptyString('iped_forn_nome');

        $validator
            ->integer('iped_forn_codigo')
            ->allowEmptyString('iped_forn_codigo');

        $validator
            ->scalar('iped_vend_cnpjcpf_estoque')
            ->maxLength('iped_vend_cnpjcpf_estoque', 14)
            ->requirePresence('iped_vend_cnpjcpf_estoque', 'create')
            ->allowEmptyString('iped_vend_cnpjcpf_estoque', false);

        $validator
            ->integer('iped_vend_codigo_estoque')
            ->allowEmptyString('iped_vend_codigo_estoque');

        $validator
            ->scalar('iped_vend_cnpjcpf')
            ->maxLength('iped_vend_cnpjcpf', 14)
            ->requirePresence('iped_vend_cnpjcpf', 'create')
            ->allowEmptyString('iped_vend_cnpjcpf', false);

        $validator
            ->integer('iped_vend_codigo')
            ->allowEmptyString('iped_vend_codigo');

        $validator
            ->integer('iped_empr_codigo')
            // ->requirePresence('iped_empr_codigo', 'create')
            ->allowEmptyString('iped_empr_codigo', false);

        $validator
            ->integer('iped_usua_codigo')
            // ->requirePresence('iped_usua_codigo', 'create')
            ->allowEmptyString('iped_usua_codigo', false);

        $validator
            ->dateTime('iped_imported')
            ->allowEmptyDateTime('iped_imported');

        $validator
            ->allowEmptyString('iped_message');

        $validator
            ->dateTime('iped_created')
            // ->requirePresence('iped_created', 'create')
            ->allowEmptyDateTime('iped_created', false);

        $validator
            ->dateTime('iped_modified')
            ->allowEmptyDateTime('iped_modified');

        $validator
            ->dateTime('iped_deleted')
            ->allowEmptyDateTime('iped_deleted');

        return $validator;
    }
}
