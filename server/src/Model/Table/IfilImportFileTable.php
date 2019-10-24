<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IfilImportFile Model
 *
 * @method \App\Model\Entity\IfilImportFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\IfilImportFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IfilImportFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IfilImportFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IfilImportFile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IfilImportFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IfilImportFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IfilImportFile findOrCreate($search, callable $callback = null, $options = [])
 */
class IfilImportFileTable extends AppTable
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

        $this->setTable('ifil_import_file');
        $this->setDisplayField('ifil_codigo');
        $this->setPrimaryKey('ifil_codigo');
        $this->hasMany('IproImportProduto', ['dependent' => true])->setForeignKey('ipro_ifil_codigo');
        $this->hasOne('IpedImportPedido', ['dependent' => true])->setForeignKey('iped_ifil_codigo');
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
            ->integer('ifil_codigo')
            ->allowEmptyString('ifil_codigo', 'create');

        $validator
            ->scalar('ifil_nome_arquivo')
            ->maxLength('ifil_nome_arquivo', 100)
            ->requirePresence('ifil_nome_arquivo', 'create')
            ->allowEmptyString('ifil_nome_arquivo', false);

        $validator
            ->scalar('ifil_model')
            ->maxLength('ifil_model', 100)
            ->requirePresence('ifil_model', 'create')
            ->allowEmptyString('ifil_model', false);

        $validator
            ->integer('ifil_empr_codigo')
            // ->requirePresence('ifil_empr_codigo', 'create')
            ->allowEmptyString('ifil_empr_codigo', false);

        $validator
            ->integer('ifil_usua_codigo')
            // ->requirePresence('ifil_usua_codigo', 'create')
            ->allowEmptyString('ifil_usua_codigo', false);

        $validator
            ->dateTime('ifil_imported')
            ->allowEmptyDateTime('ifil_imported');

        $validator
            ->scalar('ifil_status')
            ->maxLength('ifil_status', 1)
            ->allowEmptyString('ifil_status');

        $validator
            ->dateTime('ifil_created')
            // ->requirePresence('ifil_created', 'create')
            ->allowEmptyDateTime('ifil_created', false);

        $validator
            ->dateTime('ifil_modified')
            ->allowEmptyDateTime('ifil_modified');

        $validator
            ->dateTime('ifil_deleted')
            ->allowEmptyDateTime('ifil_deleted');

        return $validator;
    }
}
