<?php

/*
 * Documentación para el pago con paypal
 * http://jslim.net/blog/2014/09/19/integrate-paypal-sdk-into-laravel-4/
 */

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

class PaypalController extends BaseController {
	
	private $_api_context;
	
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function index()
	{
		
	}
	
	public function paySend()
	{
		$student = Auth::user()->profile;
		
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		
		$item_1 = new Item();
		$item_1->setName('Item 1') // item name
			->setCurrency('USD')
			->setQuantity(2)
			->setPrice('15'); // unit price
		
		$item_2 = new Item();
		$item_2->setName('Item 2')
			->setCurrency('USD')
			->setQuantity(4)
			->setPrice('7');
		
		$item_3 = new Item();
		$item_3->setName('Item 3')
			->setCurrency('USD')
			->setQuantity(1)
			->setPrice('20');
		
		// add item to list
		$item_list = new ItemList();
		$item_list->setItems(array($item_1, $item_2, $item_3));

		$amount = new Amount();
		$amount->setCurrency('USD')
			->setTotal(78);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Una descripción de la compra');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::route('student_pay_status'))
			->setCancelUrl(URL::route('student_pay_status'));
		
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Some error occur, sorry for inconvenient');
			}
		}
		
		// dd($payment);
		
		
		foreach($payment->getLinks() as $link) {
			
			// var_dump($link, $link->getRel()); echo "<hr>";
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		
		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());
		
		if(isset($redirect_url)) {
			// redirect to paypal
			return Redirect::away($redirect_url);
		}
		
		
		// return Redirect::route('student_pay')->with('error', 'Unknown error occurred');
		
		
		return View::make('student/pay')->with(array('student' => $student, 'payer' => $payer));
	}
	
	public function payStatus()
	{
		$student = Auth::user()->profile;
		
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');
		var_dump('payment_id',$payment_id); echo "<hr>";
		if ( empty($payment_id)) {
			die('Ocurrio un error, disculpe las molestias.');
		}
		
		// clear the session payment ID
		Session::forget('paypal_payment_id');
		
		// if ( empty(Input::get('PayerID')) || empty(Input::get('token'))) {
		// if (! Input::has('PayerID') || ! Input::has('token')) {
		$get_PayerID = Input::get('PayerID');
		$get_token = Input::get('token');
		
		if ( empty($get_PayerID) || empty($get_token)) {
			// return Redirect::route('original.route')->with('error', 'Payment failed');
			return View::make('student/pay')->with(array('student' => $student, 'error' => 'El pago fallo'));
			// echo 'El pago fallo';
		}/**/

		$payment = Payment::get($payment_id, $this->_api_context);
		var_dump('payment', $payment); echo "<hr>";
		
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));
		var_dump('execution', $execution); echo "<hr>";
		
		// dd(array(, , ));
		
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		var_dump('result', $result); echo "<hr>";
		exit;
		
		echo "<h2>Respuesta</h2>";
		echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// return Redirect::route('original.route')->with('success', 'Payment success');
			echo 'El pago fue exitoso';
		}
		// return Redirect::route('original.route')->with('error', 'Payment failed');
		echo 'El pago fallo';
	}


}
