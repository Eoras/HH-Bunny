# HH-Bunny
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg?style=flat-square)](https://paypal.me/PaulDSB/)

About
------------
Website for organizes raid on a game with random roll min-max and soft admin. I use sessions for administration, I will improve evolved admin system. For now we can only add dates, and make a random roll between a min and a max. Delete a Roll, and soon we can edit it.

Languages used
------------
[![Language](https://img.shields.io/badge/Language-Php-red.svg?style=flat-square)][1]
[![WebPackEncore](https://img.shields.io/badge/Dep-WebPack--Encore-blue.svg?style=flat-square)][3]

Installation
------------
[![PhpStorm](https://img.shields.io/badge/Software-PHPStorm-ff69b4.svg?style=flat-square)][2]

1. Rename `config.php.dist` to `config.php` and change `<...>` variables
2. Dump `roll.sql` >> on your database
3. Use `composer install` to install dependances
4. Use `npm install` to install dependances
5. I used WebpackEncore, you must to compile css and javascript, use `./node_modules/.bin/encore dev`
6. Enjoy

Screenshots:
------------
![Picture1](https://i.goopics.net/Pd0Ja.png)
--
![Picture2](https://i.goopics.net/4xdmb.png)
--
![Picture3](https://i.goopics.net/2YX1J.png)
--
![Picture4](https://i.goopics.net/oQwoe.png)

[1]: http://php.net/manual/en/intro-whatis.php
[2]: https://www.jetbrains.com/phpstorm/
[3]: https://github.com/symfony/webpack-encore