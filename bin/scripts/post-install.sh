#!/usr/bin/env bash

if [ ! -f $PWD/composer.json ]; then
    echo "Run this script from the project root directory."
    exit 1;
fi

cp -n app/config/dist/.local.yml app/config/.local.yml; > /dev/null

if [ ! -e ./bin/console ]; then
    ln -s ./../app/launcher/console.php ./bin/console
    chmod +x ./bin/console
fi

if [ ! -e ./bin/doctrine ]; then
    ln -s ./../app/launcher/doctrine.php ./bin/doctrine
    chmod +x ./bin/doctrine
fi
