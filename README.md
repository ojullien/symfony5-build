# Construisez un site web à l’aide du framework Symfony 4

## Setup

### Symfony CLI

Download and install CLI: `wget https://get.symfony.com/cli/installer -O - | bash`

Write into profile : `export PATH="$HOME/.symfony/bin:$PATH"`

### Symfony certificate

Install certutil tool: `apt install libnss3-tools`

Install certificate: `symfony server:ca:install`

### WebDriver

Instal ChromeDriver and geckodriver if using [Panther component](https://github.com/symfony/panther): `apt-get install chromium-chromedriver firefox-geckodriver`

## Creating Symfony applications

Install web-skeleton: `symfony new my_project_name --version=current --full`

### The PHPUnit Testing Framework

Install the [PHPUnit Bridge component](https://symfony.com/components/PHPUnit%20Bridge): `composer require --dev symfony/phpunit-bridge`
Install the [Panther component](https://github.com/symfony/panther) if needed: `composer req --dev symfony/panther`
Read the [doc](https://symfony.com/doc/current/testing.html)
Create a test file `symfony console make:test`
Then use command:

```bash
# run all tests
php bin/phpunit
symfony php bin/phpunit
# run all tests in tests/Util
php bin/phpunit tests/Util
# run all tests in tests/Util/CalculatorTest.php
php bin/phpunit tests/Util/CalculatorTest.php
```

Note: *To use Panther with PHPUnit, uncomment the snippet registering the Panther extension in phpunit.xml.dist*

### Linter others tools

```bash
# Install
composer require --dev friendsofphp/php-cs-fixer
composer require --dev phpstan/phpstan
composer require --dev phpstan/phpstan-strict-rules
composer require --dev phpstan/phpstan-deprecation-rules
composer require --dev phpstan/phpstan-symfony
```

## Running Symfony Applications

Start php server: `symfony server:start` or `symfony serve -d`

Open your browser and navigate [to](https://localhost:8000/)

### The VarDumper Component

The VarDumper component provides mechanisms for extracting the state out of any PHP variables. Built on top, it provides a better dump() function that you can use instead of var_dump.

Start the server : `php bin/console server:dump`

Store the dumped data : `php bin/console server:dump --format=html > dump.html`

## Environnement

Read [doc](https://symfony.com/doc/current/configuration.html#creating-a-new-environment)

### Listing Environment Variables

`php bin/console debug:container --env-vars`

## Profileur Web

**Firefox strict content security policy will block the debug javascript!**

**Symfony do not inject debug bar when using direct response. Use twig!**

## Requêtes et réponses en Symfony

Utiliser [ttpFoundation](https://symfony.com/doc/current/components/http_foundation.html)

## La gestion du "routing"

Utiliser le composant [Routing](https://symfony.com/doc/current/components/routing.html)

Debugger: `php bin/console debug:router`

## Le controleur front

Utiliser le composant [HttpKernel](https://symfony.com/doc/current/components/http_kernel.html)

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

## TWIG

Read the docs about:

- [twig](https://twig.symfony.com/)
- [Forms](https://symfony.com/doc/current/forms.html)
- [Form types](https://symfony.com/doc/current/reference/forms/types.html)
- [Validation](https://symfony.com/doc/current/validation.html)
- [Validation Constraints](https://symfony.com/doc/current/reference/constraints.html)

Use the commands:

```bash
php bin/console debug:validator 'App\Entity\SomeClass'
php bin/console debug:validator src/Entity
```

## Databases and the Doctrine ORM

Read the [doc here](https://symfony.com/doc/current/doctrine.html)

### Configuring the Database

Update .env.local file and run the command `php bin/console doctrine:database:create`

### Creating an Entity Class

Uses the command: `php bin/console make:entity`

Note: If you prefer to add new properties manually, the make:entity command can generate the getter & setter methods for you: `php bin/console make:entity --regenerate`

### Creating the controller and the templates

Uses the command: `php bin/console make:crud`

### Creating the Database Tables/Schema

Uses this command to create the migration: `php bin/console make:migration`

Uses this command to run the migration: `php bin/console doctrine:migrations:migrate`

## Security

### Installation

Read the [doc](https://symfony.com/doc/current/security.html)

### Create your User Class

```bash
php bin/console make:user
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Generating the Login Form



## Get ready for production

### Clear the cache

```bash
php bin/console cache:clear`
php bin/console cache:clear --env=prod
```

### Customize Error Pages

Read the [documentation](https://symfony.com/doc/current/controller/error_pages.html)

### Checking Security Vulnerabilities

Use: `symfony check:security`
