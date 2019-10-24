<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Datasource\EntityInterface;
use SoftDelete\Model\Table\SoftDeleteTrait;

class AppTable extends Table
{
    use SoftDeleteTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Secure');
        $this->addBehavior('Journal');
        $this->softDeleteField = substr($this->getTable(), 0, 4).'_deleted';
    }
}
