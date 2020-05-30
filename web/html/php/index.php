<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" integrity="sha256-IvM9nJf/b5l2RoebiFno92E5ONttVyaEEsdemDC6iQA=" crossorigin="anonymous" />

    <title>Waiting for Results !</title>
  </head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha256-8zyeSXm+yTvzUN1VgAOinFgaVFEFTyYzWShOy9w7WoQ=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Average waiting time : 2 minutes !</h4>
  <p id="timer">Time elapsed : 0 seconds</p>
  <hr>
  <p class="mb-0">You will get both raw results and a graph comparing your website to the category you have chosen. The smaller your graph is, the better as it means it was performing better, in a smaller amount of time or ressources.</p>
</div>

<!-- this container contains the canvas that'll be used to show the graph. It starts hidden, but appears once the graph is ready to be shown -->
<div class="container">
<canvas id="myChart" width="600" height="400"></canvas>
</div>
<script>$("#myChart").fadeOut(10)</script>
<div class="container">
<ul class="list-unstyled li-space-lg white">We test 7 differents aspects :
	<li><b>Visual Complete :</b> Once the website is visually complete, there is no more changes to the visual</li>
	<li><b>Loaded :</b> The Fully Loaded time, measured as the time from the start of the navigation until there was 2 seconds of no network activity after Document Complete</li>
	<li><b>Size :</b> The overall size in bytes of the tested url</li>
	<li><b>TTFB :</b> Time To First Byte. The time it takes to receive the first byte</li>
	<li><b>First Paint :</b> The time between navigation and when the browser renders the first pixels to the screen</li>
	<li><b>Requests :</b> This is the number of requests that had to be made by the browser for pieces of content on the page (images, javascript, css, etc)</li>
	<li><b>Speedindex :</b> The Speed Index is a calculated metric that represents how quickly the page rendered the user-visible content (lower is better)</li>
</ul>
</div>
<?php

// this allows the js to work with the data given by the GET from the first page
$company = $_GET["companyName"];
$urlname = $_GET["urlName"];
$field = $_GET["fieldName"];
$email = $_GET["emailName"];

echo "<div id='company' style='display: none'>". $company ."</div>";

echo "<div id='urlname' style='display: none'>" . $urlname . "</div>";

echo "<div id='field' style='display: none'>" . $field . "</div>";

echo "<div id='company' style='display: none'" . $email . "</div>";


// data about the db
$servername = "localhost";
$username = "writer";
$password = "Vivelabiere33";
$dbname = "wpt_key_performance";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO Contact (company, urlname, field, email) VALUES ('$company', '$urlname', '$field', '$email')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

// connects to db, gets data about a specific field for each category. Puts it in a div to allow the js to access it, and draw the graph
$conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT avg(visual_complete), avg(loaded), avg(size), avg(ttfb),avg(first_paint), avg(requests), avg(speedindex) FROM CompareTable WHERE field='$field'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
		echo "<div id='vc_compare' style='display: none'>". $row["avg(visual_complete)"] ."</div>";
		echo "<div id='loaded_compare' style='display: none'>". $row["avg(loaded)"] ."</div>";
                echo "<div id='size_compare' style='display: none'>". $row["avg(size)"] ."</div>";
                echo "<div id='ttfb_compare' style='display: none'>". $row["avg(ttfb)"] ."</div>";
                echo "<div id='firstpaint_compare' style='display: none'>". $row["avg(first_paint)"] ."</div>";
                echo "<div id='requests_compare' style='display: none'>". $row["avg(requests)"] ."</div>";
                echo "<div id='speedindex_compare' style='display: none'>". $row["avg(speedindex)"] ."</div>";
      }
  } else {
      echo "0 results";
  }

  $conn->close();


?>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>

<script>

// rescaled takes a value x, a value min and a value max as an input
// rescaled first check if the x value is undefined, as it can happen in rare instances. If that is the case, it sets up x as 1.
// rescaled then check if x is higher than the max , or lower than the low, if that is the case, it sets max or min as the same value than x +1 or x -1
// rescaled finally rescale the value, on a scale from 0 to 100.
function rescaled(x, min, max){
	if(typeof x == 'undefined') {x = 1;}
	if(x > max) {max = x+1;}
	if(x < min) {min = x-1;}
	return  Math.round(100*(x-min)/(max-min));
}

// prettyprint takes 2 values as parameters.
// prettyprint then check for undefined, as it can happen in rare instances. If that is the case, it sets up the undefined value as 1.
// prettyprint finally returns both int1 and int2, with the one bigger in a <a> tag and  in red, with '<' '>' or '=' in between both values.
function prettyprint(int1, int2){
	if (typeof int1 == 'undefined') {int1 = 1;}
	if (typeof int2 == 'undefined') {int2 = 1;}
	if (int1 > int2) {return ('<a href="#" class="text-danger">' + Math.round(int1) + '</a>' + ' > ' + Math.round(int2));}
	else if (int1 < int2) {return (Math.round(int1) + ' < ' + '<a href="#" class="text-danger">' + Math.round(int2) + '</a>');}
	else return (int1 + ' = ' + int2);
}

