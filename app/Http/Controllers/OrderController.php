<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    //
    public function index(){
      $orders = Order::orderBy('id','desc')->paginate(5);
      //dd($orders);
      return view('admin.order.index', compact('orders'));
    }
    public function getItems(Request $request){
      $items = OrderItem::with('product')->where('order_id', $request->get('order_id'))->get();
      return json_encode($items);
    }
    public function destroy($id){
      $order = Order::findOrFail($id);
      //dd($order);
      $delete = $order->delete();
      //dd($deleted);
      $message = $delete ? 'Producto eliminado exitosamente!' : 'El producto no pudo ser eliminado!';
      return redirect()->route('orders.index')->with('message',$message);

      //$deleted = $product->delete();
      //$message = $deleted ? 'Producto eliminado exitosamente!' : 'El producto no pudo ser eliminado!';
      //return redirect()->route('product.index')->with('message',$message);


    }
}
