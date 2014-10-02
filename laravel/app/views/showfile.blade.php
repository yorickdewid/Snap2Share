<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Snap2Share - Free image upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

<!-- Interactive Login - START -->
<div class="container">

    <div class="row colored">
	<center><h1>Snap2Share <small>Free image upload</small></h1></center>
        <div id="contentdiv" class="contcustom">
            <h2>Your image has been uploaded and is ready for sharing!</h2>
            <div>
			<b>Filename :</b><br /> {{$filename}}<br />
			<a href="http://www.snap2share.nl/getfile/{{$filename}}"><img src="http://www.snap2share.nl/getfile/{{$filename}}" width="200" height"200"></a><br />
			<b>Hits :</b>{{$hits}}<br/>
			<b>Link to file (page) : </b> <a href="http://www.snap2share.nl/file/{{$filename}}">www.snap2share.nl/file/{{$filename}}</a><br />
			<b>Link to file (for embed) : </b> <a href="http://www.snap2share.nl/getfile/{{$filename}}">www.snap2share.nl/getfile/{{$filename}}</a>
            </div>
        </div>
    </div>
</div>

<style>

body {
    background-color: #F0EEEE;
}
.redborder {
    border:2px solid #f96145;
    border-radius:2px;
}

.hidden {
    display: none;
}

.visible {
    display: normal;
}

.colored {
    background-color: #F0EEEE;
}

.row {
    padding: 20px 0px;
}

.bigicon {
    font-size: 97px;
    color: #f96145;
}

.contcustom {
    text-align: center;
    width: 400px;
    border-radius: 0.5rem;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 10px auto;
    background-color: white;
    padding: 20px;
}

input {
    width: 100%;
    margin-bottom: 17px;
    padding: 15px;
    background-color: #ECF4F4;
    border-radius: 2px;
    border: none;
}

h2 {
    margin-bottom: 20px;
    font-weight: bold;
    color: #ABABAB;
}

.btn {
    border-radius: 2px;
    padding: 10px;
}

.med {
    font-size: 27px;
    color: white;
}

.medhidden {
    font-size: 27px;
    color: #f96145;
    padding: 10px;
    width:100%;
}

.wide {
    background-color: #8EB7E4;
    width: 100%;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
</style>

</body>

</html>