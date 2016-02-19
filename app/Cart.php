<?php
namespace CodeCommerce;


class Cart
{
    private $items;
    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price, $imgPath)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++ : 1,
                'name' => $name,
                'price' => floatval($price),
                'imgPath' => $imgPath
            ]
        ];
    }

    public function delete($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item){
            $total += $item['qtd'] * $item['price'];
        }
        return $total;
    }

    public function edit($id, $qtd)
    {
        if($qtd == 0)
            $this->delete($id);
        else
            $this->items[$id]['qtd'] = $qtd;
    }

    public function clear()
    {
        $this->items = [];
    }
}