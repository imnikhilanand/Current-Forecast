<html>

<head>
<title>Weather Report</title>
</head>

<style>
body{
  background-image: url("back.jpeg");
  background-size:     cover;                     
  background-repeat:   no-repeat;
  background-position: center center;  
  font-family: Verdana, sans-serif;
}

.midwrap{
  width:1200px;
  margin:auto;
  margin-top:50px;
  text-align:center;
}
#upper2{
  top:5px;
  margin-top: 0px;
  margin-bottom: 10px;
  height:580px;
  background-color:black ; 
  opacity: 0.6;
  border: 1px solid black;
  border-radius: 20px;
  position: relative;
  z-index: 5;
}
#content{
  opacity: 1;
  top: -540px;
  position: relative;
  z-index: 50;
  text-align: center;
}
input[type=text] {
    width: 30%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    padding: 12px 20px 12px 20px;
}
#search2{
  background-color: #4286f4;
  font-size: 16px;
  padding:12px 25px 12px 25px;
  border:2px solid #4286f4;
  border-radius: 4px;
  color:white;  
}
.list{
  margin-top: 20px;
  margin-bottom: 20px;
   
}
td{
  padding: 10px 10px;
}
.con{
  color:white;
  font-size: 35px; 
}
</style>

<body onload="getLocation()">

<div class="midwrap">

<div id="upper2">
  </div>

<div id="content">
  
  <div style="margin-bottom:60px;">
  <h1 style="color:white;font-size: 40px">Current forecast</h1>
  <input type="text" name="search" id="text" placeholder="eg. Delhi, Kanpur ...">
  <button  id="search2" onclick="insert()">Search</button>
  </div>

  <!--<div class="list" style="color:white;font-size: 40px" >Temperature : <span id="temp"></span>&#8451;</div>
  <div class="list" style="color:white;font-size: 40px" >Location : <span id="location"></span></div>
  <div class="list" style="color:white;font-size: 40px">Humidity : <span id="humidity"></span>%</div>
  <div class="list" style="color:white;font-size: 40px" >Wind speed : <span id="wind"></span> km/h</div>
  -->

  <table width="100%">
    <tr><td width="50%" align="right"><span class="con">Temperature : </span></td><td align="left"><span id="temp" style="color:#f2df13" class="con"></span><span style="color:#f2df13" class="con"> &#8451;</span></td></tr>
    <tr><td width="50%" align="right"><span class="con">Location : </span></td><td align="left"><span id="location" style="color:#f2df13" class="con"></span></td></tr>
    <tr><td width="50%" align="right"><span class="con">Humidity : </span></td><td align="left"><span id="humidity" style="color:#f2df13" class="con"></span><span style="color:#f2df13" class="con"> %</span></td></tr>
    <tr><td width="50%" align="right"><span class="con">Wind : </span></td><td align="left"><span id="wind" style="color:#f2df13" class="con"></span><span style="color:#f2df13" class="con"> km/h</span></td></tr>
  </table>
  
</div>

</div>

</body>

<script type="text/javascript">
	
  
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position) {
    var lat = position.coords.latitude;
    var lot = position.coords.longitude;
    insert2(lat,lot);
}

function insert() {
  var xhttp = new XMLHttpRequest();
 	var A=document.getElementById("text").value;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("all").innerHTML=this.responseText;
      var obj=JSON.parse(this.responseText);
      document.getElementById("temp").innerHTML=obj.main.temp-273.15;
      document.getElementById("location").innerHTML=obj.name;
      document.getElementById("humidity").innerHTML=obj.main.humidity;
      document.getElementById("wind").innerHTML=obj.wind.speed;
      
    }
  };

  xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?q="+A+"&appid=c140dd2e860dc97628ab3a2397aa6183", true);
  xhttp.send("q="+A+"&appid=c140dd2e860dc97628ab3a2397aa6183");
  
}

function insert2(l,m) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("all").innerHTML=this.responseText;
      var obj=JSON.parse(this.responseText);
      document.getElementById("temp").innerHTML=obj.main.temp-273.15;
      document.getElementById("location").innerHTML=obj.name;
      document.getElementById("humidity").innerHTML=obj.main.humidity;
      document.getElementById("wind").innerHTML=obj.wind.speed;
      
       
    }
  };
  
  xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?lat="+l+"&lon="+m+"&appid=c140dd2e860dc97628ab3a2397aa6183", true);
  xhttp.send("lat="+l+"&lon="+m+"&appid=c140dd2e860dc97628ab3a2397aa6183");

}


</script>


</html>


