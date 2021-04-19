# Money Pal

| <!-- -->    | <!-- -->    |
:-------------------------:|:-------------------------:
![Money_Pal_Overview](https://user-images.githubusercontent.com/39175284/115203461-93d8a500-a14b-11eb-87f3-ced32dddd6d8.jpg)  |  ![MoneyPal_Transactions](https://user-images.githubusercontent.com/39175284/115203469-96d39580-a14b-11eb-93f8-4c48776c12dd.jpg)
![MoneyPal_CreateTransaction](https://user-images.githubusercontent.com/39175284/115203480-99ce8600-a14b-11eb-8107-420b9a98c41f.jpg)  |


## A Laravel finance app for everyday use

Money pal is a manager for your personal finances. It helps keep track of your income and expenses, allowing you to set goals for each month.

While Money Pal is stil in developement, it is built with Laravel, VueJS and TailwindCSS.

### Installation
* `git clone https://github.com/benlittlenz/moneypal.git`
* `composer install`
* * `npm install`
* `cp .env.example .env`
* `php artisan key:generate`
* Create a MySQL database
* Update `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` in your `.env` file.
* `php artisan migrate`