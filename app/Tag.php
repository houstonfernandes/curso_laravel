<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    /**
     * busca os produtos da tag
     */
    public function Products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
