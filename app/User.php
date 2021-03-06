<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','name','display_name', 'email', 'password','gender','phoneno','city','type','role','profile_pic','active_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return ($this->role == '1');
    }

    public function isCompany(){
        return ($this->type == 'company' );
    }

    public function isJobseeker(){
        return ($this->type == 'jobseeker'&& $this->active_status=='0');
    }
    public function isActive(){
        return ($this->active_status == '1');
    }

    public function notifications($all = false){
        if($all):
            $notifications = notification::where('user_id',$this->id)->get();
        else:
            $notifications = notification::where(['user_id'=>$this->id,'viewed'=>'0'])->get();
        endif;

        return $notifications;

    }
}
