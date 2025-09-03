<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculos Model
 *
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Vehiculo newEmptyEntity()
 * @method \App\Model\Entity\Vehiculo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehiculo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Vehiculo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Vehiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehiculo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Vehiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VehiculosTable extends Table
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

        $this->setTable('vehiculos');
        $this->setDisplayField('marca');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
        ]);
        $this->belongsTo('Sucursals', [
            'foreignKey' => 'sucursal_id',
            'className' => 'Sucursales',
        ]);
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
            ->scalar('marca')
            ->maxLength('marca', 100)
            ->requirePresence('marca', 'create')
            ->notEmptyString('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 100)
            ->allowEmptyString('modelo');

        $validator
            ->scalar('anio')
            ->maxLength('anio', 4)
            ->allowEmptyString('anio');

        $validator
            ->scalar('precio')
            ->maxLength('precio', 20)
            ->allowEmptyString('precio');

        $validator
            ->scalar('kilometraje')
            ->maxLength('kilometraje', 20)
            ->allowEmptyString('kilometraje');

        $validator
            ->scalar('color')
            ->maxLength('color', 100)
            ->allowEmptyString('color');

        $validator
            ->scalar('numero_de_serie')
            ->maxLength('numero_de_serie', 100)
            ->allowEmptyString('numero_de_serie');

        $validator
            ->integer('categoria_id')
            ->allowEmptyString('categoria_id');

        $validator
            ->integer('sucursal_id')
            ->allowEmptyString('sucursal_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'), ['errorField' => 'categoria_id']);
        $rules->add($rules->existsIn(['sucursal_id'], 'Sucursals'), ['errorField' => 'sucursal_id']);

        return $rules;
    }
}
