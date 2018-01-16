# MantisBT Theme Manager

A Theme Manager for [MantisBT](http://www.mantisbt.org/), the free web-based bugtracking system.

* 2012 by http://tim-pietrusky.de
* 2017 updated by Samunosuke
* 2018 updated by Cactushead

## Version

0.0.3 (20180116)
Tested with Mantis 2.9

## In Action

![preview](https://github.com/cactushead/MantisThemeManager/blob/master/screenshots/screenshot.png | width=300)

## Install

1. [Download](https://github.com/cactushead/MantisThemeManager/archive/master.zip)
2. Unpack the zip file
3. Rename the unpacked folder called `TimPietrusky-MantisThemeManager-xxxxxxx` to `MantisThemeManager`
4. Copy the `MantisThemeManager` folder to `<mantis-root>/plugins/`
5. Go to *Manage / Manage Plugins* and hit the *Install* action for **MantisBT Theme Manager**
6. Click on the **MantisBT Theme Manager x.x.x** link to open the *choose a theme* page
7. Create a folder called `themes` inside `<mantis-root>/css/` if it does not yet exist
8. Copy `<mantis-root>/plugins/MantisThemeManager/pages/default.png` to `<mantis-root>/css/themes/default/default.png`

## How to use

Follow the **Instructions** on the **MantisBT Theme Manager** page.

## Themes

### Cactus-Light-Theme
- Creates a flat clean and vibrant theme
- Alters side menu
- Adds theme info to footer
- No additional javascripts required

<img src="https://github.com/cactushead/cactus-light-theme/raw/master/cactus%20light.png" height="200" alt="cactus light theme for MantisBT">

[Download](https://github.com/Samunosuke/mantis-suke-theme/zipball/master)


### MantisBT is a ☆ ✪ ★ rockstar

<img src="https://raw.githubusercontent.com/TimPietrusky/mantisbt-is-a-rockstar/master/rockstar/rockstar.png" height="200" alt="rockstar theme for MantisBT">

[Download](http://github.com/TimPietrusky/mantisbt-is-a-rockstar/zipball/master)


### Mantis-Suke-Theme
- adds gradient to bug list rows
- provides a base for more visual optimization

<img src="https://github.com/Samunosuke/mantis-suke-theme/blob/master/suke/suke.png" height="200" alt="suke theme for MantisBT">

[Download](https://github.com/Samunosuke/mantis-suke-theme/zipball/master)

Please create a pull request or issue or what ever to add your theme to the list.


### &lt;Your theme&gt;

#### How to submit a theme

1. Your theme should have a unique name like `mytheme`
2. Name your css `default.css` and save it to `themes/mytheme/default.css`
3. Create a preview image of your theme, name it `mytheme.png` and save it to `themes/mytheme/mytheme.png`
4. Create what ever subfolders you like (e. g. `mytheme/img` for images used in your `default.css`)

## ToDo

 - Create more themes


## License

Licensed under [VVL 1.33b7](http://tim-pietrusky.de/license) which means this **work** is free for all, so use it as you like.
