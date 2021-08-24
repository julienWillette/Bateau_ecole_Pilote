### Install

1. Clone the repository using "git clone "project_url""
2. Run `composer install`
3. Run `yarn install`
4. Run `yarn encore dev` to build assets
5. Create env.local (write DB name, DB password, DB username)
6. Connect the mailing system in the env.local (DSN : email adress & password)
7. If using your own email adress, please change in all contactcontroller, passwordresetcontroller and registrationcontroller the email adress with yours (same as in the env.local)
8. Run `php bin/console doctrine:database:create` to create database
9. Run `php bin/console make:migration` and `php bin/console doctrine:migrations:migrate` to update
10. Run `php bin/console doctrine:fixtures:load` to load fixtures
11. Run `symfony server:start` to launch the server


### Working

1. Run `symfony server:start` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets

### Testing

1. Run `.vendor/bin/phpcs` to launch PHP code sniffer
2. Run `.vendor/bin/phpstan analyse src --level max` to launch PHPStan
3. Run `.vendor/bin/phpmd src text phpmd.xml` to launch PHP Mess Detector
3. Run `./node_modules/.bin/eslint assets/js` to launch ESLint JS linter
3. Run `../node_modules/.bin/sass-lint -c sass-linter.yml -v` to launch Sass-lint SASS/CSS linter

## Built With

* [Symfony](https://github.com/symfony/symfony)


## Versioning

- Version 1 - 11/02/2021 

## Authors

Wild Code School students team :

## License

Copyright (c) 2021 BATEAU ECOLE PILOTE 
