<br/>
<p>
	This website is structured following an MVC architecture using a MVC framework in PHP5.
</p>
<p>
    This is a microframework embryo which has the following features:
    <ul>
        <li>the MVC architecture</li>
        <li>a basic routing</li>
        <li>templating</li>
        <li>the ability to read JSON data</li>
        <li>the possibility to get data from a database</li>
    </ul>
</p>
<p>
    A live example of display of data coming from a JSON file is accessible on <a href="<?=$urlPrefix?>si/display/">the Space Invaders page</a>.
</p>
<br>
<blockquote>
    It is not intended to be a commercial or even a finished product.<br>
    It is at a pre-alpha version or rather an embryo of microframework.<br>
    Get it from <a href="https://github.com/vpcom/Embryonic-MVC-PHP-Framework">GitHub</a> for doing a small and well structured website.
</blockquote>
<br>

<h3>How it works</h3>

  <img src="<?=$urlPrefix . REL_IMG_FOLDER?>mvc.png" />
  <blockquote class="credits">Courtesy: image from code.tutsplus.com</blockquote>
<br>
<br>
<p>
    The client request is processed from the root of the website with a .htaccess file that transfers the URL as a parameter to the index.php file.
</p>
<p>
    The requested URL is decomposed in order to know which model, view and controller to call.<br>
    <code>ex: /si/display -> default view or display of Space Invaders (si) which requires the sicontroller and the si model.</code>
</p>
<p>
    The corresponding method of display is called within the controller which initialize the Model and the View (HTML template). The template loads the data directly calling the model.
</p>
<div style="clear: both;">&nbsp;</div>
