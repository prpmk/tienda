<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Founfation\Validation\ValidateRequests;
use Illuminate\Founfation\Bus\DispatchesCommands;
use Illuminate\Support\Facades\Input;

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
use PayPal\Exception\PayPalConnectionException;
//use PayPal\Api\ApiContext;

//incluyo mis modelos
use App\Order;
use App\OrderItem;

class PaypalController extends Controller // o BaseController
{
    //
    private $_api_context;

    public function __construct()
    {
        /** setup PayPal api context **/
        //$ch = curl_init();
        //dd($ch);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    //guarda todo lo que se enviara a paypal
    public function postPayment(){
      $payer = new Payer();
      $payer->setPaymentMethod('paypal');

      $items = array();
      $subtotal = 0;
      $cart = \Session::get('cart');
      $currency = 'MXN';

      //para cada elemento de tipo carrrito se crea cargan sus valores
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
        //////////////////////////////////////////////////////////////////////////////////////////

      $payment = new Payment();
      $payment->setIntent('sale')
          ->setPayer($payer)
          ->setRedirectUrls($redirect_urls)
          ->setTransactions(array($transaction));

      try{
        $payment->create($this->_api_context);
      } catch (\Paypal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
          echo "#Exception: " . $ex->getMessage() . PHP_EOL;
          $err_data = json_decode($ex->getData(), true);
          exit;
        } else {
          die(' Ups! Algo salió mal ');
        }
      }

      foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'approval_url') {
          $redirect_url = $link->getHref();
          break;
        }
      }

      //add payment ID to session
      //se cambio paypal por payment en la primer linea -----------------------------------------------------------
      \Session::put('paypal_payment_id', $payment->getId());
      if(isset($redirect_url)){
        //redirect to paypal
        return \Redirect::away($redirect_url);
      }
      return \Redirect::route('cart-show')
          ->with('message', 'Ups! Error desconocido.');
    }

    public function getPaymentStatus(){
      //Get the payment ID befor session clear
      $payment_idd = \Session::get('paypal_payment_id');
//dd(\Session::get('paypal_payment_id'));
//$payment_id=$payment_idd;
      //clear the session payment ID
//      \Session::forget('paypal_payment_id');
//dd($payment_idd);

      $payerId = \Input::get('PayerID');
      $token = \Input::get('token');

      if(empty($payerId) || empty($token)){
        return \Redirect::route('homen')
            ->with('message', 'Hubo un problema al intentar pagar con paypal');
      }
//$payment_id=7;
//dd($payment_idd);
      //$payment = Payment::get($payment_idd, $this->_api_context);
            $payment = Payment::get((\Session::get('paypal_payment_id')), $this->_api_context);
//dd($payment);
      $execution = new PaymentExecution();
//dd($execution);
      $execution->setPayerId(\Input::get('PayerID'));
//dd($execution);
//$hola=$payment->getState();
//dd($hola);
      //if($result->getState() == 'approved'){
      //se cambio paypalpayment por payment asi funciono
      if('created' == $payment->getState()){
        //aqui se deben tomar los objetos para guardarlos en pedidos...
         $this->saveOrder(); //-----------------
        //eliminar carrito
         \Session::forget('cart'); //-----------------
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
    }
      protected function saveOrderItem($producto, $order_id){
        OrderItem::create([
          'price' => $producto->price,
          'quantity' => $producto->quantity,
          'product_id' => $producto->id,
          'order_id' => $order_id
        ]);
      }
    }
