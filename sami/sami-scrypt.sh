 #!/bin/bash

cd /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami

rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/build
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/cache

# Run API Docs
git clone git@github.com:Germangalia/CoinAutoTrader.git /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/laravel

php /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami.php update /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/sami.php

cp -r /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/build/* /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/public/api

rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/build
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/cache

# Cleanup
rm -rf /home/ggalia84/Code/ProjecteFinal/CoinAutoTrader/sami/laravel
