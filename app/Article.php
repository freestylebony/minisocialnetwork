<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{   
	//use SoftDeletes;

    protected $fillable = ['content', 'post_on', 'user_id'];

    protected $dates = ['post_on', 'deleted_at'];


    public function getShortContentAttribute()
    {
    	return substr($this->content, 0, random_int(60, 150)). '. . .';
    }


    public function setPostOnAttribute($value)
    {

    	$this->attributes['post_on'] = Carbon::parse($value);
    }

    public function user()
    {
    	return $this->belongsTO(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
