#!/usr/bin/make

build: lint

lint:
	@flake8 hooks unit_tests
	@charm proof

clean:
	find -name *.pyc -delete
