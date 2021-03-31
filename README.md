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
### Tested with
- [stripe/stripe-payments:2.5.4](https://marketplace.magento.com/stripe-stripe-payments.html)
- Magento 2.4.2
- [stripe/react-stripe-js:^1.4.0](https://stripe.com/docs/stripe-js/react)