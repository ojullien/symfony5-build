# Construisez un site web à l’aide du framework Symfony 4

## Setup

### Symfony certificate

Install certutil tool: `apt install libnss3-tools`

Install certificate: `symfony server:ca:install`

### Symfony CLI

Download and install CLI: `wget https://get.symfony.com/cli/installer -O - | bash`

Write into profile : `export PATH="$HOME/.symfony/bin:$PATH"`

### The PHPUnit Testing Framework

 Install the [PHPUnit Bridge component](https://symfony.com/components/PHPUnit%20Bridge): `composer require --dev symfony/phpunit-bridge`
 Then use command:

```bash
# run all tests
php bin/phpunit
# run all tests in tests/Util
php bin/phpunit tests/Util
# run all tests in tests/Util/CalculatorTest.php
php bin/phpunit tests/Util/CalculatorTest.php
```

## Creating Symfony applications

Install web-skeleton: `symfony new my_project_name --full`

## Running Symfony Applications

Start php server: `symfony server:start` or `symfony serve -d`

Open your browser and navigate [to](https://localhost:8000/)

## Requêtes et réponses en Symfony

Utiliser [ttpFoundation](https://symfony.com/doc/4.4/components/http_foundation.html)

## La gestion du "routing"

Utiliser le composant [Routing](https://symfony.com/doc/4.4/components/routing.html)

Debugger: `php bin/console debug:router`

## Le controleur front

Utiliser le composant [HttpKernel](https://symfony.com/doc/4.4/components/http_kernel.html)

## Créer un controleur

Utiliser la console: `php bin/console make:controller`

## Autowire

```yaml
# config/services.yaml
parameters:
    admin_email: 'admin@openclassrooms.com'

# Suffisant pour que le MailLogger soit bien instancié.
services:
    _defaults:
        bind:
            $adminEmail: '%admin_email%'
```

## Utiliser le composant EventDispatcher qui implémente deux patterns de programmation objet : Observateur et Mediateur

Dans le cycle de vie d'une application Symfony, de nombreux événements sont disponibles pour vous permettre d'altérer le comportement de l'application. Parmi les plus utiles :

- kernel.request : envoyé avant que le contrôleur ne soit déterminé, au plus tôt dans le cycle de vie.
- kernel.controller : envoyé après détermination du contrôleur, mais avant son exécution.
- kernel.response : envoyé après que le contrôleur retourne un objet Response.
- kernel.terminate : envoyé après que la réponse est envoyée à l'utilisateur.
- kernel.exception : envoyé si une exception est lancée par l'application.

Chacun de ces événements va retourner une instance particulière de KernelEvent.

## Créez et déployez des événements spécifiques

Un événement est un objet quelconque, vous êtes libre d'utiliser n'importe quel objet tant qu'il étend la classe Event du composant EventDispatcher.
