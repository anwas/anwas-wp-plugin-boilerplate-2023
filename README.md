![GitHub contributors](https://img.shields.io/github/contributors/anwas/anwas-wp-plugin-boilerplate-2023) ![GitHub last commit](https://img.shields.io/github/last-commit/anwas/anwas-wp-plugin-boilerplate-2023) ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/anwas/anwas-wp-plugin-boilerplate-2023)

# Very Important

All plugin code is provided as is. The developer of the plugin accepts no responsibility for any corruption or loss of data. Use this code at your own risk.

# Anwas WordPress Plugin Boilerplate 2023

The goal is still a standardized, organized, object-oriented foundation for building high-quality WordPress Plugins.

## Features

-   The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/), and [Documentation Standards](https://developer.wordpress.org/coding-standards/inline-documentation-standards/).
-   The plugin is 100% [WPCS (WordPress Code Sniffer)](https://github.com/WordPress/WordPress-Coding-Standards) Compliant.
-   All classes, functions, and variables are documented so that you know what you need to change.
-   The Boilerplate uses a strict file organization scheme that makes it easy to organize the files that compose the plugin.
-   The project includes a `.pot` file as a starting point for internationalization.

## How to Create a Plugin

The Anwas WordPress Plugin Boilerplate 2023 (everything _inside and inclusive_ the folder `plugin-name` of this repo) can be installed directly into your plugins folder "as-is".

You will want to rename it and the classes and methods inside of it to fit your needs.
Some comments inside the Boilerplate may need to be rewritten as well, and adapted to your code/use case.

For example, if your plugin is named 'example-me' then:

-   rename files from `plugin-name` to `example-me`
-   change `plugin_name` to `example_me` (but dont't rename $plugin_name, $this->plugin_name and get_plugin_name)
-   change `plugin-name` to `example-me`
-   change `Plugin_Name` to `Example_Me`
-   change `PLUGIN_NAME_` to `EXAMPLE_ME_`

It's safe to activate the plugin at this point.
Because the Boilerplate has no real functionality there will be no menu items, meta boxes, or custom post types added until you write the code, of course.

# What About Contributing?

Submit your idea to the [Discussions](https://github.com/anwas/anwas-wp-plugin-boilerplate-2023/discussions) for the community to approve.

Additionally to the Discussions Post, if you have working code to implement your Idea, please add a PR **to the develop branch**.

Note that in special cases (security, quality, yada yada) we may or may not merge the code and may or may not add or remove features discussed at our own will, independent from the amoung of thumbsup.

The Anwas WordPress Plugin Boilerplate 2023 follows PHP, WP Coding standards.

## Documentation, FAQs, and More

If you’re interested in writing any documentation or creating tutorials please let's discuss in the [Discussions section](https://github.com/anwas/anwas-wp-plugin-boilerplate-2023/discussions) of this Repo.

# Credits

The **Anwas** WordPress Plugin Boilerplate 2023 is maintained by [Anwas](https://github.com/anwas).
