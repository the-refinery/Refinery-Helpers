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

## Append Params to Href Filter

Takes an HTML block (from something like a Redactor field) and runs the Append Params Filter above for all href attributes inside.

```
{% set params = "utm=123&campaign=brian" %}

{% set blockContent %}
  <p><b><a href="/wiki/Operation_Obviate" title="Operation Obviate">Operation Obviate</a></b> was an unsuccessful British air raid of <a href='/wiki/World_War_II?brady=awesome' title="World War II">World War II</a> that targeted the <a href="/wiki/German_battleship_Tirpitz" title="German battleship Tirpitz">German battleship <i>Tirpitz</i></a> <i>(pictured in 1943 or 1944)</i>. Conducted by <a href="/wiki/RAF_Bomber_Command" title="RAF Bomber Command">Royal Air Force heavy bombers</a> during the early hours of 29 October 1944, it sought to destroy the damaged battleship after she moved to a new anchorage near <a href="/wiki/Troms%C3%B8" title="Tromsø">Tromsø</a> in northern Norway. The attack followed the previous month's successful <a href="/wiki/Operation_Paravane" title="Operation Paravane">Operation Paravane</a>, during which <i>Tirpitz</i> was crippled by British heavy bombers. In Operation Obviate, 38 bombers and a film aircraft departed from bases in northern Scotland. Obscured by clouds, the battleship was not directly hit, but was damaged by a bomb that exploded near her hull. A British bomber made a crash landing in Sweden after being hit by German anti-aircraft fire, and several others were damaged. The plans for the attack were reused for the next raid on the battleship, <a href="/wiki/Operation_Catechism" title="Operation Catechism">Operation Catechism</a>, on 12 November, when <i>Tirpitz</i> was sunk with heavy loss of life. (<b><a href="/wiki/Operation_Obviate" title="Operation Obviate">Full&nbsp;article...</a></b>)</p>

  <ul><li>In motor racing, Estonians <a href="/wiki/Ott_T%C3%A4nak" title="Ott Tänak">Ott Tänak</a> and <a href="/wiki/Martin_J%C3%A4rveoja" title="Martin Järveoja">Martin Järveoja</a> <i>(both pictured)</i> win the <b><a href="/wiki/2019_World_Rally_Championship" title="2019 World Rally Championship">World Rally Championship</a></b>.</li>
  <li>At least sixty-seven people are killed in <b><a href="/wiki/2019_Ethiopian_protests" title="2019 Ethiopian protests">protests and inter-ethnic clashes</a></b> in Ethiopia's <a href="/wiki/Oromia_Region" title="Oromia Region">Oromia Region</a> and surrounding areas.</li>
  <li><a href="/wiki/Islamic_State_of_Iraq_and_the_Levant" title="Islamic State of Iraq and the Levant">Islamic State of Iraq and the Levant</a> leader <b><a href="/wiki/Abu_Bakr_al-Baghdadi" title="Abu Bakr al-Baghdadi">Abu Bakr al-Baghdadi</a></b> dies during a <a href="/wiki/Barisha_raid" title="Barisha raid">US raid</a> in <a href="/wiki/Idlib_Governorate" title="Idlib Governorate">Idlib</a>, Syria.</li>
  <li>The coastline of <a href="/wiki/Northeast_Region,_Brazil" title="Northeast Region, Brazil">Northeast Brazil</a> is hit by <b><a href="/wiki/2019_Northeast_Brazil_oil_spill" title="2019 Northeast Brazil oil spill">an oil spill</a></b> of unknown origin.</li></ul>
{% endset %}

{{ blockContent | appendParamsToHref(params) }}
```