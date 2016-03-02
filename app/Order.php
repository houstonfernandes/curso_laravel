<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];

    private $statusName = [
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
        return $this->statusName[$this->status];
    }

    /**
     * obtem array de nomes de status
     * @return array
     */
    public function getStatusName()
    {
        return $this->statusName;
    }
}
