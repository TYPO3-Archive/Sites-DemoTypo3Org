<ul class="breadcrumbs">
	<li>
		<a href="http://typo3.org/" target="_top" title="TYPO3 - The Enterprise Open Source CMS">typo3.org</a>
	</li>
	<li>
		<a href="http://typo3.org/download/" target="_top" title="Download">Download</a>
	</li>
	<li>Demo Distribution</li>
</ul>

Available Demos
===============

This is the landing page of all TYPO3 packages. Be welcome and make your choice between the different flavor.
There is here the opportunity to make an idea of the capability of TYPO3 products.
All packages have an login with different access level. Log in as admin in the Backend
for in depth exploration or as an Editor to see an optimized User Interface
addressing "basic" User. **Not all features are enabled such as file upload,
third-party extension installation, etc... for obvious security reasons.**

Experiment as much as you like but please let the system still usable
for the next visitor. Next reset will happen in <strong id="javascript_countdown_time"></strong>.

TYPO3 CMS LTS (6.2) - Introduction distribution
-----------------------------------------------

<p class="left">
	<a href="http://demo.typo3.org/introduction" title="Head to this demo">
		<img src="files/cms62.png" class="img-left" alt="" width="300">
	</a>
</p>

<p>
	Demo:
	<br/>
	<a href="http://demo.typo3.org/cms62" target="_blank">http://demo.typo3.org/cms62</a>
</p>

<p>
	Backend login:
	<br/>
	<a href="http://demo.typo3.org/cms62/typo3" target="_blank">http://demo.typo3.org/cms62/typo3</a>
	<br/>
	Use <strong>"admin"</strong> and <strong>"password"</strong> as credentials
</p>

This is an example of a typical TYPO3 installation that bundles an XHTML template,
the TYPO3 source and some well-known extensions. Download this if you want to try out
TYPO3 and play around with it, or just to get a basic site with a predefined template up
and running. **To install, you need a webserver on your local machine or a hosted webserver**.
Unzip the package, create a Virtual Host pointing at the root of the directory,
open the browser and go to the installation wizard. Notice also, experimented users can install TYPO3 CMS LTS by [Composer][cp].

<p class="clear"></p>

----


TYPO3 CMS (7.x)
---------------


<p class="left">
	<a href="http://demo.typo3.org/introduction" title="Head to this demo">
		<img src="files/cms70.png" class="img-left" alt="" >
	</a>
</p>

<p>
	No Frontend yet, only a backend login:
	<br/>
	<a href="http://demo.typo3.org/cms70/typo3" target="_blank">http://demo.typo3.org/cms70/typo3</a>
	<br/>
	Use <strong>"admin"</strong> and <strong>"password"</strong> as credentials
</p>

This is our next CMS version which is in preparation. Check the [roadmap](http://typo3.org/typo3-cms/roadmap/) to
know more about the schedule. Huge parts of the backend will be rebuilt from the ground up using Twitter Bootstrap.
Doing so will enable us to implement a lot of usability improvements.
To install this version grab a fresh copy from the [download page](http://typo3.org/download).
Experimented users can install TYPO3 CMS 7.x by [Composer][cp].


<p class="clear"></p>


Forge project
-------------

There is a [Forge project][fp] where issues and wishes can be [reported][bt].
For instance, if you would like to have your own distribution listed here showing
special features of a TYPO3 product, don't hesitate to create a ticket.


	[cp]: http://composer.typo3.org/
	[fp]: https://forge.typo3.org/projects/team-demo
	[bt]: https://forge.typo3.org/projects/team-demo/issues



<style>
	.clear {
		clear: both
	}

	.left {
		float: left;
	}

	.img-left {
		padding-right: 10px;
		padding-bottom: 10px;
	}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

	// @credit http://stuntsnippets.com/javascript-countdown/
	var javascript_countdown = function() {
		var time_left = 10; //number of seconds for countdown
		var output_element_id = 'javascript_countdown_time';
		var keep_counting = 1;
		var no_time_left_message = 'No time left for JavaScript countdown!';

		function countdown() {
			if (time_left < 2) {
				keep_counting = 0;
			}

			time_left = time_left - 1;
		}

		function add_leading_zero(n) {
			if (n.toString().length < 2) {
				return '0' + n;
			} else {
				return n;
			}
		}

		function format_output() {
			var hours, minutes, seconds;
			seconds = time_left % 60;
			minutes = Math.floor(time_left / 60) % 60;
			hours = Math.floor(time_left / 3600);

			seconds = add_leading_zero(seconds);
			minutes = add_leading_zero(minutes);
			hours = add_leading_zero(hours);

			return hours + ':' + minutes + ':' + seconds;
		}

		function show_time_left() {
			document.getElementById(output_element_id).innerHTML = format_output();//time_left;
		}

		function no_time_left() {
			document.getElementById(output_element_id).innerHTML = no_time_left_message;
		}

		return {
			count: function() {
				countdown();
				show_time_left();
			},
			timer: function() {
				javascript_countdown.count();

				if (keep_counting) {
					setTimeout("javascript_countdown.timer();", 1000);
				} else {
					no_time_left();
				}
			},
			//Kristian Messer requested recalculation of time that is left
			setTimeLeft: function(t) {
				time_left = t;
				if (keep_counting == 0) {
					javascript_countdown.timer();
				}
			},
			init: function(t, element_id) {
				time_left = t;
				output_element_id = element_id;
				javascript_countdown.timer();
			}
		};
	}();

	// json-time.appspot.com is sometimes over-quota... use a home made solution
	$.get("/time.php", function(time) {
		var now = new Date(time);
		var hourInterval = 1
		var hour = (now.getHours() + 1) % hourInterval;
		var minute = now.getMinutes();
		var second = now.getSeconds();
		var timeSpent = hour * 3600 + minute * 60 + second;
		var timeLeft = (hourInterval * 3600) - timeSpent;

		//time to countdown in seconds
		javascript_countdown.init(timeLeft, 'javascript_countdown_time');
	});
</script>