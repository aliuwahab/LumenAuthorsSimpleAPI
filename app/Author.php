<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Author extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','gender','country'
    ];


    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'gender' => 'required|max:255|in:male,female',
        'country' => 'required|max:255',
    ];

    public static $editRules = [
        'name' => 'max:255',
        'gender' => 'max:255|in:male,female',
        'country' => 'max:255',
    ];


//    /**
//     * The attributes excluded from the model's JSON form.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password',
//    ];
}
