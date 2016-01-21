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

}
