<?php
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
class PaypalController extends BaseController {
	private $_api_context;
	function __construct() {
		$paypal_conf = Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
	public function pay() {
		// $item_name = Input::get('item_name');
		// return $item_name;
		// $sesid = Input::get('id');
		// Session::put('carid', $sesid);
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$item = new Item();
		$item->setName(Input::get('productName'))
			->setCurrency('EUR')
			->setQuantity(Input::get('productQuantity'))
			->setPrice(Input::get('productPrice'));
		// echo $item;exit;
		$items[] = $item;
		$itemlist = new ItemList();
		$itemlist->setItems($items);

		// echo $itemlist;exit;

		$amount = new Amount();
		$amount->setCurrency('EUR')
			->setTotal(1000);

		// echo $amount;exit;

		$transaction = new Transaction();
		$transaction->setAmount($amount)->setItemList($itemlist)->setDescription('THis is Demo Transaction');
		$redirect_url = new RedirectUrls();
		$redirect_url->setReturnUrl(URL::route('paymentStatus'))
			->setCancelurl(URL::route('paymentStatus'));

		// echo $redirect_url;exit;

		$payment = new Payment();
		$payment->setIntent('sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_url)
			->setTransactions(array($transaction));

		// echo $payment;exit;


		try {
			$payment->create($this->_api_context);
			// return 'in try';
			echo $payment;exit;

		}
		catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EQL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('SOme Error Occur, Sorry');
			}
		}
		foreach ($payment->getLinks() as $link) {
			if ($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		Session::put('paypal_payment_id', $payment->getId());
		if (isset($redirect_url)) {
			return Redirect::away($redirect_url);
		}
		return Redirect::route('original.route')->with('error', 'Unknown Error occured');
		// dd($Amounount);
		// dd($items);
	}
	public function paymentStatus() {
		$payment_id = Session::get('paypal_payment_id');
		Session::forget('paypal_payment_id');
		// if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
		// 	return "operation Failed";
		// }
		$payment = Payment::get($payment_id, $this->_api_context);
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));
		$result = $payment->execute($execution, $this->_api_context);
		if ($result->getState() == 'approved') {
			// return Session::get('carid');
			// $latestCart = Cart::find(Session::get('carid'));
			// // dd($latestCart);
			// $latestCart->status = "Paid";
			// $latestCart->save();
			// return Redirect::route('mycart');
			return "SUCCESSSSSSSSS";
		} else {
			return "OPERATION FAILED";
		}
	}
}