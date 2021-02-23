<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Titles Model
 *
 * @method \App\Model\Entity\Title get($primaryKey, $options = [])
 * @method \App\Model\Entity\Title newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Title[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Title|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Title saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Title patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Title[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Title findOrCreate($search, callable $callback = null, $options = [])
 */
class TitlesTable extends Table
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
        $this->belongsTo('Employees')//Agregar la relacion entre las tablas
        ->setForeignKey('emp_no');
        $this->setTable('titles');
        $this->setDisplayField('title');
        $this->setPrimaryKey(['emp_no', 'title', 'from_date']);
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
            ->scalar('title')
            ->maxLength('title', 50)
            ->requirePresence('title')
            ->notEmpty('title');

        $validator
            ->date('from_date')
            ->requirePresence('from_date')
            ->notEmptyDate('from_date');

        $validator
            ->date('to_date')
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
