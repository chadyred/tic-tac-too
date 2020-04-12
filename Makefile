DOCKER_COMPOSE := $(shell which docker-compose)
SUB_MAKE := $(shell which make)

.PHONY: run/%
run/%:
	$(DOCKER_COMPOSE) run --rm $*

.PHONY: install
install: .install

.install: vendor/autoload.php
	> .install

vendor/autoload.php:
	$(SUB_MAKE) run/'composer composer install'

.PHONY: test-watch
test-watch: bin/phpspec-watcher ## Run test watch
	$(SUB_MAKE) run/'php-cli bin/phpspec-watcher watch'

bin/phpspec-watcher: vendor/autoload.php

stop: ## Stop docker containers and remove stale like docker container created out of the box through the docker-compose
	@$(DOCKER_COMPOSE) down --remove-orphans
