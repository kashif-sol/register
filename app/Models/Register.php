<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    public $table='register';
    protected $fillable=['name','email','phone','tax','sellers_permit','city','company_name','password','confirm_password']; 
}
