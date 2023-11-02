# Codeigniter 4 deploy on shared hosting


## Default directory structure on local
```php
 project-root/
    app/
        Config/             # Configuration files
        Controllers/        # Controllers
        Database/           # Database migrations and seeds
        Filters/            # Request and response filters
        Helpers/            # Helper functions
        Libraries/          # Custom libraries
        Models/             # Model classes
        ThirdParty/         # Third-party packages
        Views/              # View templates
    public/
        assets/
        images/
        .htaccess           # Apache server configuration (for clean URLs)
        index.php           # Application entry point
    writable/               # Writable directory for logs, sessions, and caches
    composer.json           # Composer configuration file
    spark                   # Command-line tool for CodeIgniter
    spark.bat               # Windows version of the spark command

```

## Directory structure on shared hosting (public_html - directory)
here <b>ci4_app</b> is name given to directory you can rename anything

```php
    assets/
    images/
    .htaccess           # Apache server configuration (for clean URLs)
    index.php           # Application entry point

 ci4_app/
    app/
        Config/             # Configuration files
        Controllers/        # Controllers
        Database/           # Database migrations and seeds
        Filters/            # Request and response filters
        Helpers/            # Helper functions
        Libraries/          # Custom libraries
        Models/             # Model classes
        ThirdParty/         # Third-party packages
        Views/              # View templates
    public/
        .htaccess           # Apache server configuration (for clean URLs)
        index.php           # Application entry point
    writable/               # Writable directory for logs, sessions, and caches
    composer.json           # Composer configuration file
    spark                   # Command-line tool for CodeIgniter
    spark.bat               # Windows version of the spark command

```

## Changes in index.php file (public_html/index.php copied from public folder)


from:
```php
require FCPATH . '../app/Config/Paths.php';
```
to: ( <b>ci4_app</b> directory name of app)
```php
require FCPATH . 'ci4_app/app/Config/Paths.php';
```

## Changes in .env file (public_html/ci4_app/.env)

from:
```env
CI_ENVIRONMENT = development
app.baseURL = 'http//:localhost:8080/'

#or 
#app.baseURL =''
```

to:
```env
CI_ENVIRONMENT = production

app.baseURL = 'http://somewebsite.com/'
```

## database changes (optional) - Changes in .env file (public_html/ci4_app/.env)

from:
```env
# database.default.hostname = localhost
# database.default.database = ci4
# database.default.username = root
# database.default.password = root
# database.default.DBDriver = MySQLi
# database.default.DBPrefix =
# database.default.port = 3306
```

to:
```env
 database.default.hostname = localhost
 database.default.database = name_of_database_server
 database.default.username = name_of_database_user_server
 database.default.password = password_of_database_server
 database.default.DBDriver = MySQLi
 database.default.DBPrefix =
 database.default.port = 3306
```
