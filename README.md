Pagemap Imagewall
*****************

### ABOUT
Pagemap ImageWall is a web gallery script, free for private and commercial use, developed by Pagemap Premium Portfolios in Germany.

Demo kris : https://xoofoo.org/demo/pagemap/

### SYSTEM REQUIREMENTS
- Apache Webserver (recommended) or IIS
- PHP version 4.3 or greater
- PHP extension GDLib

### INSTALLATION
- Download a copy from https://github.com/krisxoofoo/Pagemap-ImageWall/archive/master.zip and unpack it on your webserver.
- Open your web browser and go to the script at http://www.yourdomain.com/index.php
- That's it. If you want to configure the script see next chapters.

### UNINSTALL
Just rename the file index.php to uninstall.php and run the script.
It will delete the cache directory and the config.txt if you are not able to do this via FTP.

### CONFIGURATION
You can change the look and feel of the gallery in many ways.
Create a config.ini in the same directory as Pagemap ImageWall and check out the available Config Tags

### EMBEDDING
If you want to include the script (index.php) in a custom PHP file set Config Tag [Embedded Script'] to "on" and use $set['script name'] in your script to define the path to the Pagemap ImageWall script. You can optional define a root path for config file and default images dir with $set['script dir']. Also you should set [jQuery Path] to empty (this will disable the internal script) and include the framework in your HTML head.

### TROUBLESHOOTING
If you are having problems installing or using Pagemap Imagewall, please visit the project website post issue here: https://github.com/krisxoofoo/Pagemap-ImageWall/issues

### LEGAL INFORMATION
Pagemap Imagewall is written by Nico Wenig
Copyright © 2010 by Pagemap Premium Portfolios. All rights reserved.

The software is provieded as is, without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from
out of or in connectioin with the software or the use of other dealings in the software.

### TERMS OF USE:
You are allows to:
- Use for private and commercial
- Copy and distribute the script
- Customize the function and design

You are NOT allowed to:
- Claim the script as your own
- Sale parts of the script

### CONTACT THE AUTHOR
Pagemap Premium Portfolios
Glashüttenstraße 2, D-30165 Hannover
Phone: +49(0)511 3405483

### CHANGELOG

v1.2 (Release 2013-05-13 modified by Kris - XooFoo.org)
+ Updated to jQuery 2.0.0
+ Replaced config file extension txt by ini
+ Reformated and updated html code for standard compliance
+ Cleaning php and js code
+ Improved more config tags: [Meta Keywords: ], [ImageWall Width: ], [Other JS: ], [Footer Color: ], [Custom FileCSS: ], [Disqus Shortname: ],[Disqus UrlPage: ], [GoogleAnalytics Account: ] and [Per Page: ]
+ Add little cache system (credits: Rafael Paulino)
+ Add Page navigation (credits: V Song)
+ Add Google Analytics script
+ Add Comments with Disqus script
+ Add robots.txt
+ Add TipTip jQuery plugin (credits: Drew Wilson)

v1.2 (Release 2010-08-18)
Added Pagemap favicon.
Improved embedding feature.
Improved source code for better performance.
Added tags [jQuery Path], [Custom HTML] and [Image Size].
Added jQuery framework and imrpoved all JavaScript code.
Replaced full image view script "Lytebox" by "Slimbox 2" (for jQuery).
Fixed issue that caused Firefox to crash in full image view.

v1.1 (Release 2010-07-25)
Added automatic cache clearing if config file is changed.
Added usage of EXIF thumbnails instead of rendering if GD module
not loaded or file size is greater than server memory limit.
Added uninstall routine.
Added tag [Exclude Images].
Added tag [Images List].
Added workaround for very large galleries.
New faster fade in effect for thumbnails.
Fixed no opacity issue on load when mouse over image.
Completely redesigned slideshow.

v1.0.1 (Release 2010-07-23)
Fixed wrong parameter in line 143.
Added Thumbnail Background config parameter.
Added Custom CSS config parameter.

v1.0 (Release 2010-07-17)
First Release.