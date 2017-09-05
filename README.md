TangoMan List Manager
====================

**TangoMan List Manager** provides an easy way to manage searchable, ordered, paginated lists in your app.
**TangoMan List Manager** makes building back-office for your app a brease.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require tangoman/list-manager-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    // ...

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new TangoMan\ListManagerBundle\TangoManListManagerBundle(),
        );

        // ...
    }
}
```

Step 3: Place use statement in the controller
---------------------------------------------

```php
use TangoMan\ListManagerBundle\Model\SearchForm;
use TangoMan\ListManagerBundle\Model\SearchInput;
use TangoMan\ListManagerBundle\Model\SearchOption;
use TangoMan\ListManagerBundle\Model\Thead;
use TangoMan\ListManagerBundle\Model\Item;
```

Step 4: Build object in the controller
--------------------------------------

```php
<?php
// AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

// ...

class DefaultController extends Controller
{
    /**
     * @Route("/user/index")
     */
    public function indexAction()
    {
        // ...

        $form = new SearchForm();

        // Number
        $input = new SearchInput();
        $input->setLabel('Id')
            ->setName('e-id')
            ->setType('number');
        $form->addInput($input);

        // Text
        $input = new SearchInput();
        $input->setLabel('User')
            ->setName('user-username');
        $form->addInput($input);

        // Text
        $input = new SearchInput();
        $input->setLabel('Email')
            ->setName('user-email');
        $form->addInput($input);

        // Select
        $input = new SearchInput();
        $input->setLabel('Role')
            ->setName('roles-type');
        $option = new SearchOption();
        $option->setName('All');
        $input->addOption($option);
        $option = new SearchOption();
        $option->setName('Super Admin')
            ->setValue('ROLE_SUPER_ADMIN');
        $input->addOption($option);
        $option = new SearchOption();
        $option->setName('Admin')
            ->setValue('ROLE_ADMIN');
        $input->addOption($option);
        $option = new SearchOption();
        $option->setName('Super Utilisateur')
            ->setValue('ROLE_SUPER_USER');
        $input->addOption($option);
        $option = new SearchOption();
        $option->setName('Utilisateur')
            ->setValue('ROLE_USER');
        $input->addOption($option);
        $form->addInput($input);

        // Submit
        $input = new SearchInput();
        $input->setLabel('Filtrer')
            ->setType('submit')
            ->setIcon('glyphicon glyphicon-search');
        $form->addInput($input);

        // Optionally use json format
        $thead = '{
            "items": [
                {
                    "name": "username",
                    "label": "User",
                    "route": "app_user_index"
                },
                {
                    "name": "email",
                    "label": "Email",
                    "route": "app_user_index"
                },
                {
                    "label": "Actions",
                    "colspan": 2
                }
            ]
        }';

        return $this->render(
            'user/index.html.twig',
            [
                'form' => $form,
                'thead' => $thead,
                'users' => $users,
            ]
        );
    }
}
```

Step 5: Integrate in Twig
-------------------------

```twig
<div id="search-form" class="jumbotron">
    {{ searchForm(form) }}
</div>
```

```twig
<table class="table table-striped">
    {{ thead(thead) }}
    <tbody>
    {% for user in users %}
        <tr>
            <td>
            ...
```

Note
====

If you find any bug please report here : [Issues](https://github.com/TangoMan75/ListManagerBundle/issues/new)

License
=======

Copyrights (c) 2017 Matthias Morin

[![License][license-GPL]][license-url]
Distributed under the GPLv3.0 license.

If you like **TangoMan List Manager** please star!
And follow me on GitHub: [TangoMan75](https://github.com/TangoMan75)
... And check my other cool projects.

[tangoman.free.fr](http://tangoman.free.fr)

[license-GPL]: https://img.shields.io/badge/Licence-GPLv3.0-green.svg
[license-MIT]: https://img.shields.io/badge/Licence-MIT-green.svg
[license-url]: LICENSE
