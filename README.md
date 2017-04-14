# serverless-php
PHP for AWS Lambda via Serverless Framework using Symfony components for
dependency injection.

This repository is set up with [Git LFS](https://git-lfs.github.com/) for the
php executable, so make sure you have it installed and supported.

## Prerequisites
* [Serverless](https://serverless.com/)
* [Node](https://nodejs.org)
* [Composer](https://getcomposer.org/)

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
