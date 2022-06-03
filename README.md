# limo-brokerage
Open source Limo Brokerage application

## Overview (Design)
The application allows administrators to create a service request, which gets assigned a unique reservation index (RID), along with: Pickup info, Drop off info, Pickup & Dropoff time, and a customer name. When assigned to a driver (who has a vehicle image, vehicle color, passenger limi, and service type), a total cost can also be set for the linked reservation. The service operator can also specify ground rules for their service. Finally, an email (or SMS) can be sent to the service operator, which contains a "magic link", and allows said operator to view and thus confirm the details of the reservation.

## Details (Engineering)
The application is engineered as a monolith, made with FuelPHP and uses MySQL for database operation. Delight-im/auth is used for authentication, BundleFU is used to generate JS+CSS bundles, and blazed-space/ice is used for general utility.

## Using
To use, you must have PHP 5.4+ Installed, as well as Composer.
You must also have Node.js+NPM installed to run the installer. If you do not have Node, you can also install manually with Composer.

Run the following command to install dependencies (at the root directory):
```shell
npm run install
```

To update run,

```shell
npm run update
```

## Developing
To run a local development server on default port 8000 run,

```shell
npm run dev
```

## Deployment
When deploying to production servers, be sure to change the environment. This can either be done in /src/app/bootstrap.php or by overriding using the following apache directive:

```
SetEnv FUEL_ENV production
```

Or, if using NGINX, add the following in /etc/nginx/sites-available:

```
location ~ \.php$ {
    fastcgi_param FUEL_ENV production;
}
```

## Special Thanks
This project uses:
- [FuelPHP](https://fuelphp.com/)
- [BundleFU](https://github.com/dotsunited/BundleFu)
- [Delight-im Auth](https://github.com/delight-im/PHP-Auth)
- [TailwindCSS](https://tailwindcss.com/)
- [Kitwind](https://kitwind.io/products/kometa/)
- [MambaUI](https://mambaui.com/)

Development Team:
- [Tyler Ruff](https://github.com/tyler-ruff)
- [Matthew Ruff](https://github.com/matt-ruff)
- [Blazed Labs](https://github.com/blazed-labs)
- [Blazed Space](https://github.com/blazed-space)
- [Blazed Publishing](https://github.com/blazed-xyz)