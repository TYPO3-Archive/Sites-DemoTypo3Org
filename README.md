demo.typo3.org
==============

This repository contains the web pages for http://demo.typo3.org.

Installation
------------

To install it locally:

	# Clone the repository
	git clone git://git.typo3.org/Sites/DemoTypo3Org.git

	# Install packages dependencies
	cd DemoTypo3Org
	composer install

	# Download typo3.org landing page sub-module
	git submodule update --init


Contributing
------------

To change and submit the content of this website, send patches to Gerrit:


	# Install the Gerrit Hook
	scp -p -P 29418 USERNAME@review.typo3.org:hooks/commit-msg .git/hooks/

	# After committing your changes, push to a special branch for review
	git push origin HEAD:refs/for/master

