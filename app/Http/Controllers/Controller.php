<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Services\Midtrans\Midtrans as MidtransGate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Initiate payment gateway request object
	 *
	 * @return void
	 */
	protected function initPaymentGateway()
	{
        $paymentgateway = new MidtransGate();
        $paymentgateway->_configureMidtrans();
	}
}


