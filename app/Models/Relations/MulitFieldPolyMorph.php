<?php
/**
 * User: ben
 * Date: 10/4/15
 */

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class MulitFieldPolyMorph extends HasOneOrMany{

    private $type;

    private $morphClass;
    private $typeColumn;

    public function __construct(Builder $query, Model $parent, $type, $typeColumn, $idColumn, $localKey) {

        $this->type = $type;
        $this->typeColumn = $typeColumn;

        parent::__construct($query, $parent, $idColumn, $localKey);

    }


    /**
     * Apply the morph type and parent model ID to a new morph model
     *
     * @param Model $model
     */
    protected function setForeignAttributesForCreate(Model $model)
    {
        $model->{$this->getPlainForeignKey()} = $this->getParentKey();
        $model->{$this->typeColumn} = $this->type;
    }


    public function addConstraints()
    {
        if (static::$constraints) {
            parent::addConstraints();

            $this->query->where($this->typeColumn, $this->type);
        }
    }

    /**
     * Get the relationship count query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Builder  $parent
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getRelationCountQuery(Builder $query, Builder $parent)
    {
        $query = parent::getRelationCountQuery($query, $parent);

        return $query->where($this->typeColumn, $this->type);
    }

    public function addEagerConstraints(array $models)
    {
        parent::addEagerConstraints($models);

        $this->query->where($this->typeColumn, $this->type);
    }

    /**
     * Attach a model instance to the parent model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(Model $model)
    {
        $model->setAttribute($this->typeColumn, $this->type);

        return parent::save($model);
    }

    /**
     * Find a related model by its primary key or return new instance of the related model.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNew($id, $columns = ['*'])
    {
        if (is_null($instance = $this->find($id, $columns))) {
            $instance = $this->related->newInstance();

            // When saving a polymorphic relationship, we need to set not only the foreign
            // key, but also the foreign key type, which is typically the class name of
            // the parent model. This makes the polymorphic item unique in the table.
            $this->setForeignAttributesForCreate($instance);
        }

        return $instance;
    }

    /**
     * Get the first related model record matching the attributes or instantiate it.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function firstOrNew(array $attributes)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->related->newInstance($attributes);

            // When saving a polymorphic relationship, we need to set not only the foreign
            // key, but also the foreign key type, which is typically the class name of
            // the parent model. This makes the polymorphic item unique in the table.
            $this->setForeignAttributesForCreate($instance);
        }

        return $instance;
    }

    /**
     * Get the first related record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function firstOrCreate(array $attributes)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->create($attributes);
        }

        return $instance;
    }

    /**
     * Create or update a related record matching the attributes, and fill it with values.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $instance = $this->firstOrNew($attributes);

        $instance->fill($values);

        $instance->save();

        return $instance;
    }

    /**
     * Create a new instance of the related model.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        $instance = $this->related->newInstance($attributes);

        // When saving a polymorphic relationship, we need to set not only the foreign
        // key, but also the foreign key type, which is specified as constructor parameter
        // of this relation.
        $this->setForeignAttributesForCreate($instance);

        $instance->save();

        return $instance;
    }


    /**
     * Get the results of the relationship.
     *
     * @return mixed
     */
    public function getResults()
    {
        return $this->query->get();
    }

    /**
     * Initialize the relation on a set of models.
     *
     * @param  array   $models
     * @param  string  $relation
     * @return array
     */
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }

        return $models;
    }

    /**
     * Match the eagerly loaded results to their parents.
     *
     * @param  array   $models
     * @param  \Illuminate\Database\Eloquent\Collection  $results
     * @param  string  $relation
     * @return array
     */
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchMany($models, $results, $relation);
    }
}