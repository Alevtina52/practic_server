<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    public $timestamps = false;

    protected $table = 'doctor_schedules';

    protected $fillable = [
        'doctor_id',
        'weekday',
        'time_from',
        'time_to',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
