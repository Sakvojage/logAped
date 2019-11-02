# logAped

## Preconditions
In order to use this application CLI access to the hosting servier is required. Also make sure Composer and PHP >7.1 is installed. 


## Installation

1. Clone this repo to PHP server with `git clone ...`
2. Run `Composer install`
3. Edit `.env` file
4. Run `php artisan migrate`

## Usage

This app has fully populated CRUD endpoint `/api/log`. So sending 
```
POST http://127.0.0.1:8000/api/log
Content-Type: application/json

{
    "version": "Versija 55",
    "file": "something.bin"
}
```
will result creating a log record and 

```
GET http://127.0.0.1:8000/api/log
Content-Type: application/json
```
will return a list of log records


Also very basic front-end table is present at `http://127.0.0.1:8000/home`. You will need to register in order to see it.
