## GraphQl for Magento 2 Stripe Payments module
### Installation
- Composer:
```
composer require hevelop/stripe-module-payments-graphql
```
- Downloading module:
```
Download module from GitHub and copy/paste it under dir your_magento_root/app/code/Hevelop/StripeGraphQl
```

After installation, enable the module
```
bin/magento module:enable Hevelop_StripeGraphQl
```
upgrade your database:
```
bin/magento setup:upgrade
```
and compile the Magento dependency injection:
```
bin/magento setup:di:compile
```
