# PHP Workouts

In the following directory are located software engineering workouts which are written in PHP.

## Setup

There are numerous ways you could setup the project, I will show you my workflow.

Install Docker and Docker Compose.

Build the PHP image:

```shell
docker-compose build php
```

Run the PHP image

```shell
# Install dependencies
docker-compose run --rm php composer install

# Run Code Quality Checks
docker-compose run --rm php composer code:quality:check

# Run Unit Tests
docker-compose run --rm php composer code:test
```

Bonus:

If you are using PHPStorm as your PHP IDE you can take the advantage of PHPStorm's Remote Interpreter functionality and configure PHP from docker-compose.yml to be your remote interpreter. You will be able to run tests from within the IDE and use XDebug for troubleshooting the code.
