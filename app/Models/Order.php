<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'mobile', 'cake_id', 'name_on_cake', 'size'];

    public function cake() {
        
        return $this->belongsTo(Cake::class, 'cake_id', 'id')->select('id', 'name');
    }

}