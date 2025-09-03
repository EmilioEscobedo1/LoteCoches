<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Preferencias Model
 *
 * @method \App\Model\Entity\Preferencia newEmptyEntity()
 * @method \App\Model\Entity\Preferencia newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Preferencia> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Preferencia get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Preferencia findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Preferencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Preferencia> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Preferencia|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Preferencia saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Preferencia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Preferencia>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Preferencia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Preferencia> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Preferencia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Preferencia>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Preferencia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Preferencia> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PreferenciasTable extends Table
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

        $this->setTable('preferencias');
        $this->setDisplayField('id');
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
            ->integer('id_categoria')
            ->allowEmptyString('id_categoria');

        return $validator;
    }
}
