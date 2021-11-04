<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'description', 'image', 'parent_id'];
    public $translatable = ['name', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
    public function sub()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function childrens()
    {
        return $this->sub()->with('childrens');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'id', 'parent_id');
    }
}
