<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class customer extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'customers';
    protected $fillable = ['name','email','password','term_and_condition'];
}
