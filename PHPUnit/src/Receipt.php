<?php
namespace TDD;

use \BadMethodCallException;

class Receipt
{
    public function __construct($Formatter)
    {
        $this->Formatter= $Formatter;
    }

    public function subTotal($coupon, array $items = [])
    {
        if ($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be less than or equal to 1.00');
        }
        $sum = array_sum($items);
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }

    public function tax($amount)
    {
        return $this->Formatter->currencyAmt($amount* $this->tax);
    }

    public function posttaxtotal($item, $coupon)
    {
        $subtotal= $this-> Subtotal($item, $coupon);
        return $subtotal + $this->tax($subtotal);
    }
}
