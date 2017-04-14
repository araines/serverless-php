#!/bin/sh

# This script builds a docker container, compiles PHP for use with AWS Lambda,
# and copies the final binary to the host and then removes the container.
#
# You can specify the PHP Version by setting the branch corresponding to the
# source from https://github.com/php/php-src

PHP_VERSION_GIT_BRANCH=php-7.1.2

echo "Build PHP Binary from current branch '$PHP_VERSION_GIT_BRANCH' on https://github.com/php/php-src"

docker build --build-arg PHP_VERSION=$PHP_VERSION_GIT_BRANCH -t php-build -f dockerfile.buildphp .

container=$(docker create php-build)

docker -D cp $container:/php-src-$PHP_VERSION_GIT_BRANCH/sapi/cli/php .

docker rm $container