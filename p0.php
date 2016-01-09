<?php
	session_start();

	require_once 'header.php';

	if(!isset($_SESSION['user'])) $_SESSION['user'] = 0; 

	$file = "conta.txt";
	if (!file_exists($file)) {
		$fh = fopen($file, 'w') or die("Can't create file");
		fwrite($fh, '0');
		fclose($fh);
		$site = 0;
	} else {
		$fh = fopen($file, 'r') or die("Can't open file");
		$site = fread($fh, filesize($file));
		fclose($fh);
	}
?>
<div class="container">
	<br><br>
  <h1 class="header center green-text">Page 0</h1>
  <div class="section">
	  <div class="row center">
	  	<div class="col s12 m6">
	  		<h5>Site total: <b id="S"><?php echo $site; ?></b></h5>
	  		<h5>User total: <b id="U"><?php echo $_SESSION['user']; ?></b></h5>
	  	</div>
	  	<div class="col s12 m6">
	  		<button onclick="plus('S');" class="btn-large waves-effect waves-light orange">Site total ++</button>
	  		<button onclick="plus('U');" class="btn-large waves-effect waves-light orange">User total ++</button>
	  	</div>
	  </div>
  </div>
</div>
<?php require_once 'footer.php'; ?>

<script>
function plus(cosa) {
	url = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>";
	url = url + "/action.php";
	url = url + "?action=" + cosa;
	//alert("url: "+url);

	var xhttp;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.open("GET", url, true);
	xhttp.send();
	//alert(xhttp.responseText);

	el = document.getElementById(cosa);
	el.innerHTML = parseInt(el.innerHTML) + 1;
}
</script>