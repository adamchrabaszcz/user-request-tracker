User Request Tracker
==============================

To launch application:
1. clone repository
2. do a `composer update`
3. setup database connections in `.env` and `phpunit.xml.dist`
4. go to `LOCALHOST/user-request-tracker/public/index.php/cool/stuff`
5. log in with details: `user1` / `pass1`

To launch command:
`php bin/console app:send:email RECIPIENT_EMAIL`

To add the command to CRON:
`*/60 * * * * php PATH_TO_APP/bin/console app:send:email RECIPIENT_EMAIL`

You can also check the DB for the `RequestLog`