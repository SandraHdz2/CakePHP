<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salaries Model
 *
 * @method \App\Model\Entity\Salary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Salary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salary|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salary saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salary findOrCreate($search, callable $callback = null, $options = [])
 */
class SalariesTable extends Table
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

        $this->setTable('salaries');
        $this->setDisplayField('emp_no');
        $this->setPrimaryKey(['emp_no', 'from_date']);
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
            ->integer('emp_no')
            ->requirePresence('emp_no')
            ->notEmpty('emp_no');

        $validator
            ->integer('salary')
            ->requirePresence('salary')
            ->notEmpty('salary');

        $validator
            ->date('from_date')
            ->requirePresence('from_date')
            ->notEmptyDate('from_date');

        $validator
            ->date('to_date')
            ->requirePresence('to_date')
            ->allowEmptyDate('to_date');

        return $validator;
    }
    public function buildRules(RulesChecker $rules){
        $rules->add(
            $rules->existsIn(
                ['emp_no'],
                'Employees',
                'Llave foranea no encontrada'
            )
        );
        return $rules;
    }
}
