#!/bin/bash

cd /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami

rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/build
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/cache

# Run API Docs
git clone git@github.com:Germangalia/CoinAutoTrader.git /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/CoinAutoTrader

php /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami.phar update /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/sami.php

cp -r /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/build/* /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/api

rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/build
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/cache

# Cleanup
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/build/sami/CoinAutoTrader