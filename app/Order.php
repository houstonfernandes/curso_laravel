<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];

    public static $statusNames = [
        0 => 'Aguardando pagamento',
        1 => 'Pagamento realizado',
        2 => 'Aguardando envio',
        3 => 'Enviado',
        4 => 'Entregue',
        98 => 'Devolvido',
        99 => 'Cancelado'
    ];


    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }
    public function user(){
        return $this->belongsTo('CodeCommerce\User');
    }

    /**
     * obtém o nome do status
     *@param int número do status
     * @return string nome do status
     */
    public function statusName()
    {
        return self::$statusNames[$this->status];
    }

    /**
     * verifica se status é válido
     * @param $status
     * @return bool
     */
    public static function validStatus($status){
        return array_key_exists($status,self::$statusNames);
    }

}
