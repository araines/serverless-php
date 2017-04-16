# serverless-php
[![serverless][badge-serverless]](http://www.serverless.com)
[![language][badge-language]](http://php.net)
[![license][badge-license]](LICENSE)

PHP for AWS Lambda via Serverless Framework using Symfony components for
dependency injection.

**Latest version is on [master][git-repo]**.

[AWS Lambda][aws-lambda-home] lets you run code without thinking about servers.
Right now you can author your AWS Lambda functions in several langauges
[natively][aws-lambda-langs], but not PHP. This project aims to provide a fully
featured shim for authoring your AWS Lambda functions in PHP.

More information about how this works and its performance characteristics can
be found on [my blog post][blog].

## Preview
```php
<?php

use Raines\Serverless\Context;
use Raines\Serverless\Handler;

class HelloHandler implements Handler
{
    public function handle(array $event, Context $context)
    {
        return [
            'statusCode' => 200,
            'body' => 'Hello World!',
        ];
    }
}
```


# Features
[Event Data](#Event-Data)   | [Context](#Ccontext)        | [Logging](#Logging)         | [Exceptions](#Exceptions)   | [Environment](#Environment)   | [API Gateway](#Api-Gateway)
:-------------------------: | :-------------------------: | :-------------------------: | :-------------------------: | :---------------------------: | :-------------------------:
![full][badge-support-full] | ![full][badge-support-full] | ![part][badge-support-part] | ![none][badge-support-none] | ![full][badge-support-full]   | ![full][badge-support-full]


# Usage
## Prerequisites
* [Serverless](https://serverless.com/)
* [Node](https://nodejs.org)
* [Composer](https://getcomposer.org/)
* [Git LFS](https://git-lfs.github.com/)

Install this project:
```
serverless install --url https://github.com/araines/serverless-php
```

## Deploying to AWS
```
composer install -o --no-dev
serverless deploy
```

## Running locally
```
serverless invoke local -f hello
```

## Running on AWS
```
serverless invoke -f hello
```


# Rebuilding PHP Binary
The PHP binary can be built with any flags you require and at any version.

## Prerequisites
* [Docker](https://www.docker.com/)

## Compiling
```
sh buildphp.sh
```

## Altering compile flags etc
Edit `buildphp.sh` and `dockerfile.buildphp` to alter it.


# Thanks
* [Robert Anderson][git-zerosharp] for the inspiration and base for this project


[badge-serverless]:   http://public.serverless.com/badges/v3.svg
[badge-language]:     https://img.shields.io/badge/language-php-blue.svg
[badge-license]:      https://img.shields.io/badge/license-MIT-orange.svg
[badge-support-full]: https://img.shields.io/badge/support-full-green.svg
[badge-support-part]: https://img.shields.io/badge/support-partial-yellow.svg
[badge-support-none]: https://img.shields.io/badge/support-none-red.svg

[aws-lambda-home]:  https://aws.amazon.com/lambda/
[aws-lambda-langs]: http://docs.aws.amazon.com/lambda/latest/dg/lambda-app.html#lambda-app-author

[git-repo]:      https://github.com/araines/serverless-php
[git-zerosharp]: https://github.com/ZeroSharp/serverless-php

[blog]: https://medium.com/@araines/serverless-php-630bb3e950f5
