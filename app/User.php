<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'username', 'dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'dob'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
    
    public function setDobAttribute($value)
    {

        $this->attributes['dob'] = Carbon::parse($value);
    }


    public function setUsenameAttribute($value)
    {
        $this->attributes['username'] = ucfirst($value);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
