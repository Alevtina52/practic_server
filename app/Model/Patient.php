<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'birthdate'
    ];
}
