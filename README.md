# Information
# Installation
## Get the bundle

Let Composer download and install the bundle by running
```sh
php composer.phar require brother/config-bundle:dev-master
```
in a shell.
## Enable the bundle
```php
// in app/AppKernel.php
public function registerBundles() {
	$bundles = array(
		// ...
		new Craue\ConfigBundle\CraueConfigBundle(),
        new Brother\ConfigBundle\BrotherConfigBundle('CraueConfigBundle'),
	);
	// ...
}
```
## Add the route to manage settings (optional)
You can either import the default routing configuration

```yaml
# in app/config/routing.yml
brother_config:
    resource: "@BrotherConfigBundle/Resources/config/routing.yml"
    prefix:   /
```
# Usage

## Defining settings
```
