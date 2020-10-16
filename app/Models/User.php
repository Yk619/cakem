<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use JWT\Token;
use App\Models\{Role, File};
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'provider_id', 'role_id', 'region','country','email','mobile',
        'code','landline_num','identification_no','passport_no','id_image','address','passport_image','username', 'profile_image','token', 'email_verified_at', 'password', 'encpass', 'remember_token' ,'status' ,'is_deactivated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRole() {
        
        return $this->belongsTo(Role::class, 'role_id', 'id')->select('id', 'role');
    }

    public function client() {
        
        return $this->belongsTo(Client::class, 'provider_id', 'id')->select('id', 'title');
    }

    public function avatar() {
        
        return $this->belongsTo(File::class, 'profile_image', 'id')->select('id', 'file_name','file_path');
    }

    public function setPasswordAttribute($val) {
        $this->attributes['password']     = bcrypt($val);
    }

    public function setEncpassAttribute($val) {
        $this->attributes['encpass']     = Crypt::encryptString($val);
    }

    public function getEncpassAttribute($val) {
        if(!empty($val)){
            try{
                return Crypt::decryptString($val);
            }catch(\Exception $e){
                return $val;
            }
            
        }
        return $val;        
    }

    public static function rules($id = null) : array {

        $rules = [  

            'mobile' => 'required|numeric|digits:10', 
            'landline_num' => 'required|numeric|digits:10',
            'password'  => 'min:6',
            //'fname' => 'required|regex:/^[a-zA-Z]+$/u',
            'fname' => 'required',
            'lname' => 'required',
            'country' => 'required',
            'region' => 'required',
            'address' => 'required',
        
        ];

        if(is_null($id)) {
            $rules['passport_no'] = 'required|string|min:3|max:100'.$id;
            $rules['identification_no'] = 'required|string|min:3|max:100'.$id;
            $rules['passport_image']    = 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'.$id;
            $rules['id_image'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'.$id;
            $rules['profile_image'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'.$id;              
        }

        return $rules;
    }
    

    public function tokenValidate($token){

        $token = Token::validate($token, env('JWT_KEY', 'secret'));

        return $token;

    }

    public function pass(){

        return $this->belongsTo(File::class, 'passport_image', 'id')->select('id', 'file_name');
    }

    public function file(){

        return $this->belongsTo(File::class, 'id_image', 'id')->select('id', 'file_name');

    }


    public function profile(){

        return $this->belongsTo(File::class, 'profile_image', 'id')->select('id', 'file_name');

    }

    public function assign_sum()
    {
        return $this->hasMany(AssignStock::class, 'user_id', 'id');
    }
}
