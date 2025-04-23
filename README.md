# PHP Protect Page Examples

This is an example project that shows how to use PHP to protect a page from
being accessed using a number of different techniques.

The one requirement in these techniques is preventing access to a page without
using any authentication systems.

Note: We do make use of Basic Authentication here, but only because it is so
simple to implement.

## Running The Project

This project is set up as a self-contained system that uses [DDEV](https://ddev.readthedocs.io/en/latest/users/install/ddev-installation/)
to run. In order to run this project you need to install that system first. Once
you have DDEV installed then following the following steps.

- Open up a command line and navigate to the directory that you added the project
to.
- Run `ddev start` to start the project. If you are starting for the first time
then this will download everything you need before starting the project.
- Once everything is installed you can visit https://php-protect.ddev.site/ or
run `ddev launch`, which will open a browser  and take you to that URL.

When you are finished using the project, run `ddev delete` to remove everything.

## Usage

The project is split into a number of different techniques for protecting a page.
These are as follows:

- Basic Auth
- Cookie
- CSRF
- Dynamic Link
- Form
- IP
- JWT
- Referrer

## More Information

Please see [Protecting A Page From Being Directly Accessed With PHP](https://www.hashbangcode.com/article/protecting-page-being-directly-accessed-php) for a detailed breakdown of this project.
