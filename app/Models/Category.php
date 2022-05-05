<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory,Sluggable,InteractsWithMedia;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = [
        'photo',
    ];


    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public function parent(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(Category::class);
    }

    public function getPhotoAttribute()
    {
        return $this->getMedia('photo')->first();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
