<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
   
 }
 
