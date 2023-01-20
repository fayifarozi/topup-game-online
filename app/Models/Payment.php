<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Payment extends Model
{
	protected $collection = 'payment';
    protected $fillable = [
		'order_id',
		'number',
		'transaction_id',
		'amount',
		'method',
		'status',
		'token',
		'payloads',
		'payment_type',
		'va_number',
		'vendor_name',
		'biller_code',
		'bill_key'
	];
	public const CODE = 'PAY';

    public const EXPIRY_DURATION = 1;
	public const EXPIRY_UNIT = 'days';

    public const CHALLENGE = 'challenge';
	public const SUCCESS = 'success';
	public const SETTLEMENT = 'settlement';
	public const PENDING = 'pending';
	public const DENY = 'deny';
	public const EXPIRE = 'expire';
	public const CANCEL = 'cancel';

	public const PAYMENT_CHANNELS = [
		"credit_card",
		"gopay",
		"shopeepay",
		"permata_va",
		"bca_va",
		"bni_va",
		"bri_va",
		"echannel",
		"other_va",
		"danamon_online",
		"mandiri_clickpay",
		"cimb_clicks",
		"bca_klikbca",
		"bca_klikpay",
		"bri_epay",
		"xl_tunai",
		"indosat_dompetku",
		"kioson",
		"Indomaret",
		"alfamart",
		"akulaku"
	];
    // public const PAYMENT_CREDIT = ["credit_card"];
	// public const PAYMENT_BANK = [
	// 	"cimb_clicks","bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
    // 	"bca_va", "bni_va", "bri_va", "other_va","danamon_online"
	// ];
	// public const PAYMENT_GOPAY = ["gopay"];
	// public const PAYMENT_SHOPEEPAY = ["shopeepay"];
	// public const PAYMENT_MERCHANTS = ["indomaret", "alfamart"];


	public static function generateCode()
	{
		$dateCode = self::CODE . '/'. date('Ymd').'/';

		$lastPay = self::select('number')
			->where('number', 'like', $dateCode . '%')
			->first();
			
		if (isset($lastPay)) {
			$lastPayNumber = str_replace($dateCode, '', $lastPay->number);
			$nextPayNumber = sprintf('%05d', (int)$lastPayNumber + 1);
			$number = $dateCode . $nextPayNumber;
		}else{
			$number = $dateCode . '00001';
		}

		if ($number == $lastPay || $number == null) {
			return self::generateCode();
		}
		return $number;
	}



}
