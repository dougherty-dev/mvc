![Chihiro serves as aliased persona](https://raw.githubusercontent.com/dougherty-dev/mvc/refs/heads/main/public/build/images/chihiro-about.avif)

# MVC
## DV1608 V25 lp4 Objektorienterade webbteknologier

Här ges en gaffel av kursrepo för MVC @ BTH, omfattande kursmoment 01–06+10. Sajten avser implementera objektorienterad PHP medelst MVC med bruk av ramverket Symfony och mallsystemet Twig.

### Ingående moment

- Ramverk: introduktion till Symfony med enkla tillämpningar
- Objektorientering: kortklasser i PHP
- Applikation: PHPStan, PHPMD samt tillämpning i spelet 21 i MVC-mönster
- Enhetstestning: PHPUnit och WebTestCase
- ORM/Databas: Doctrine, med tillämpning i CRUD för ett litet bibliotek
- Automatiserad testning: PhpMetrics och Scrutinizer
- Projekt: Texas Hold’em, implementation av en mer komplicerad struktur

### Klona repo

I menyn ovan, välj <> Code och kopiera från Github CLI. Klistra därefter in i en terminal följande: **git clone https://github.com/dougherty-dev/mvc.git**

För att kunna köra sajten lokalt krävs PHP 8.2+ och Symfony 7.2+ med erforderliga paket, så som composer och npm. Kör därefter `composer install` samt `npm install` för att installera. Kommandot `symfony server:start` startar därefter servern. Alternativt brukar man en ordinarie server under Apache eller NGINX.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dougherty-dev/mvc/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/dougherty-dev/mvc/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/dougherty-dev/mvc/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/dougherty-dev/mvc/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/dougherty-dev/mvc/badges/build.png?b=main)](https://scrutinizer-ci.com/g/dougherty-dev/mvc/build-status/main)
