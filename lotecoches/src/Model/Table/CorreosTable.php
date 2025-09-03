<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Correos Model
 *
 * @method \App\Model\Entity\Correo newEmptyEntity()
 * @method \App\Model\Entity\Correo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Correo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Correo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Correo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Correo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Correo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Correo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Correo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Correo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Correo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Correo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Correo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Correo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Correo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Correo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Correo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CorreosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('correos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('correo')
            ->maxLength('correo', 100)
            ->allowEmptyString('correo');

        return $validator;
    }
}
