<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classes';

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
        'major_id',
        'grade_id',
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
    
    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id', 'id');
    }
    
    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teacher');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

}
