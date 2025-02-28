<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 'students';

    /**
     * The primary key type for the model.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'name',
        'nis',
        'email',
        'phone',
        'address',
        'religion',
        'gender',
        'birth_date',
        'birth_place',
        'major_id',
        'grade_id',
        'classroom_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::random(6);
            }
        });
    }

    public function major()
    {
        return $this->belongsTo(Majors::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grades::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
