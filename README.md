# Convert money to words

The goal is to convert the numbers (string) set to text.

## Author
. [_Diego Brocanelli_](https://github.com/Diego-Brocanelli)

## Requirements 

. PHP >= 5.3.8 

. [INTL PHP Extension](http://php.net/manual/pt_BR/book.intl.php)

## Examples:
#### BRL <Brazilian currency>

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Money\Convert\Convert\MoneyToWords;

$money = new MoneyToWords('BRL');

$money->convert('01.00'); // output: um real
$money->convert('125.67'); // output: cento e vinte e cinco reais e sessenta e sete centavos
$money->convert('8563754.01'); // output: oito milhões e quinhentos e sessenta e três mil e setecentos e cinquenta e quatro reais e um centavo
$money->convert('01.01'); // output: um real e um centavo
$money->convert('0.01'); // output: um centavo
$money->convert('111.11'); // output: cento e onze reais e onze centavos
$money->convert('25'); // output: vinte e cinco reais
$money->convert('1.25'); // output: um real e vinte e cinco centavos
$money->convert('7596.37'); // output: sete mil e quinhentos e noventa e seis reais e trinta e sete centavos
$money->convert('1000000000'); // output: um bilhão de reais 
$money->convert('1829672.99'); // output: um milhão e oitocentos e vinte e nove mil e seiscentos e setenta e dois reais e noventa e nove centavos 
$money->convert('0.50'); // output:  cinquenta centavos
```

#### License
. [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause)
