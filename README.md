Toolbox
=======

A Symfony 2 project created on May 26, 2015, 8:38 pm.

For internal and application purposes only. 

First, you shall have a fully working Symfony2 environment. Symfony2 modules are shipped as "bundles", so this is a full functional bundle.
You only need to add this bundle into your 

[SymfonyProjectFolder]/src

folder and tell Symfony2 that there is a new bundle and how to use:

[/app/config/routing_dev.yml]
bullport:
    resource: "@BullportBundle/Controller/"
    type:     annotation

and

[/app/AppKernel.php]
new BullportBundle\BullportBundle()

in order to make it work. You shall have symlinked your bundles resources to web directory. If you didn't do it already, now is a good chance to do so:

[SymfonyProjectFolder]/app/console assets:install web --symlink

If you don't want to do so, please copy all css files from /src/BullportBundle/Resources/public/css to /web/bundles/bullport/css

After install, open your browser window, navigate to [Your local Symfony project]/bullport to visit Bundle's home page.
