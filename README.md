# read-rss
an application that reads and displays RSS feeds using Laravel 5.8 and MariaDB


# Pre-Install
Environment requirements
- MySQL or MariaDB
# Installation

## Clone this Repo
`git clone https://github.com/thangbk111/read-rss.git`
## Create a copy of your .env file
`cp .env.example .env`
## Generate an app encryption key
`php artisan key:generate`
## Change .env file

## Migrate Database
`php artisan key:generate`
## Run
`php artisan serve`
## Open Brower go to
`localhost:8000`

# CLI Mode Example Command
Show feeds list

`php artisan feed:list`

Remove feed by Feed Id = 5

`php artisan feed:delete 5`

Create feed with title='Feed Title' and link rss 'https://example.rss'
`php artisan feed:create 'Feed Title' https://example.rss`

Show all post in a feed has feedId = 1

`php artisan feed:display 1`
