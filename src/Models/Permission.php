<?php

namespace ffogarasi\LaravelRoles\Models;

use Illuminate\Database\Eloquent\Model;
use ffogarasi\LaravelRoles\Contracts\PermissionHasRelations as PermissionHasRelationsContract;
use ffogarasi\LaravelRoles\Traits\PermissionHasRelations;
use ffogarasi\LaravelRoles\Traits\Slugable;

class Permission extends Model implements PermissionHasRelationsContract
{
    use Slugable, PermissionHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
