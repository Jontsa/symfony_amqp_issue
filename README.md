# How to reproduce error

```
composer install
docker-compose up
bin/console app/dispatch -vv
bin/console messenger:consume async -vv
```

Consumer should fail with error `Server channel error: 406, message: PRECONDITION_FAILED - unknown delivery tag 10` after last message.
