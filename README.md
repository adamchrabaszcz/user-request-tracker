User Request Tracker
==============================

To launch application:
1. clone repository
2. do a `composer update`
3. setup database connections in `.env` and `phpunit.xml.dist`
4. create DB with `php bin/console doctrine:database:create`
5. launch migrations `php bin/console doctrine:migrations:migrate`
6. load fixtures (if needed, and **NOT** on production ;)) `php bin/console doctrine:fixtures:load`
7. go to `LOCALHOST/user-request-tracker/public/index.php/cool/stuff`
8. log in with details: `user1` / `pass1` (user is in_memory, for production purposes best to move it to DB)

To launch command:
`php bin/console app:send:email RECIPIENT_EMAIL`

To add the command to CRON:
`*/60 * * * * php PATH_TO_APP/bin/console app:send:email RECIPIENT_EMAIL`

You can also check the DB for the `RequestLog` entries.