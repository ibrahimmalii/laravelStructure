<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory , Sluggable  ;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // we will take this to separate file (PostPolicy)
    // public function ownedBy(User $user)
    // {
    //     return $user->id == $this->user_id;
    // }

    public function sluggable(): array
    {
        return [
            'slug_title' => [
                'source' => 'title'
            ]
        ];
    }

    //this is for eager loading
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }


}
