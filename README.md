Chronos
=================

[![Build Status](https://travis-ci.org/Zazalt/Chronos.svg?branch=master)](https://travis-ci.org/Zazalt/Chronos)
[![Coverage Status](https://coveralls.io/repos/github/Zazalt/Chronos/badge.svg?branch=master)](https://coveralls.io/github/Zazalt/Chronos?branch=master)
[![Code Climate](https://codeclimate.com/github/Zazalt/Chronos/badges/gpa.svg)](https://codeclimate.com/github/Zazalt/Chronos)
[![Issue Count](https://codeclimate.com/github/Zazalt/Chronos/badges/issue_count.svg)](https://codeclimate.com/github/Zazalt/Chronos/issues)
[![Total Downloads](https://poser.pugx.org/zazalt/chronos/downloads)](https://packagist.org/packages/zazalt/chronos/stats)
[![Latest Stable Version](https://poser.pugx.org/zazalt/chronos/v/stable)](https://packagist.org/packages/zazalt/chronos)
![Version](https://img.shields.io/badge/version-beta-yellow.svg)

Chronos is a PHP library/package for date and time management.

Requirements
---------------
* php >= 7.1.0

Packagist Dependencies
---------------
* None

Installation
---------------
With composer:
``` json
{
	"require": {
		"zazalt/chronos": "dev-master"
	}
}
```

## Usage
```php

$Chronos = new Zazalt\Chronos\Chronos();

/**
 * Transform/parse a human date to machine date (Y-m-d)
 * 	eg: 28.09.2013 (d.m.Y) => 2013-09-28
 *
 * @return  string
 */
$Chronos->dateToMachineDate($datetime, $humanFormat);

/**
 * Transform/parse a human date to machine date (Y-m-d H:i:s)
 * 	eg: 28.09.2013 23:41:12 => 2013-09-28 23:41:12
 *
 * @return  string
 */
$Chronos->dateToMachineDateTime($datetime, $humanFormat);

/**
 * Transform/parse a machine date to human date
 * 	eg: 01.09.2013 => 2013-09-01
 *
 */
$Chronos->dateToHuman($datetime, $humanFormat);

/**
 * Return days number between two dates
 *
 * @return  integer
 *
 */
$Chronos->daysBetweenTwoDates($startDate, $endDate);

/**
 * Return months number between two dates
 *
 * @return  integer
 */
$Chronos->monthsBetweenTwoDates($startDate, $endDate);

/**
 * Return years number between two dates
 *
 * @return  integer
 */
$Chronos->yearsBetweenTwoDates($startDate, $endDate);

/**
 * Not implemented/documented, yet!
 */
$Chronos->seconds2HMS($secs);
```