..  include:: /include.rst.txt

:project:
    Guides
:version:
    dev-main

======
Guides
======

This project contains a framework for rendering documentation. It provides a simple commandline tool to render
your documentation from `reStructuredText Markup <https://docutils.sourceforge.io/docs/ref/rst/restructuredtext.html>`__ and
`Markdown <https://daringfireball.net/projects/markdown/>`__. to HTML or LaTeX. And can be extended to support other
formats.

Besides the commandline tool it also provides a number of libraries that can be used to build your own application
to render the supported formats. To any format you want. On these pages is explained how to use the commandline tool
and how to use the libraries.


Standalone Installation
=======================

The commandline tool allows you start rendering your documentation without having to install any other software if
you have PHP installed.

To use the commandline tool you need to install it using `Composer <https://getcomposer.org/>`__::

.. code:: bash

    composer require --dev phpdocumentor/guides-cli

This will install the commandline tool in the vendor/bin directory. You can then use it as follows::

.. code:: bash

    vendor/bin/guides ./docs

The commandline tool is build for extension, if you do not have special needs this is the
recommended way to get started. You can learn more about how to extend the commandline tool in the :doc:`cli` section.

Library Installation
====================

If you are building your own application you can install the libraries using `Composer <https://getcomposer.org/>`__::

.. code:: bash

    composer require phpdocumentor/guides

This will install all basic libraries needed to get started to get started.
All libraries come with support for `Symfony dependency injection <https://symfony.com/doc/current/components/dependency_injection.html>`__.
This will help you to get started with the libraries in symfony applications.

Read more about writing your own application in the :doc:`developers` section.

.. tip::

    The following 3 steps let you render the documentation that you are currently reading using the framework you
    are currently reading about::

        git clone git@github.com:phpDocumentor/guides.git .
        composer install
        vendor/bin/guides

    You will then find the rendered documentation in the directory output.

.. toctree::
    :hidden:

    usage
    configuration
    extension/index
    rst-reference/index
    about
