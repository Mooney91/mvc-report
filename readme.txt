npm run build

php -S localhost:8888 -t public

phpcs -sw --standard=PSR1 file.php

// DETECT STYLE ISSUES

tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v

// FIX STYLE ISSUES
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src

// CODE ISSUES IN php

tools/phpmd/vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode

// ALL FILES
tools/phpmd/vendor/bin/phpmd . text phpmd.xml

// PHPSTAN

tools/phpstan/vendor/bin/phpstan analyse src

// SQL

php bin/console make:migration
php bin/console doctrine:migrations:migrate

// PHPMETRICS

tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json

---------------------------------------------------
