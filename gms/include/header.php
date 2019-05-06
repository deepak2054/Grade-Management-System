
<div id="wrapper">
	<div id="header">
		<div id="header_left">
			<img style="width: 100%;" src="images/logo.png" alt="">
		</div>
		<div id="header_right">
			Kathmandu University
		</div>
		<div style="clear: both;"></div>
		<div id="header_quote">
			Grade Management System
		</div>
	</div>


	<style type="text/css" media="screen">

body {background-color: #f1f1f1;}
		/* Header of the page */
#header {
	width: 100%;
	position: relative;
	background: rgb(25,50,80);
	padding: 5px;
	margin-bottom: 1px;
	box-shadow: 0px 2px 5px rgba(0,0,0,0.6);
	display: flex;
	display: -webkit-flex;
	align-items: center;
}

#header #header_left {
	width: 12%;
	min-width: 50px;
}

#header #header_right {
	color: #fff;
	font-size: 50px;
	font-weight: bold;
	text-shadow: 1px 1px 1px #666;
	margin-bottom: 10px;
	margin-left: 20px;
}


#header #header_quote {
	position: absolute;
	bottom: 0;
	right: 10px;
	color: #fff;
	text-shadow: 1px 2px 1px #666;
	background: rgb(25,50,80);
	padding: 6px;
	border-radius: 5px;
	box-shadow: 0px 2px 5px #666 inset;
}

@media screen and (max-width: 590px) {
	#header {
		flex-direction: column;
	}

	#header #header_left {
		flex: 1;
	}

	#header #header_right {
		font-size: 20px;
	}
	#header #header_quote {
		display: none;
	}
}
	</style>
