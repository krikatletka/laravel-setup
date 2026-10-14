<?php

require_once "BankAccount.php";

class SavingsAccount extends BankAccount
{
    public static float $interestRate = 5;


    public function applyInterest()
    {
        $interest = $this->balance * self::$interestRate / 100;
        $this->balance += $interest;
    }
}