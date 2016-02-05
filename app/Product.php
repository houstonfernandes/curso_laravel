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

    /** lista produtos em destaque
     * @see Product::featured()->get
     *
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', '1');
    }

    /**
     * lista produtos recomendados
     * @param $query
     * @return mixed
     */
    public function scopeRecommended($query)
    {
        return $query->where('recommend', '=', '1');
    }

    /**
     * busca produtos por categorias
     * @param $query
     * @param $id id da category
     * @return mixed - collection de produtos
     */
    public function scopeOfCategory($query, $id){
        return $query->where('category_id', '=', $id);
    }
}