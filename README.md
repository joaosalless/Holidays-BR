Joaosalless/Holiday
===================

Joaosalless/Holiday é uma biblioteca Php que serve para verificar se existem feriados em uma determinada data. A biblioteca conta com todos os feriados nacionais incluindo os feriados de datas variáveis.

Esta biblioteca é modular. Os feriados Estaduais e municipais serão incluídos na medida do possível.

Esta biblioteca foi desenvolvida baseada no projeto [https://github.com/checkdomain/Holiday](https://github.com/checkdomain/Holiday), adaptando-o para suportar também os feriados municipais.

Requirements
------------
Joaosalless/Holiday requires php >= 7.0.

Usage
-----
Para verificar se há feriados em uma determinada data, apenas instancie a classe Util e chame o método `getHoliday()`.

```php
$util    = new \Joaosalless\Holiday\Util();
$holiday = $util->getHoliday('BR', '01.01.2018');
```

Se você só precisa saber se há um feriado na sua data, também existe um método `isHoliday()`.

```php
$util    = new \Joaosalless\Holiday\Util();
$holiday = $util->isHoliday('BR', '01.01.2018');
```

Se você precisa saber todos os feriados para um país, estado ou município específico, você pode instanciar um dos provedores incluídos e chamar o método `getHolidaysByYear()` . Todos os provedores devem seguir a interface `ProviderInterface` .

Contributing
------------

Caso você precise utilizar os feriados específicos de um município que ainda não consta aqui, abra uma issue informando todos os feriados do município solicitado + os feriados do respectivo estado. Farei o possível para incluir os feriados solicitados.

Mas, se você entendeu a lógica utilizada e quiser contribuir diretamente no código, envie seu pull request. Não esqueça de criar os testes unitários para cada provider criado.

Running Tests
-------------
Run a `php composer.phar install` command in the base directory to install the `phpunit` dependency. After that you can simply call `vendor/bin/phpunit tests/` to run the test suite.
