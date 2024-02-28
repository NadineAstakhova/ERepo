<?php

namespace Src\Infrastructure\Database\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Infrastructure\Database\Factories\EmployeeEloquentModelFactory;

class EmployeeEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
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

    public function counters(): BelongsToMany
    {
        return $this->belongsToMany(CounterEloquentModel::class)
            ->withPivot('steps_value')
            ->using(EmployeeCounterEloquentPivotModel::class);
    }

    protected static function newFactory(): EmployeeEloquentModelFactory
    {
        return EmployeeEloquentModelFactory::new();
    }

}
