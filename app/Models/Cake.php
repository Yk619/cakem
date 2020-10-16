<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = ['name', 'price', 'quantity', 'type', 'image', 'weight'];

    public static function rules($id=null) : array {

        $rules = [
            'name'		=> 'required',
            'quantity'	=> 'required|numeric',
            'price'		=> 'required|numeric',
            'weight'	=> 'required|numeric',
        ];

        if (is_null($id)) {

            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
         
        }
        return $rules;
    }
}