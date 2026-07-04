# LHxC

Wordpress theme for Louisville Hardcore.com - a Louisville, KY focused music site covering Punk, Hardcore, and Indie Rock of the region.

![phpcs](https://github.com/bryanjvolz/LHxC//actions/workflows/phpcs.yml/badge.svg)

## Linting

This project is set up for using PHPCS and rules from the Wordpress Coding Standards

To install: `composer install`
To scan: `composer lint`
To automatically fix: `composer fix`

## Events API

The Events API is a RESTful API that allows for the creation, retrieval, updating, and deletion of events.

### Endpoints
* `/wp-json/lhxc/v1/events?venue=Mag Bar` - Retrieve a list of all events at the Mag Bar
* `/wp-json/lhxc/v1/events?start_date=2026-05-02` - Retrieve a list of all events starting on May 2, 2026
* `/wp-json/lhxc/v1/events?id=9315` - Retrieve a single event by ID


## Notes
* Commenting has been removed. Templates will need to be re-added in the future to reintroduce feature
