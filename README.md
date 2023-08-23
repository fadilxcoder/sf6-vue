# Symfony 6 + Vue 3

## Developer notes

- `symfony new my-app --webapp`
- `composer require symfony/apache-pack`
- `composer req symfony/maker-bundle --dev`
- `composer require symfony/webpack-encore-bundle`
- `composer require --dev hautelook/alice-bundle`
- `php bin/console hautelook:fixtures:load`


```bash
$ nvm list

    17.5.0
  * 14.18.0 (Currently using 64-bit executable)

...
$ yarn install
yarn install v1.22.17

...
$ yarn add vue@^3 vue-loader vue-template-compiler ts-loader typescript --dev

...
$ php bin/console doctrine:query:sql "select * from post"
 ---- ------------- ------------------ ---------------------
  id   title         description        created_at          
 ---- ------------- ------------------ ---------------------
  1    morgan93      Sandy Prosacco     2023-08-22 18:55:56
  2    tsteuber      Lily Dibbert       2023-08-22 18:55:56
  3    erna39        Jayda Stamm        2023-08-22 18:55:56
  4    erin.ledner   Justyn Thiel       2023-08-22 18:55:56
  5    mwolf         Terry Johns        2023-08-22 18:55:56
  6    kaley86       Pat Fadel          2023-08-22 18:55:56
  7    rau.celia     Antonetta Pouros   2023-08-22 18:55:56
  8    samanta89     Tara Cummings      2023-08-22 18:55:56
  9    egoldner      Brown Osinski      2023-08-22 18:55:56
  10   pjast         Vernon Medhurst    2023-08-22 18:55:56
 ---- ------------- ------------------ ---------------------


```