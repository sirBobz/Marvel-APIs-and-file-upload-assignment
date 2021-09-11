## Laravel Application
  
A simple Laravel Application demonstrating how to work with an external api with json, in this case displaying data of characters from Marvel API. 

The application also demonstrates how to upload a large Excel file to a database. This feature uses [***laravel excel package***] (https://github.com/maatwebsite/Laravel-Excel). The package helps us to validate the user input and load the file in a queue. Hence suited to upload a large file into a database.


##  :wrench: Setup

1. Clone this repository.
2. `cd` into it.
3. Install Composer Dependencies. `composer install`
4. Install NPM Dependencies.  `npm install`
5. Rename or copy `.env.example` file to `.env`
6. In order to use the Laravel app, you need to obtain a :key: [***Marvel API key***](https://developer.marvel.com/account).
7. Set your `MARVEL_API_PUBLIC_KEY` and `MARVEL_API_PRIVATE_KEY` in your `.env` file.  
7. Generate an app encryption key.  `php artisan key:generate`
8. `php artisan serve`
9. Visit `localhost:8000` in your browser.
10. Set up queue for file upload: I recommend redis queue driver.
11. Use the `php artisan queue:work` to start a queue worker and process new jobs as they are pushed onto the queue.
