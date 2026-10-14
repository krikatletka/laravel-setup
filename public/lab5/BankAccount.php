<?php

require_once "AccountInterface.php";

class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0;

    protected float $balance;

    protected string $currency;


    public function __construct(float $balance = 0, string $currency = "USD") {
        if ($balance < self::MIN_BALANCE) throw new Exception(  "Початковий баланс не може бути від'ємним" );
        $this->balance = $balance;
        $this->currency = $currency;
    }


    public function deposit($amount)
    {
        if ($amount <= 0) throw new Exception( "Сума поповнення повинна бути більшою за 0" );
        $this->balance += $amount;
    }


    public function withdraw($amount)
    {
        if ($amount <= 0)  throw new Exception(  "Сума зняття повинна бути більшою за 0" );
        if ( $this->balance - $amount < self::MIN_BALANCE )  throw new Exception(  "Недостатньо коштів" );
        $this->balance -= $amount;
    }


    public function getBalance()
    {
        return $this->balance;
    }


    public function getCurrency()
    {
        return $this->currency;
    }
}