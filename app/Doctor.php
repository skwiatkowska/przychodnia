<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = false;
    private $errors = [];

    

    public function getErrors()
    {
        return $this->errors;
    }

}
