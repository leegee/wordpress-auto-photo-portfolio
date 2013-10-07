<div class="wrap">  

<h2>Photo Portfolio</h2>
<h3>Overview</h3>
<p>
	The Photo Portfolio Wordpress plug-in is designed to allow
	photographers and image professionals to as simply as possible
	add to their Wordpress site a portfolio and slideshow with the
	minimum of adornments. It displays the images as large as possible,
	with minimum adornment and fuss.
</p>
<p>
	Thumbnails and images can be any size, but we recommend the largest
	side of the thumbnail be around 200 pixels, and the full-size image
	be around 900px, as practiced by the 2014 Magnum agency.
</p>

<h3>Minimal Configuration</h3>
<p>
	A photo portfolio can be generated as follows:
</p>

<p>
	Insert the following shortcode text into a page/post in plain text mode.
</p>

<pre>[photoportfolio uri='/portfolio'] text='Portfolio']</pre>
	
<p>
	The value of <code>uri</code> is the URI of index of the images.
	You could create an HTML page of links to images, but virtually
	all web servers will be configured to produce a hyperlinked
	directory listing, and Photo Portfolio is designed to work with that.
</p>

<p>
	The index page will be read and links will be extracted if they are one
	of <code>jpg</code>, <code>jpeg</code>, <code>png</code>, or
	<code>gif</code>. Thumbnail images should be in the same directory,
	but should have the text <code>_thumb</code> in their filename,
	before the extension: <code>image.jpg</code> → <code>image_thumb.jpg</code>.</pre>
</p>

<h3>Automatic Image Lists With Apache</h3>
<p>
	To force Apache to produce a hyperlinked index page, all you need to do
	is place them in an empty directory, and include the following code in a file
	named <code>.htaccess</code> in your site's root directory:
</p>
<pre>Options +Indexes
Order allow,deny
Allow from all
IndexOptions Charset=UTF-8
IndexOptions Type=text/html
IndexOptions IgnoreClient -HTMLTable -FancyIndexing SuppressColumnSorting SuppressDescription SuppressHTMLPreamble SuppressIcon SuppressLastModified SuppressRules SuppressSize </pre>

<h3>Portfolio Title</h3>
<p>
	Add a title to your portfolio page by adding the following to the shortcode: <code>data-title=""</code>,
	putting the title text within the double quotes.
</li>

<h3>Change Thumbnail Filenames</h3>
<p>
	The names of thumbnail images are distinguished from full-sized images by the inclusion in
	their filename of <code>_thumb</code>: this can be changed by adding the following to the shortcode:
	<code>thumbregex="_thumb"</code>, replacing <code>_thumb</code> with your choice. Avoid characters
	other than alphanumeric unless you understand PHP's regular expressions.
</p>

<h3>Slideshow</h3>
<p>
	To turn off the portfolio slideshow, add the following to your shortcode:
	<code>data-noslideshow=1</code>.
</p>

</div><!-- ends wrap -->


