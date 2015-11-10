# GitHub demo

Simple PHP web application written primarily for my job interview purposes.

Uses GitHub API, Latte templates and mardix/Paginator.

## Features
* search for desired GitHub user's repositories and show basic info about them
* search history with paging
* delete history records 'older than x hours' function with really simple protection

It speaks to user in czech only.

## Requirements
* PHP 5.4+ with PDO and cURL extensions

### composer.json

    "require": {
      "php": ">= 5.4",
      "latte/latte": "~2.3.0",
      "knplabs/github-api": "~1.4",
      "mardix/paginator": "2.*"    
    }
    
## Installation
- clone or download project
- use 'composer update' in project directory to obtain necessary libraries
- set proper database connection values in ./engine/init.php
- import SQL data from ./dump.sql

I promise installation will be smoother in another new project :-)
