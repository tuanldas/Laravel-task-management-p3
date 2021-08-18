<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    public $timestamps = false;
    protected $table = 'tasks';
}
