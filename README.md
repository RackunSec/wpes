# &#128026; WeakNet PHP Execution Shell
This is a simple <b>Post-exploitation PHP Exec Shell</b> that I wish to expand upon. It is only text, no images, or pulled scripts, etc. Just one single file. I have added support for traversing directories that are listed by <code>ls</code> commands and even <code>cat</code> for files listed. This shell comes with WEAKERTHAN Linux 6+<br />
<br />
Here is a screenshot of the interface with a simple ls command on an exploited server. Click on the image to view it full sized.
<img src="https://weaknetlabs.com/images/wpes_10_new.PNG"/> <br /><br />
Here is a screenshot of simple file contents. Click on the image to view it full sized.
<img src="http://weaknetlabs.com/images/wpes_8_new_new.PNG"/> <br /><br />
And here is what the file looks like when the user clicks "Download File". Click on the image to view it full sized.<br />
<img src="http://weaknetlabs.com/images/wpes_9_new.PNG"/> <br /><br />
A screenshot showing how to access the ARIN query that is generated using PHP. Click on the image to view it full sized.<br />
<img src="http://weaknetlabs.com/images/wpes_7_new.png"/> <br /><br />
A screenshot showing how to access the Exploit-DB query that is generated using PHP. Click on the image to view it full sized.<br />
<img src="http://weaknetlabs.com/images/wpes_6_new.png"/> <br /><br />


# Features

<ul>
  <li>Detailed Server information with each request in the top right-hand div</li>
  <li>Translation of HTML characters, to display strings exactly as they are in the file</li>
  <li>Traverse directories by simply clicking on the magnifying glass icons</li>
  <li>Show file contents by simply clicking on the cat icons</li>
  <li>HTTP POST method for passing commands to slightly obfuscate the attackers commands from logs</li>
  <li>Commands can be typed into the shell at the bottom of the application / listed above output in highlight</li>
  <li>Download the file without making another call to the server</li>
  <li>Choose method of PHP execution from the functions exec(), shell_exec(), passthru(), and system()</li>
  <li>(OSINT) ARIN WHOIS lookup</li>
  <li>Exploit-DB exploit Search</li>
  <li>Email for server administrator</li>
</ul>

# TODO
<ul>
  <li>Mobile responsive CSS design</li>
  <li><strike>Add more methods of execution (PHP, exec, system, passthru, etc)</strike></li>
  <li><strike>Add more viewing functionality</strike></li>
  <li>Add local SQL (HTML5) functionality</li>
  <li><strike>Download functionality using PHP</strike></li>
  <li>Upload functionality using PHP</li>
  <li><strike>Built-Ins (OSINT)</strike></li>
</ul>

# Usage
Once a web service has been exploited simply upload the shell, by means of internal (wget/fetch), SQL Injection, etc and then simply access it from the browser. Your shell will have whatever rights that the web service deamon is running as.
