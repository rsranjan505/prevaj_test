Upgrading to 4.4 to 5.4

need to check 
firstly make depriciation free code
composer require --dev symfony/phpunit-bridge

Upgrade via composer
change the version from 4.4 to 5.4 in composer.json
then 
composer update "symfony/*" --with-all-dependencies
composer update