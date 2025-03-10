# Laravel SaaS Template

## Development
Requires [Lando](http://docs.devwithlando.io)
1. Clone this repository.
2. Run `lando start`.
3. Install dependencies `lando composer install`
3. Setup your environment keys: Stripe, Mail, etc. `cp .env.example .env`.
4. Generate encryption key `lando artisan key:generate`.  
5. Run `lando artisan migrate --seed` for initial tables and seeds setup.
6. __Optional:__ To create a `super / root` admin; 
    Run `php artisan admin:assign-role youremail@example.org admin-root`. 
    Substitute `youremail@example.org` with an existing user email. `admin-root` is the __default root Admin role__. 

### Force HTTPS
When pushing the project to a platform or production environment, 
assets or urls may be broken if the platform enforces HTTPS.
 
To enable HTTPS:

Set `FORCE_HTTPS` variable in `.env` file to `true`. 

By default `FORCE_HTTPS` is `false`.

```Note: ``` If `FORCE_HTTPS` does not exist in your `.env`, 
just add it as a new variable and assign a boolean value `true` or `false`.

This dynamically tells Laravel to force urls to use HTTPS which is especially 
handy in fixing or preventing  broken assets urls.
