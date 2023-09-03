# Generate a controller
php artisan make:controller UserController
php artisan make:controller PhotoController --resource
php artisan make:controller PhotoController --model=Photo --resource
php artisan make:controller BookController --model=Book --resource --requests
php artisan make:controller BookController --model=Book -r -R
php artisan make:controller PhotoController --api

# Generate a model
php artisan make:model Flight
php artisan make:model Flight --migration

# Generate a model and a FlightFactory class...
php artisan make:model Flight --factory
php artisan make:model Flight -f

# Generate a model and a FlightSeeder class...
php artisan make:model Flight --seed
php artisan make:model Flight -s

# Generate a model and a FlightController class...
php artisan make:model Flight --controller
php artisan make:model Flight -c

# Generate a model, FlightController resource class, and form request classes...
php artisan make:model Flight --controller --resource --requests
php artisan make:model Flight -crR

# Generate a model and a FlightPolicy class...
php artisan make:model Flight --policy

# Generate a model and a migration, factory, seeder, and controller...
php artisan make:model Flight -mfsc

# Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...
php artisan make:model Flight --all

# Generate a pivot model...
php artisan make:model Member --pivot
php artisan make:model Member -p




