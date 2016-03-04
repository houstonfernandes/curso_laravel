<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class AdminOrdersController extends Controller
{
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $order = $this->order->find($id);
        $statusNames = Order::$statusNames;

        return view('admin.orders.order', compact('order', 'statusNames'));
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request['status'];

        try{
            if (!Order::validStatus($status))
                throw new Exception('erro ao atualizar pedido - Status inválido');
            $order = $this->order->find($id);
            $order->status = $status;
            $order->save();

            flash()->success("Status do pedido N°" . $order->id . " do usuário: '" . $order->user->name . "' foi alterado para - '" . $order->statusName() . " ' ");//flash message
        }
        catch(Exception $e){
            flash()->error($e->getMessage());
        }
        return redirect()->route('admin.orders.index');
    }

}
