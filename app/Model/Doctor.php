<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'birthdate',
        'position',
        'specialization'
    ];
}
