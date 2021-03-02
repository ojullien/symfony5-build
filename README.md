# Construisez un site web à l’aide du framework Symfony 4

## Setup

### Symfony certificate

Install certutil tool: `apt install libnss3-tools`

Install certificate: `symfony server:ca:install`

### Symfony CLI

Download and install CLI: `wget https://get.symfony.com/cli/installer -O - | bash`

Write into profile : `export PATH="$HOME/.symfony/bin:$PATH"`

## Creating Symfony applications

Install web-skeleton: `symfony new my_project_name --version=4.4 --full`

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
