# Repository


[![packagist name](https://badgen.net/packagist/name/rikta/repository)](https://packagist.org/packages/rikta/repository)
[![version](https://badgen.net/packagist/v/rikta/repository/latest?label&color=green)](https://github.com/RiktaD/repository/releases)
[![php version](https://badgen.net/packagist/php/rikta/repository)](https://github.com/RiktaD/repository/blob/main/composer.json)

[![license](https://badgen.net/github/license/riktad/repository)](https://github.com/RiktaD/repository/blob/main/LICENSE.md)
[![GitHub commit activity](https://img.shields.io/github/commit-activity/m/riktad/repository)](https://github.com/RiktaD/repository/graphs/commit-activity)
[![open issues](https://badgen.net/github/open-issues/riktad/repository)](https://github.com/RiktaD/repository/issues?q=is%3Aopen+is%3Aissue)
[![closed issues](https://badgen.net/github/closed-issues/riktad/repository)](https://github.com/RiktaD/repository/issues?q=is%3Aissue+is%3Aclosed)

[![ci](https://badgen.net/github/checks/riktad/repository?label=ci)](https://github.com/RiktaD/repository/actions?query=branch%3Amain+workflow%3A%22Testing+Query%22+workflow%3Acreate-release++)
[![dependabot](https://badgen.net/github/dependabot/riktad/repository)](https://dependabot.com)
[![maintainability score](https://badgen.net/codeclimate/maintainability/RiktaD/repository)](https://codeclimate.com/github/RiktaD/repository)
[![tech debt %](https://badgen.net/codeclimate/tech-debt/RiktaD/repository)](https://codeclimate.com/github/RiktaD/repository/issues)
[![maintainability issues](https://badgen.net/codeclimate/issues/RiktaD/repository?label=maintainability%20issues)](https://codeclimate.com/github/RiktaD/repository/issues)


A basic abstraction for a repository/data-storage.

Essentially `get`,`set`&`delete` in one Interface that could use be any data-source.

Includes implementations for array-based & file-based (with & w/o caching) storage.

(mostly intended to be used alongside `rikta/query`)

## Installation 

`composer require rikta/repository`

## Usage

Take a look into [./tests/AbstractRepositoryTestCase.php](tests/AbstractRepositoryTestCase.php) until I have refined
the Readme ;)
