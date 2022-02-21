<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Founfation\Validation\ValidateRequests;


/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
//use PayPal\Api\ApiContext;

//incluyo mis modelos
use App\Order;
use App\OrderItem;

class PaypalController extends Controller
{
    //
    private $_api_context;

    public function __construct()
    {
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        //$this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function postPayment(){
      $payer = new Payer();
      $payer->setPaymentMethod('paypal');

      $items = array();
      $subtotal = 0;
      $cart = \Session::get('cart');
      $currency = 'MXN';

      foreach ($cart as $producto) {
        // code...
        $item = new Item();
        $item->setName($producto->name)
             ->setCurrency($currency)
             ->setDescription($producto->extract)
             ->setQuantity($producto->quantity)
             ->setPrice($producto->price);

             $items[] = $item;
             $subtotal += $producto->quantity * $producto->price;
      }

      $item_list = new ItemList();
      $item_list->setItems($items);

      $details = new Details();
      $details->setSubtotal($subtotal)
      ->setShipping(100);

      $total = $subtotal + 100;

      $amount = new Amount();
      $amount->setCurrency($currency)
          ->setTotal($total)
          ->setDetails($details);

      $transaction = new Transaction();
      $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pedido de prueba en mi laravel App Store');

      $redirect_urls = new RedirectUrls();
      $redirect_urls->setReturnUrl(\URL::route('payment.status'))
              ->setCancelUrl(\URL::route('payment.status'));

      $payment = new Payment();
      $payment->setIntent('sale')
          ->setPayer($payer)
          ->setRedirectUrls($redirect_urls)
          ->setTransactions(array($transaction));

      try{
        $payment->create($this->_api_context);
      }catch(\Paypal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
          echo "#Exception: " . $ex->getMessage() . PHP_OEL;
          $err_data = jason_decode($ex->getData(), true);
          exit;
        }else{
          die(' ups! Algo salió mal ');
        }
      }

      foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'aproval_url') {
          $redirect_url = $link->getHref();
          break;
        }
      }

      //add payment ID to session
      \Session::put('paypal_payment_id', $paypal->getId());
      if(isset($redirect_url)){
        //redirect to paypal
        return \Redirect::away($redirect_url);
      }
      return \Redirect::route('cart-show')
          ->with('message', 'Ups! Error desconocido.');
    }

    public function getPaymentStatus(){
      //Get the payment ID befor session clear
      $payment_id = \Session::get('paypal_payment_id');

      //clear the session payment ID
      \Session::forget('paypal_payment_id');

      $payerId = \Input::get('PayerID');
      $token = \Input::get('token');
      if(empty($payerId) || empty($token)){
        return \Redirect::route('homen')
            ->with('message', 'Hubo un problema al intentar pagar con paypal');
      }

      $payment = Payment::get($payment_id. $this->_api_context);

      $execution = new PaymentExecution();
      $execution->setPayerId(\Input::get('PayerID'));

      $result = $payment->execute($execution, $this->_api_context);

      if($result->getState() == 'approved'){

        //aqui se deben tomar los objetos para guardarlos en pedidos...
        $this->saveOrder();
        //eliminar carrito
        \Session::forget('cart');
        //

        return \Redirect::route('homen')
            ->with('message', 'Compra realizada de forma exitosa');
      }
      return \Redirect::route('homen')
          ->with('message', 'Lacompra fue cancelada');

    }
    //metodo para guardar pedidos en la BD
    protected function saveOrder(){
      $subtotal = 0;
      $cart = \Session::get('cart');
      $shipping = 100;  //costo por envio XD
      foreach($cart as $producto){
        $subtotal += $producto->quantity * $producto->price;
      }
      $order = Order::create([
        'subtotal' => $subtotal,
        'shipping' => $shipping,
        'user_id' => \Auth::user()->id
      ]);
      foreach($cart as $producto){
        $this->saveOrderItem($producto, $order->id);
      }
      protected function saveOrderItem($producto, $order_id){
        OrderDetail::create([
          'price' => $producto->price,
          'quantity' => $producto->quantity,
          'product_id' => $producto->id,
          'order_id' => $order_id
        ]);
      }
    }

}
