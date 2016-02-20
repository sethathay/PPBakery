<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class SaleOrderReceipt extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales_order_receipts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sales_order_id', 'exchange_rate_id', 'receipt_code', 'amount_us', 'amount_kh', 'total_amount', 'balance', 'pay_date', 'due_date', 'created_by', 'updated_by', 'is_active'];

}
