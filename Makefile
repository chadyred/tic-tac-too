DOCKER_COMPOSE := $(shell which docker-compose)
SUB_MAKE := $(shell which make)

.PHONY: bin/%
bin/%:
	$(DOCKER_COMPOSE) run --rm $*

.PHONY: install
install: .install

.install: vendor/autoload.php
	> .install

vendor/autoload.php:
	make bin/'composer composer install'
