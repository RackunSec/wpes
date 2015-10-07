# &#128026; WeakNet PHP Execution Shell
This is a simple <b>Post-exploitation PHP Exec Shell</b> that I wish to expand upon. It is only text, no images, or pulled scripts, etc. Just one single file. I have added support for traversing directories that are listed by <code>ls</code> commands and even <code>cat</code> for files listed.<br />
<br />
Here is a screenshot of the interface with a simple ls command on an exploited server. Click on the image to view it full sized.
<img src="https://weaknetlabs.com/images/wpes_0.PNG"/><br /><br />
Here is a screenshot hovering over the little cat icon to "cat" the file contents. Click on the image to view it full sized.
<img src="https://weaknetlabs.com/images/wpes_1.png"/><br /><br />
Here is a screenshot of simple file contents. Click on the image to view it full sized.
<img src="https://weaknetlabs.com/images/wpes_2.PNG"/><br /><br />

# Features

<ul>
  <li>Detailed Server information with each request in the top left-hand div</li>
  <li>Translation of HTML characters, to display strings exactly as they are in the file</li>
  <li>Traverse directories by simply clicking on the magnifying glass icons</li>
  <li>Show file contents by simply clicking on the cat icons</li>
</ul>

# TODO
<ul>
  <li>Add more methods of execution (PHP, exec, system, passthru, etc)</li>
  <li>Add more viewing functionality</li>
  <li>Add local SQL (HTML5) functionality</li>
</ul>

# Usage
Once a web service has been exploited simply upload the shell, by means of internal (wget/fetch), SQL Injection, etc and then simply access it from the browser. Your shell will have whatever rights that the web service deamon is running as.
