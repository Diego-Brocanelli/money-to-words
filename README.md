# Convert money to words

The goal is to convert the numbers (string) set to text.



## Requirements

. PHP >= 7.4;

. [ext-intl](http://php.net/manual/pt_BR/book.intl.php).

## Install

```
composer install
```

## Run tests

In the project root.

```
composer tests
```

## Run code analysis

In the project root.

```
composer analyse
```

## How to use

```
composer require diego-brocanelli/money_to_word dev-main
```

## Examples:
#### BRL <Brazilian currency>

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Money\Coins\BRL;
use Money\MoneyToWords;

$money = new MoneyToWords(new BRL());

$money->convert(0.1); // output: dez centavo
$money->convert(0.01); // output: um centavo
$money->convert(0.05); // output:  cinco centavos
$money->convert(1.0); // output: um real
$money->convert(125.67); // output: cento e vinte e cinco reais e sessenta e sete centavos
$money->convert(8563754.01); // output: oito milhões e quinhentos e sessenta e três mil e setecentos e cinquenta e quatro reais e um centavo
$money->convert(1.01); // output: um real e um centavo
$money->convert(111.11); // output: cento e onze reais e onze centavos
$money->convert(25.0); // output: vinte e cinco reais
$money->convert(1.25); // output: um real e vinte e cinco centavos
$money->convert(7596.37); // output: sete mil e quinhentos e noventa e seis reais e trinta e sete centavos
$money->convert(1000000000); // output: um bilhão de reais 
$money->convert(1829672.99); // output: um milhão e oitocentos e vinte e nove mil e seiscentos e setenta e dois reais e noventa e nove centavos 
$money->convert(0.5); // output: cinquenta centavos
```

## Author
<a href="https://www.diegobrocanelli.com.br/">
<img src="https://avatars2.githubusercontent.com/u/4108889?s=460&v=4" width="150px">
</a>

### License
[BSD-3-Clause](LICENSE)
