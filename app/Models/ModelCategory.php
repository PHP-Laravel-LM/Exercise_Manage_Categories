<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCategory extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'parentId'];
    public $timestamps = false;
}
