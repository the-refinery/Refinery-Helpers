# Refinery Helpers plugin for Craft CMS 3.x

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Manually add the repository to your composer.json since this plugin is not listed on packagist

		"repositories": [
			{
				"type": "github",
				"url": "git@github.com:the-refinery/Refinery-Helpers.git"
			}
		]

3. Then install the plugin:

		composer require refinery/helpers

4. In the Control Panel, go to Settings → Plugins and click the “Install” button for Refinery Helpers.

## Append Params Filter

Takes a URL string (usually from a Craft entry) and appends the parameter string to the end.  This is smart enough to account for situations where the initial URL string already contains params (swapping ? for & symbols).

```
{% set linkUrl = 'https://google.com?abc=123' %}
{% set params = '&test=1&foo=2' %}

<p>Here's a <a href="{{ linkUrl | appendParams(params) }}">link</a>.</p>
```