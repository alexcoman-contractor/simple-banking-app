<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class Transaction
 * @package App\Models
 */
class Transaction extends Model
{
    public const TYPE_MONEY_SENT_TO_INTERNAL_CUSTOMER = 1;
    public const TYPE_MONEY_RECEIVED_FROM_INTERNAL_CUSTOMER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'payed_by_user_id',
        'received_by_user_id',
        'type'
    ];

    /**
     * @param int $customerId
     * @param float $value
     * @return $this
     */
    public function sendMoneyToCustomer(int $customerId, float $value): Transaction
    {
        $customer = User::query()->find($customerId);

        DB::insert('INSERT INTO transactions (value, payed_by_user_id, received_by_user_id, type) VALUES ("' . -$value . '", "' . Auth::id() . '", ' . $customerId . ', ' . self::TYPE_MONEY_SENT_TO_INTERNAL_CUSTOMER . ')');
        DB::insert('INSERT INTO transactions (value, payed_by_user_id, received_by_user_id, type) VALUES ("' . $value . '", "' . Auth::id() . '", ' . $customerId . ', ' . self::TYPE_MONEY_RECEIVED_FROM_INTERNAL_CUSTOMER . ')');

        DB::update('UPDATE users SET balance = ' . Auth::user()->balance - $value . ' WHERE id = ' . Auth::id());
        DB::update('UPDATE users SET balance = ' . $customer->balance + $value . ' WHERE id = ' . $customer->id);

        return $this;
    }
}
