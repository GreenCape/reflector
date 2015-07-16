# Reflector

![SensioLabsInsight](https://insight.sensiolabs.com/projects/838a9f83-7b8d-4f81-a729-332c9a1e092a/mini.png)
[![Code Climate](https://codeclimate.com/github/GreenCape/reflector/badges/gpa.svg)](https://codeclimate.com/github/GreenCape/reflector)
[![Test Coverage](https://codeclimate.com/github/GreenCape/reflector/badges/coverage.svg)](https://codeclimate.com/github/GreenCape/reflector/coverage)
[![Latest Stable Version](https://poser.pugx.org/greencape/reflector/v/stable.png)](https://packagist.org/packages/greencape/reflector)
[![Build Status](https://api.travis-ci.org/GreenCape/reflector.svg?branch=master)](https://travis-ci.org/greencape/reflector)

Reflector is a wrapper to the Reflection classes for accessing non-public properties and methods for testing.

## Installation

### Composer

Simply add a dependency on `greencape/reflector` to your project's `composer.json` file if you use
[Composer](http://getcomposer.org/) to manage the dependencies of your project. Here is a minimal example of a
`composer.json` file that just defines a dependency on Joomla CLI:

    {
        "require-dev": {
            "greencape/reflector": "*@stable"
        }
    }

For a system-wide installation via Composer, you can run:

    composer global require --dev 'greencape/reflector=*'

Make sure you have `~/.composer/vendor/bin/` in your path.

## Usage Examples

See `tests/ReflectorTest.php` for information about how to use Reflector.
