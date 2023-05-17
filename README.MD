# MVC - Report for Zachary Mooney

This repository by Zachary Mooney is the report repository for the MVC (Objektorienterad webbteknologier) course at *Blekinge Tekniska Högskola*.

<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/build-status/master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/build.png?b=main" alt="Build Status" /></a>
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/coverage.png?b=main" alt="Code Coverage" /></a> 
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/quality-score.png?b=main" alt="Scrutinizer Code Quality" /></a></p>

## Contents

*About* - A brief introduction to the MVC course.
*Report* - My reports for each kursmoment.
*Lucky* - A random number is given to the user.
*Quote of the Day* - A new quote for every day!
*Card Game* - A simulation of a deck of cards.
*API* - A collection of data gathered on this website.
*Twenty-One* - Try your hand against the computer in this classic game of Twenty-One*
*Library* - Visit my simulated library. Explore how to link with database.
*Metrics* - A report on the metrics used for this website.
*Project* - The project for Kmom10.

## Tools and Command Lines

### SET-UP

npm run style
npm run build
php -S localhost:8888 -t public

phpcs -sw --standard=PSR1 file.php

### CLONING

For more information on how to clone to this site, you can visit https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository
Once cloned you can test it locally bu using *php -S localhost:8888 -t public*. 

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

###  SQL AND DOCTRINE

php bin/console make:migration
php bin/console doctrine:migrations:migrate

###  PHPMETRICS

tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json

