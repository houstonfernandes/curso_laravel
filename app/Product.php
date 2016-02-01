<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'recommend',
        'featured'
    ];

    /**
     * busca a categoria do produto
     */
    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }

    /**
     * busca as imagens do produto
     */
    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    /**
     * busca as tags do produto n:m
     */
    public function tags(){
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    /** retorna produtos em destaque
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', '1');
    }
}