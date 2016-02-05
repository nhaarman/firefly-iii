---
layout: page
title: Installation guide
permalink: /installation-guide/
---

# Normal installation

Have you seen the [system requirements](../system-requirements/)? If so, please continue!

## Installation steps

Login to your web server and go to the directory where you want to install Firefly III. Please keep in mind that the web root of Firefly III is in the ``firefly-iii/public/`` directory, so you may need to update your web server configuration.

Once you're there, run the following command:

* ``git clone https://github.com/JC5/firefly-iii.git . --depth 1``

Or variants:

* ``git clone https://github.com/JC5/firefly-iii.git some-other-dir --depth 1``
* ``git clone https://github.com/JC5/firefly-iii.git --depth 1`` (defaults to ``firefly-iii``)

***

 Then, run this command:

``copy firefly-iii/.env.example firefly-iii/.env``

Open ``firefly-iii/.env``.

* Change the ``DB_*`` settings as you see fit.
* Update the ``MAIL_*`` settings as you see fit.
* If you want to track statistics, update the Google Analytics ID.
* Set ``RUNCLEANUP`` to ``false``
* Set ``SITE_OWNER`` to your own email address.

Once you've set this up, run the following commands:

* ``cd firefly-iii`` (or how you've named your folder)
* ``composer install``
* ``php artisan migrate --seed --env=production``

Finally, make sure that the storage directories are writeable, _for example_ by using these commands:

* ``chown -R www-data:www-data storage``
* ``chmod -R g+w storage``

### Registering

Surf to your web server, the ``public/`` directory is your root. You may want to change your web server's configuration so you can surf to ``/`` and get Firefly.

You will see a Sign In screen. Use the Register pages to create a new account. After you've created a new account, you will get an introduction screen.

## Installation errors

Some common errors:

### 500 errors, logs are empty

If the logs are empty (``storage/logs``) Firefly can't write to them. See above for the commands. If the logs still remain empty, do you have a the ``vendor`` in your Firefly root? If not, run the Composer commands.

### Unexpected question mark

```
PHP Parse error:  syntax error, unexpected '?' in 
app/Support/Twig/General.php on line 103
```

Firefly III requires PHP 7.0.0.

### BCMath

```
PHP message: PHP Fatal error: Call to undefined function 
FireflyIII\Http\Controllers\bcscale() in
firefly-iii/app/Http/Controllers/HomeController.php on line 76
```

Solution: you haven't enabled or installed the BCMath module.

### intl

Errors such as these:

```
production.ERROR: exception 
'Symfony\Component\Debug\Exception\FatalErrorException' with message
'Call to undefined function FireflyIII\Http\Controllers\numfmt_create()'
in firefly-iii/app/Http/Controllers/Controller.php:55
```

Solution: You haven't enabled or installed the Internationalization extension.