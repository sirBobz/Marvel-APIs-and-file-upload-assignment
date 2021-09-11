## Laravel Application
  
A simple Laravel Application demonstrating how to work with an external api with json, in this case displaying data of characters from Marvel API. 


##  :wrench: Setup

1. Clone this repository.
2. `cd` into it.
3. Install Composer Dependencies. `composer install`
4. Install NPM Dependencies.  `npm install`
5. Rename or copy `.env.example` file to `.env`
6. In order to use the Laravel app, you need to obtain an :key: [***Marvel API key***](https://developer.marvel.com/account).
7. Set your `MARVEL_API_PUBLIC_KEY` and `MARVEL_API_PRIVATE_KEY` in your `.env` file.  
7. Generate an app encryption key.  `php artisan key:generate`
8. `php artisan serve`
9. Visit `localhost:8000` in your browser.
