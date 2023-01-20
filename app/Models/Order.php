<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $collection = 'order';
    protected $fillable = [
        'order_code',
        'user_game_id',
        'kode_id',
        'email',
        'phone',
        'metode',
        'status',
        'tax',
        'total_price',
        'payment_status',
        'payment_token',
        'payment_url'
    ];
	public const PROCESS = 'proceed';
	public const COMPLETED = 'completed';
	public const CANCELLED = 'cancelled';

	public const ORDERCODE = 'CST';

	public const PAID = 'paid';
	public const UNPAID = 'unpaid';
    
    public function product()
    {
        //belongsTo() defauld diambil dari nama fuction (kode)+_id => kode_id
        return $this->belongsTo(Product::class,'kode_id','kode_id');   
    }

    public static function generateCode()
	{
		// $dateCode = self::ORDERCODE . '/'. date('Ymd').'/'. fake()->numerify('###');
		$dateCode = self::ORDERCODE . '/'. date('Ymd').'/';

		$lastOrder = self::select('order_code')->latest()
			->where('order_code', 'like', $dateCode . '%')
			->first();

		if(isset($lastOrder)) {
			$lastOrderNumber = str_replace($dateCode, '', $lastOrder->order_code);
			$nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);
			$orderCode = $dateCode . $nextOrderNumber;
		}else{
			$orderCode = $dateCode . '00001';
		}
		
		if ($orderCode == $lastOrder || $orderCode == null) {
			return self::generateCode();
		}
		return $orderCode;
	}

	/**
	 * Check order is paid or not
	 *
	 * @return boolean
	 */
	public function isPaid()
	{
		return $this->payment_status == self::PAID;
	}
}