// myLoop takes a value x, which stops the loop from going for more than 30 times (300 seconds, 5min) and a link, which is a json link from a webpagetest.
// myLoop check, every 10seconds, the json link. Until the statusCode is 200, which means the test is complete, we will check the link again, every 10 seconds.
// Once the test is done, we extract the data we need from the returned json. We then show the raw data on the page.
// Finally, we create the graph.
function myLoop(x, link){
	setTimeout(function(){
		if(x <  30){
			$("#timer").text("Time elapsed : " + (x*10) + " seconds.");
			x++;
			$.ajax({
				type: "GET",
				url: link,
				async: false,
				success : function(data) {
	                                if(data.statusCode == "200"){
	                                        x = 61;
						$("#myChart").fadeIn(500);
						var str = "";
						str += "<div class='container'>";
						str += "Your Results are on the left | The average of the field is on the right. The red highlight shows the worst of the two. <br>";
						str += "<b>Visual Complete :</b>  "
						str += prettyprint(data["data"]["median"]["firstView"]["visualComplete85"], $('#vc_compare').text());
                                                str += "<br>";
                                                str += "<b>Loaded :</b> ";
                                        	str += prettyprint(data["data"]["median"]["firstView"]["fullyLoaded"], $('#loaded_compare').text());
                                                str += "<br>";
                                                str += "<b>Size :</b> ";
                                                str += prettyprint(data["data"]["median"]["firstView"]["bytesOut"], $('#size_compare').text());
                                                str += "<br>";
                                                str += "<b>TTFB :</b> ";
						str += prettyprint(data["data"]["median"]["firstView"]["TTFB"], $('#ttfb_compare').text());
                                                str += "<br>";
                                                str += "<b>First Paint :</b> ";
						str += prettyprint(data["data"]["median"]["firstView"]["firstImagePaint"], $('#firstpaint_compare').text());
                                                str += "<br>";
                                                str += "<b>Requests :</b> ";
						str += prettyprint(data["data"]["median"]["firstView"]["requestsFull"], $('#requests_compare').text());
                                                str += "<br>";
                                                str += "<b>SpeedIndex :</b> ";
						str += prettyprint(data["data"]["median"]["firstView"]["SpeedIndex"], $('#speedindex_compare').text());
						str += "</div>";
						$("body").append(str);


						var marksData = {
						  labels: ["VC", "Loaded", "Size", "TTFB", "First Paint", "Requests", "SpeedIndex"],
						  datasets: [{
						    label: "Your Results",
						    backgroundColor: "rgba(200,0,0,0.2)",
						    data: [rescaled(data["data"]["median"]["firstView"]["visualComplete85"], 300, 15000), rescaled(data["data"]["median"]["firstView"]["fullyLoaded"], 500, 25000), rescaled(data["data"]["median"]["firstView"]["bytesOut"], 9000, 900000), rescaled(data["data"]["median"]["firstView"]["TTFB"], 50, 10000), rescaled(data["data"]["median"]["repeatView"]["firstImagePaint"], 100, 10000), rescaled(data["data"]["median"]["firstView"]["requestsFull"], 1, 300), rescaled(data["data"]["median"]["firstView"]["SpeedIndex"], 300, 15000)]
						  }, {
						    label: "Average",
						    backgroundColor: "rgba(0,0,200,0.2)",
						    data: [rescaled($('#vc_compare').text(), 300, 15000), rescaled($('#loaded_compare').text(), 500, 25000), rescaled($('#size_compare').text(), 9000, 900000), rescaled($('#ttfb_compare').text(), 50, 10000), rescaled($('#firstpaint_compare').text(), 100, 10000), rescaled($('#requests_compare').text(), 1, 300), rescaled($('#speedindex_compare').text(), 300, 15000)]
						  }]
						};

						var radarChart = new Chart(document.getElementById('myChart'), {
						  type: 'radar',
						  data: marksData
						});

	                                }
				}
			});
			myLoop(x, link);
		}
	}, 10000);
}
// myFunction takes a url as a parameter. It then start a webpagetest from a private instance.
// Once the first test is sent, we send the jsonLink in the myLoop function.
function  myFunction(myUrl){
	var jsonLink = "";
	$.get("http://www.wt1-11.ephec-ti.be:81/runtest.php?url=" + myUrl + "&runs=1&f=json&location=Test:Chrome.Cable", function(data, status){
	        console.log("json link : ");
		console.log(data.data.jsonUrl);
		jsonLink = data.data.jsonUrl;
		myLoop(1, jsonLink);
	});
}

// starts the script on the url given.
myFunction($("#urlname").text());

</script>

</body>
</html>
