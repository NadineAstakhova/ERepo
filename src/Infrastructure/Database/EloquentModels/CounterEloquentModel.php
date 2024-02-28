<?php

namespace Src\Infrastructure\Database\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CounterEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'counters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sum_value',
        'team_id'
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

    public function team(): BelongsTo
    {
        return $this->belongsTo(TeamEloquentModel::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(EmployeeEloquentModel::class)
            ->withPivot('steps_value')
            ->using(EmployeeCounterEloquentPivotModel::class);
    }

}
