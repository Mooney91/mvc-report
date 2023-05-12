# MVC - Report for Zachary Mooney

This repository by Zachary Mooney is the report repository for the MVC (Objektorienterad webbteknologier) course at *Blekinge Tekniska Högskola*.

<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/build-status/master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/build.png?b=main" alt="Build Status" /></a>
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/coverage.png?b=main" alt="Code Coverage" /></a> 
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/quality-score.png?b=main" alt="Scrutinizer Code Quality" /></a></p>

## Tools and Command Lines

### SET-UP

npm run build

php -S localhost:8888 -t public

phpcs -sw --standard=PSR1 file.php

### DETECT STYLE ISSUES

tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v

###  FIX STYLE ISSUES
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src

###  CODE ISSUES IN php

tools/phpmd/vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode

###  ALL FILES
tools/phpmd/vendor/bin/phpmd . text phpmd.xml

###  PHPSTAN

tools/phpstan/vendor/bin/phpstan analyse src

###  SQL

php bin/console make:migration
php bin/console doctrine:migrations:migrate

###  PHPMETRICS

tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json

