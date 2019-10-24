<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IproImportProduto Model
 *
 * @method \App\Model\Entity\IproImportProduto get($primaryKey, $options = [])
 * @method \App\Model\Entity\IproImportProduto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IproImportProduto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IproImportProduto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IproImportProduto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IproImportProduto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IproImportProduto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IproImportProduto findOrCreate($search, callable $callback = null, $options = [])
 */
class IproImportProdutoTable extends AppTable
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

        $this->setTable('ipro_import_produto');
        $this->setDisplayField('ipro_codigo');
        $this->setPrimaryKey('ipro_codigo');
        $this->belongsTo('ProdProduto')->setForeignKey('ipro_prod_codigo');
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
            ->integer('ipro_codigo')
            ->allowEmptyString('ipro_codigo', 'create');

        $validator
            ->integer('ipro_ifil_codigo')
            // ->requirePresence('ipro_ifil_codigo', 'create')
            ->allowEmptyString('ipro_ifil_codigo', false);

        $validator
            ->integer('ipro_prod_codigo')
            ->allowEmptyString('ipro_prod_codigo');

        $validator
            ->integer('ipro_forn_codigo')
            ->allowEmptyString('ipro_forn_codigo');

        $validator
            ->scalar('ipro_forn_cnpjcpf')
            ->maxLength('ipro_forn_cnpjcpf', 14)
            ->allowEmptyString('ipro_forn_cnpjcpf');

        $validator
            ->scalar('ipro_forn_nome')
            ->maxLength('ipro_forn_nome', 60)
            ->allowEmptyString('ipro_forn_nome');

        $validator
            ->scalar('ipro_codigo_interno')
            ->maxLength('ipro_codigo_interno', 20)
            ->requirePresence('ipro_codigo_interno', 'create')
            ->allowEmptyString('ipro_codigo_interno', false);

        $validator
            ->scalar('ipro_codigo_externo')
            ->maxLength('ipro_codigo_externo', 20)
            ->allowEmptyString('ipro_codigo_externo');

        $validator
            ->scalar('ipro_descricao')
            ->maxLength('ipro_descricao', 60)
            ->requirePresence('ipro_descricao', 'create')
            ->allowEmptyString('ipro_descricao', false);

        $validator
            ->decimal('ipro_valor')
            ->requirePresence('ipro_valor', 'create')
            ->allowEmptyString('ipro_valor', false);

        $validator
            ->decimal('ipro_valor_custo')
            ->requirePresence('ipro_valor_custo', 'create')
            ->allowEmptyString('ipro_valor_custo', false);

        $validator
            ->scalar('ipro_unidade')
            ->maxLength('ipro_unidade', 2)
            ->allowEmptyString('ipro_unidade');

        $validator
            ->scalar('ipro_tamanho')
            ->maxLength('ipro_tamanho', 5)
            ->allowEmptyString('ipro_tamanho');

        $validator
            ->scalar('ipro_cor')
            ->maxLength('ipro_cor', 20)
            ->allowEmptyString('ipro_cor');

        $validator
            ->allowEmptyString('ipro_status');

        $validator
            ->integer('ipro_empr_codigo')
            // ->requirePresence('ipro_empr_codigo', 'create')
            ->allowEmptyString('ipro_empr_codigo', false);

        $validator
            ->integer('ipro_usua_codigo')
            // ->requirePresence('ipro_usua_codigo', 'create')
            ->allowEmptyString('ipro_usua_codigo', false);

        $validator
            ->dateTime('ipro_imported')
            ->allowEmptyDateTime('ipro_imported');

        $validator
            ->allowEmptyString('ipro_message');

        $validator
            ->dateTime('ipro_created')
            // ->requirePresence('ipro_created', 'create')
            ->allowEmptyDateTime('ipro_created', false);

        $validator
            ->dateTime('ipro_modified')
            ->allowEmptyDateTime('ipro_modified');

        $validator
            ->dateTime('ipro_deleted')
            ->allowEmptyDateTime('ipro_deleted');

        return $validator;
    }
}
