<?php

namespace Src\Infrastructure\Database\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Infrastructure\Database\Factories\TeamEloquentModelFactory;

class TeamEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static function newFactory(): TeamEloquentModelFactory
    {
        return TeamEloquentModelFactory::new();
    }

    public function employees(): HasMany
    {
        return $this->hasMany(EmployeeEloquentModel::class, 'team_id');
    }

}
