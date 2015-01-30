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
        new Brother\ConfigBundle\BrotherConfigBundle(),
	);
	// ...
}
```

## Create the table

Preferably you do this by calling

```sh
# in a shell
php app/console doctrine:migrations:diff
php app/console doctrine:migrations:migrate
```

or

```sh
# in a shell
php app/console doctrine:schema:update
```

or however you like.

## Add the route to manage settings (optional)
You can either import the default routing configuration

```yaml
# in app/config/routing.yml
brother_config:
    resource: "@BrotherConfigBundle/Resources/config/routing.yml"
    prefix:   /
```

...or add your own to have full control over the URL pattern.

```yaml
# in app/config/routing.yml
brother_config_settings_modify:
  pattern: /settings/modify
  defaults:
    _controller: BrotherConfigBundle:Settings:modify
```

# Usage

## Defining settings

This bundle does _not_ provide functionality to create new settings because this would make no sense at runtime.
Those settings will be used in your application and thus code needs to be written for that.
This means that you have to create new settings in the database table `brother_config_setting` yourself, e.g. using a
migration.

## Managing settings' values

If you added the route described above you can manage the values of all defined settings in a simple form.
By default, you can access that form by browsing to `app_dev.php/settings/modify`.
But you probably want to limit access to this form in your security configuration.

## Reading settings

The bundle provides a service called `brother_config`. Inside of a controller you can call

```php
$this->get('brother_config')->get('name-of-a-setting')
```

to retrieve the value of the setting `name-of-a-setting`. Furthermore, you can call

```php
$this->get('brother_config')->all()
```

to get an associative array of all defined settings and their values.

```php
$this->get('brother_config')->getBySection('name-of-a-section')
```

will fetch only settings with the specified section (or those without a section if explicitly passing `null` for the name).

## Writing settings

With the same service you can set new values of settings:

```php
$this->get('brother_config')->set('name-of-a-setting', 'new value');
$this->get('brother_config')->setMultiple(array('setting-1' => 'foo', 'setting-2' => 'bar'));
```

Keep in mind that the setting has to be present, or an exception will be thrown.

## Usage in Twig templates

The Twig extension in this bundle supports reading settings directly in your template.

```html+jinja
{{ brother_setting('name-of-a-setting') }}
```

# Customization

## Redirect to a different page after submitting the built-in form

If you've enabled the build-in form, you can define where to redirect on successfully saving the changes by setting the
target route name:

```yaml
# in sonata admin confog
    dashboard:
        groups:
            group:
                - brother_config.admin.setting
                - brother_config.setting
# in app/config/parameters.yml
parameters:
  brother_config.redirectRouteAfterModify: brother_config_settings_modify
```

## Rendering of settings in sections

If you want to render settings in a group (called section here), you'll have to assign those settings a common section
name (in the database). Optionally, you can influence the order of these sections:

```yaml
# in app/config/parameters.yml
parameters:
  brother_config.configTemplate.sectionOrder: [section1, section2, section3]
```

Settings without a section will be rendered at first. Sections without explicit ordering are rendered at last.

## Translation

You can add translations for all settings (and sections) to be shown in the form by adding them to translation files
with the `BrotherConfigBundle` domain, e.g.

```yaml
# in app/Resources/BrotherConfigBundle/translations/BrotherConfigBundle.en.yml
name-of-a-setting: name of the setting

# in app/Resources/BrotherConfigBundle/translations/BrotherConfigBundle.de.yml
name-of-a-setting: Name der Einstellung
```
