<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Product extends Eloquent
{
    protected $fillable = ['id','Title', 'Price', 'Photo', 'Description'];
    protected $collection  = 'products';
    protected $connection   = 'mongodb';
}
