Joaosalless/Holidays-BR
===================

[DEPRECATED]

> Esta biblioteca será descontinuada. Utilize a minha outra biblioteca [https://github.com/joaosalless/dates] que possui feriados nacionais, estaduais e municipais, além de suportar datas comemorativas e cálculo automático de dias úteis e horário de expediente.

Joaosalless/Holiday é uma biblioteca Php que serve para verificar se existem feriados em uma determinada data. A biblioteca conta com todos os feriados nacionais incluindo os feriados de datas variáveis.

Esta biblioteca é modular. Os feriados Estaduais e municipais serão incluídos na medida do possível.

Esta biblioteca foi desenvolvida baseada no projeto [https://github.com/checkdomain/Holiday](https://github.com/checkdomain/Holiday), adaptando-o para suportar também os feriados municipais.

Requirements
------------
Joaosalless/Holidays-BR requires php >= 7.0.

Install
-------

```bash
composer require joaosalless/holidays-br
```

Usage
-----
Para verificar se há feriados em uma determinada data, apenas instancie a classe Util e chame o método `getHoliday()`.

```php
$util    = new \Joaosalless\Holiday\Util();

// Feriado nacional
$holiday = $util->getHoliday('BR', '01.01.2017');

// Feriado estadual
$holiday = $util->getHoliday('BR', '09.07.2017', 'SP');

// Feriado municipal
$holiday = $util->getHoliday('BR', '25.01.2017', 'SP', '3550308');
```

Se você só precisa saber se há um feriado na sua data, também existe um método `isHoliday()`.

```php
$util    = new \Joaosalless\Holiday\Util();
$holiday = $util->isHoliday('BR', '01.01.2018');
```

Se você precisa saber todos os feriados para um país, estado ou município específico, você pode instanciar um dos provedores incluídos e chamar o método `getHolidaysByYear()`.

Exemplo:

```php
$util     = new \Joaosalless\Holiday\Util();

// Lista todos os feriados nacionais, estaduais e municipais (São Paulo - SP)
$provider = $util->getProvider('BR', 'SP', '3550308');
$holidays = $provider->getHolidaysByYear(2018);

// Retorna o array de feriados:
[
    "01-01" => [
        "name"   => "Dia Mundial da Paz",
        "states" => null,
        "cities" => null,
    ],
    "04-21" => [
        "name"   => "Tiradentes",
        "states" => null,
        "cities" => null,
    ],
    "05-01" => [
        "name"   => "Dia do Trabalhador",
        "states" => null,
        "cities" => null,
    ],
    "09-07" => [
        "name"   => "Independência do Brasil",
        "states" => null,
        "cities" => null,
    ],
    "10-12" => [
        "name"   => "Nossa Senhora Aparecida",
        "states" => null,
        "cities" => null,
    ],
    "11-02" => [
        "name"   => "Finados",
        "states" => null,
        "cities" => null,
    ],
    "11-15" => [
        "name"   => "Proclamação da República",
        "states" => null,
        "cities" => null,
    ],
    "12-25" => [
        "name"   => "Natal",
        "states" => null,
        "cities" => null,
    ],
    "02-11" => [
        "name"   => "Domingo de Carnaval",
        "states" => null,
        "cities" => null,
    ],
    "02-13" => [
        "name"   => "Terça-feira de Carnaval",
        "states" => null,
        "cities" => null,
    ],
    "02-14" => [
        "name"   => "Quarta-feira de Cinzas",
        "states" => null,
        "cities" => null,
    ],
    "03-30" => [
        "name"   => "Paixão de Cristo",
        "states" => null,
        "cities" => null,
    ],
    "03-31" => [
        "name"   => "Sábado de Aleluia",
        "states" => null,
        "cities" => null,
    ],
    "04-01" => [
        "name"   => "Domingo de Páscoa",
        "states" => null,
        "cities" => null,
    ],
    "05-31" => [
        "name"   => "Corpus Christi",
        "states" => null,
        "cities" => null,
    ],
    "07-09" => [
        "name"   => "Revolução Constitucionalista de 1932",
        "states" => [
            "SP",
        ],
        "cities" => null,
    ],
    "01-25" => [
        "name"   => "Aniversário de São Paulo",
        "states" => null,
        "cities" => [
            "3550308",
        ],
    ],
    "11-20" => [
        "name"   => "Consciência Negra",
        "states" => null,
        "cities" => [
            "3550308",
        ],
    ],
]
```

Contributing
------------

Caso você precise utilizar os feriados específicos de um município que ainda não consta aqui, abra uma issue informando todos os feriados do município solicitado + os feriados do respectivo estado. Farei o possível para incluir os feriados solicitados.

Mas, se você entendeu a lógica utilizada e quiser contribuir diretamente no código, envie seu pull request. Não esqueça de criar os testes unitários para cada provider criado.

Running Tests
-------------
Run a `php composer.phar install` command in the base directory to install the `phpunit` dependency. After that you can simply call `vendor/bin/phpunit tests/` to run the test suite.
