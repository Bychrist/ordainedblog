<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
   public function hit()
   {
      return $this->hasOne('App\Hit');
   }
   public function category()
   {
   	return $this->belongsTo('App\Category');
   }

   public function Tags()
   {
      return $this->belongsToMany('App\Tag');
   }

   public function getFeaturedAttribute($featured)
   {
   		return asset($featured);
   }
   public function user()
   {
      return $this->belongsTo('App\User');
   }

   protected $dates = ['deleted_at'];



}
