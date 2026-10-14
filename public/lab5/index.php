<?php

require_once "BankAccount.php";
require_once "SavingsAccount.php";

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №5</title>
</head>
<body>
<h1>Лабораторна робота №5</h1>
<h2>Банківські рахунки</h2>
<?php

try {

    $account = new BankAccount( 1000, "USD");

    echo "<h3>BankAccount</h3>";
    echo "Початковий баланс: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";

    $account->deposit(500);

    echo "Після поповнення на 500: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";
    $account->withdraw(300);
    echo "Після зняття 300: " . $account->getBalance() . " " . $account->getCurrency() . "<br>";


} catch (Exception $e) {

    echo "Помилка: " . $e->getMessage()  . "<br>";
}


echo "<hr>";


try {

    $savings = new SavingsAccount(2000, "EUR" );

    echo "<h3>SavingsAccount</h3>";
    echo "Початковий баланс: " . $savings->getBalance()  . " "  . $savings->getCurrency()  . "<br>";
    echo "Відсоткова ставка: " . SavingsAccount::$interestRate . "%<br>";
    $savings->applyInterest();

    echo "Баланс після нарахування відсотків: " . $savings->getBalance() . " "  . $savings->getCurrency()  . "<br>";


} catch (Exception $e) {

    echo "Помилка: " . $e->getMessage() . "<br>";
}


echo "<hr>";
echo "<h3>Перевірка винятків</h3>";

try {

    $testAccount = new BankAccount( 100, "USD");
    $testAccount->withdraw(500);

} catch (Exception $e) {

    echo "Помилка: ". $e->getMessage() . "<br>";
}


try {

    $testAccount = new BankAccount( 100, "USD" );
    $testAccount->deposit(-50);

} catch (Exception $e) {

    echo "Помилка: "  . $e->getMessage() . "<br>";
}
?>
</body>
</html>