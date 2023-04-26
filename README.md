Corona time app gives information about Covid-19. Users can register and log in and see daily updated information which represent worldwide and countries individual statistics.

#
### Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Project Structure](#project-structure)
* [Database Design Diagram](#project-structure)

#
### Prerequisites

* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@7.2 and up*
* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> *npm@6 and up*
* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2 and up*


#
### Tech Stack

* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@6.x](https://laravel.com/docs/6.x) - back-end framework
* <img src="https://github.com/RedberryInternship/example-project-laravel/raw/master/readme/assets/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation

#
### Getting Started
1\. First of all you need to clone E Space repository from github:
```sh
git clone https://github.com/RedberryInternship/giorgi-zanqaidze-corona-time
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

and also:
```sh
npm run dev
```
in order to build your JS/SaaS resources.

4\. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:

#
**MYSQL:**
>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****

##### Now, you should be good to go!


#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```

```sh
composer test
```

#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

when working on JS you may run:

```sh
  npm run dev
```
it builds your tailwind.js files into executable scripts.

#
### Project Structure

```bash
├─── app
│   ├─── Console
│   ├─── Exceptions
│   ├─── Http
│   ├─── Providers
│   │___ Rules
│   │... Models
├─── bootstrap
├─── config
├─── database
├─── node-modules
├─── packages
├─── public
├─── resources
├─── routes
├─── scripts
├─── storage
- .env
- artisan
- composer.json
- package.json
```

Project structure is fairly straitforward(at least for laravel developers)...

For more information about project standards, take a look at these docs:
* [Laravel](https://laravel.com/docs/6.x)

[Database Design Diagram]

<a href="https://ibb.co/M5s9jzd">Draw Sql</a>