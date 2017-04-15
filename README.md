# serverless-php
[![serverless](http://public.serverless.com/badges/v3.svg)](http://www.serverless.com)
[![php](https://img.shields.io/badge/language-php-blue.svg)](http://php.net)

PHP for AWS Lambda via Serverless Framework using Symfony components for
dependency injection.

This is version 0.1, see [master](https://github.com/araines/serverless-php)
for the latest.

See [my blog post](https://medium.com/@araines/serverless-php-630bb3e950f5)
for more information.

This repository is set up with [Git LFS](https://git-lfs.github.com/) for the
php executable, so make sure you have it installed and supported.

## Prerequisites
* [Serverless](https://serverless.com/)
* [Node](https://nodejs.org)
* [Composer](https://getcomposer.org/)

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
* [Robert Anderson](https://github.com/ZeroSharp/serverless-php) for the
inspiration and base for this project
