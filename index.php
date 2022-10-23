<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

    //  phpinfo();

    logAccess();    

function logAccess(){

    $logPath = __DIR__ . "/logs/";

    $dateNow = date('Ymd');
    $timeNow = date('H:i:s');

    $logFileName = "access-log_" . $dateNow . '.csv';
    $logFullFileName = $logPath . $logFileName;

    $address = $_SERVER['REMOTE_ADDR'];

    if ($address == "192.168.1.1"){
        return;
    }

    // Decode IP address (https://ip-api.com/docs/api:json).
    $response = file_get_contents("http://ip-api.com/json/$address");
    $obj = json_decode($response);

    //echo $obj->status . "<br>";
    //echo $obj->country . "<br>";
    //echo $obj->city . "<br>";
    //echo $obj->regionName . "<br>";

    $geoStatus = $obj->status;
    $geoCountry = $obj->country;
    $geoCity = $obj->city;
    $geoRegion = $obj->regionName;

    $header = "Date,Time,IP Address,Geo Status,Geo Country,Geo City,Geo Region," . PHP_EOL;
    $message = $dateNow . "," . $timeNow . "," . $address . "," . $geoStatus . "," .$geoCountry . "," . $geoCity . "," . $geoRegion . "," . PHP_EOL;

    if (file_exists($logFullFileName)){
        file_put_contents($logFullFileName, $message, FILE_APPEND);
    }else{
        file_put_contents($logFullFileName, $header, FILE_APPEND);
        file_put_contents($logFullFileName, $message, FILE_APPEND);
    }
}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Kevin D Knapp R&eacute;sume</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css?20220416" rel="stylesheet">


<style type="text/css">

div.width-800 {
  max-width: 800px;
  margin: auto; 
}

div.height-top {
  height: 450px;
}

div.height-bottom {
  height: 370px;
}

@media (max-width: 1024px) {
    div.height-top, div.height-bottom {
        height: auto;
    }
}

/* For technology columns on iPad */
@media (max-width: 769px) {
    .col-md-4 {
        width: 100%;
    }
}

/*
@media (max-width: 768px) {
    div.height-top, div.height-bottom {
        height: auto;
    }
}
*/
ul.resume {
	padding-left:10em;
	list-style-type: "\2713"; 
    color: #666;
    margin: 10; padding: 0;
    display: inline-block;
	text-align:left;
}
li.resume {
	padding-left:10px;
}

/* contact section */
div.contact-height {
    height: 300px;
	text-align: center;
}
div.contact-align-left {
	text-align: left;
}
div.contact-spacer500 {
    height: 500px;
}
.align-left {
  text-align: left;
}
</style>

<script>

//alert("Current screen size: " + window.innerHeight  + "H x " + window.innerWidth + "W");

function setBackgroundImage() {
	var randomNumber = Math.floor(Math.random() * 15) + 1;

	randomNumber = 15;
	randomNumber = 18;
	//randomNumber = 19;
	//randomNumber = 20;
	randomNumber = 21;
	var backgroundImage = 'url(assets/img/background/background' + randomNumber + '.jpg)';
	//var backgroundImage = 'url(assets/img/background/home1.jpg)';
	//var backgroundImage = 'url(assets/img/background/bullitt_dash.jpg)';

    document.getElementById("home").style.backgroundImage = backgroundImage;
	document.getElementById("home").style.opacity = 1;
}
</script>

</head>

<body onload="setBackgroundImage()">

  	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">



            <h1 class="logo"><a href="index.php"><span class="bi bi-person"></span> Kevin D Knapp<!-- - IT Extraordinaire</a>--></h1>
            
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#home">Home</a></li>
                    <li><a class="nav-link scrollto" href="#summary">Summary</a></li>
                    <li><a class="nav-link scrollto" href="#tech">Technology</a></li>
                    <li><a class="nav-link scrollto" href="#education">Education</a></li>
                    <li><a class="nav-link scrollto" href="#work">R&eacute;sume</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav> <!-- .navbar -->
    	</div>
	</header><!-- End Header -->

	<!-- ======= Home Section ======= -->
	<div id="home" class="home route bg-image" style="background-image: url(assets/img/background7_.jpg)">
    	<!-- <div class="overlay-itro"></div> -->
        <div class="home-content display-table">
            <div class="table-cell">
                <div class="container">
					<!-- <p class="display-6 color-d">Hello, world!</p> -->
                    <h1 class="home-title mb-4">Kevin D Knapp</h1>
                    <p class="home-subtitle">
                    	<span class="typed" data-typed-items="IT Professional, Programmer, Designer, Developer, Administrator"></span>
                    </p>
                </div>
            </div>
    	</div>
	</div><!-- End Home Section -->

	<main id="main">
    
    <!-- ======= Professional Summary Section ======= -->
    <!-- <section id="summary" class="about-mf sect-pt4 route"> -->
    <section id="summary" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/themes/summary3.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full service-box align-left">
                    <div class="row">

                        <!--

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <ul class="list-ico">
                                        	<li><span class="bi bi-backspace-reverse"></span>Kevin D Knapp</li>
                                        	<li><span class="bi bi-geo-alt"></span>Montoursville, PA</li>
                                        	<li><span class="bi bi-phone"></span><a href="tel:+13032421569">(303) 242-1569</a></li>
                                        	<li><span class="bi bi-envelope"></span><a href="mailto: kevin@kevinknapp.name">kevin@kevinknapp.name</a></li>
                                            <li><span class="bi bi-linkedin"></span><a target="_blank" href="https://www.linkedin.com/in/kevin-d-knapp">linkedin.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->


     

                        <div class="col-md-12">
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box-2 text-center">
                                    <h3 class="title-a">
                                        Summary
                                    </h3>
                                    <div class="line-mf"></div>

                                </div>
<!-- kdk x -->
                                <p class="lead">
									<!--
									<span class="bi bi-asterisk"></span> Searching for a position that will relocate me to the Southwest region of the United States.
                                    <br><br>
									<span class="bi bi-flower3"></span> Searching for a position that will relocate me to the Southwest region of the United States.
                                    <br><br>
                                    -->
									<span class="bi bi-geo-fill"></span><strong>Searching for a position that will relocate me to the <u>Albuquerque area of New Mexico</u>.</strong>
                                    <br><br>

									<!--
									<span class="bi bi-globe"></span> Searching for a position that will relocate me to the Southwest region of the United States.
                                    <br><br>
									-->
                                    
									Seeking to secure a challenging position with a progressive company offering advancement based on merit and proven worth to that company.
									<br><br>
									Extremely detail oriented, innovative tech minded with over 25 years of experience working as a computer programmer, systems administrator, 
                                    web developer, systems analyst and general hardware and desktop support. Capable of working with a variety of technology and software solutions, with 
                                    excellent analytical and diagnostic problem solving skills. 

                                    <!--
                                    <br><br>
                                    Strong expertise in networking, mainframe and personal computers, mobile devices and computer peripherals.
                                    <br><br>
                                    -->

									<!--
									In my spare time, I enjoy reading, listening to music, technical gadgets, motorcycle riding and cars.  I've spend a majority of my carreer working in some aspect of the 
                                    automotive industry, and continue to enjoy.
									-->

                                    <!--
									Some personal interests include reading, discovering new music, electronic/technical gadgetry, motorcycles and anything automotive.
                                    -->
									<br><br>


                                    
                                    
									<!--
                                    <br><br>
                                    Valuable team member who has experience diagnosing problems and developing solutions. Extensive expertise in 
                                    networking systems and working with mainframe computers. Talented leader with unique ideas and a history of successful contributions in the field.
                                    <br>

                                    Born in Michigan, grew up in central Ohio, a current resident of Pennsylvania for the past 11 years.
                                    <br><br>
                                    Over 30 years working in technology. Lifelong gearhead and audiophile.
                                    <br><br>
                                    New interests are mountain biking, and rowing.
                                    <br><br>
                                    Good Analytic Skills, Deep Logic Building & Problem Solving Skills, Great Understanding of Data Structures & Algorithms, Efficient coder, 
                                    Sufficient knowledge about Computer Architecture & OS Concepts.
                                    <br><br>
                                    Kevin is from Montoursville, Pennsylvania where he works as a computer programmer and system administrator. He has 12 years experience as a Java software 
                                    engineer with a focus on APIs and micro-services and took the plunge into Ruby just this May. In his spare time she is an avid long form reader, lover of 
                                    all true-crime podcasts and is attempting to work through the primary Ashtanga yoga series.
                                    -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section> <!-- End About Section -->

	<!-- ======= Tech Section ======= -->
	<!-- <section id="tech" class="services-mf pt-5 route"> -->
    <section id="tech" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/themes/technology1.jpg)">
    <div class="container">
       	<div class="row">
       		<div class="col-sm-12">
           		<div class="title-box text-center service-box">
           			<h3 class="title-a">
               			Technology
           			</h3>
           			<div class="line-mf"></div>
           			<p class="subtitle-a">
						Proficient or familiar with a vast array of programming languages, concepts, technologies and Operating Systems, including, but not limited to:
           			</p>
           		</div>
       		</div>
       	</div> <!-- end row -->

		<div class="row">
			<div class="col-md-4">
            	<div class="service-box height-top">
                    <div class="service-ico">
                        <span class="ico-circle"><i class="bi bi-hdd"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Operating Systems</h2>
                    </div>

                    <a title="Wikipedia - Open Virtual Memory System" target="_blank" href="http://en.wikipedia.org/wiki/OpenVMS">OpenVMS <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Microsoft Windows Desktop and Server" target="_blank" href="http://en.wikipedia.org/wiki/windows">Windows <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Linux" target="_blank" href="http://en.wikipedia.org/wiki/linux">Linux <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Macintosh operating systems" target="_blank" href="http://en.wikipedia.org/wiki/Macintosh_operating_systems">Mac OS <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Raspbian" target="_blank" href="http://en.wikipedia.org/wiki/raspbian">Raspbian <span class="bi bi-link-45deg"></span></a>
	                <br>
                    <a title="Wikipedia - DOS" target="_blank" href="https://en.wikipedia.org/wiki/DOS">DOS <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Command-Line Interface" target="_blank" href="https://en.wikipedia.org/wiki/Command-line_interface">Command-Line Interface <span class="bi bi-link-45deg"></span></a>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="service-box height-top">
                    <div class="service-ico">
                        <span class="ico-circle"><i class="bi bi-body-text"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Scripting</h2>
                    </div>
                    <a title="Wikipedia - Visual Basic" target="_blank" href="http://en.wikipedia.org/wiki/Visual_Basic">Visual Basic <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Visual Basic Scripting Edition" target="_blank" href="http://en.wikipedia.org/wiki/Vbscript">VBScript <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Visual Basic for Applications" target="_blank" href="http://en.wikipedia.org/wiki/Visual_Basic_for_Applications">VBA <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Active Server Pages" target="_blank" href="http://en.wikipedia.org/wiki/Active_Server_Pages">ASP/.Net <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - HP Basic for OpenVMS" target="_blank" href="http://en.wikipedia.org/wiki/DEC_BASIC">HP/VSI Basic <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - JavaScript" target="_blank" href="http://en.wikipedia.org/wiki/Javascript">JavaScript <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - JavaScript Object Notation" target="_blank" href="http://en.wikipedia.org/wiki/json">JSON <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Hypertext Preprocessor" target="_blank" href="http://en.wikipedia.org/wiki/php">PHP <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Common Gateway Interface" target="_blank" href="http://en.wikipedia.org/wiki/Common_Gateway_Interface">CGI <span class="bi bi-link-45deg"></span></a>
					<br>
                    <a title="Wikipedia - Representational State Transfer" target="_blank" href="https://en.wikipedia.org/wiki/Representational_state_transfer">Rest API <span class="bi bi-link-45deg"></span></a>
					<br>
                    <a title="Wikipedia - jQuery" target="_blank" href="https://en.wikipedia.org/wiki/JQuery">jQuery <span class="bi bi-link-45deg"></span></a>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="service-box height-top">

                    <div class="service-ico">
                        <span class="ico-circle"><i class="bi bi-server"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Services</h2>
                    </div>

                    <a title="Wikipedia - Apache HTTP Server" target="_blank" href="http://en.wikipedia.org/wiki/Apache_HTTP_Server">Apache <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Internet Information Services" target="_blank" href="http://en.wikipedia.org/wiki/Internet_Information_Services">Internet Information Services (IIS) <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - File Transfer Protocol" target="_blank" href="http://en.wikipedia.org/wiki/ftp">FTP <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Secure File Transfer Protocol" target="_blank" href="http://en.wikipedia.org/wiki/SSH_File_Transfer_Protocol">SFTP <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - TELecommunication NETwork" target="_blank" href="http://en.wikipedia.org/wiki/Telnet">Telnet <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Xen" target="_blank" href="http://en.wikipedia.org/wiki/Xen">Citrix Hypervisor/XenServer <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - VMware" target="_blank" href="http://en.wikipedia.org/wiki/vmware">VMware <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Amazon Web Services" target="_blank" href="https://en.wikipedia.org/wiki/Amazon_Web_Services">Amazon Web Services <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Twilio" target="_blank" href="https://en.wikipedia.org/wiki/Twilio">Twilio <span class="bi bi-link-45deg"></span></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-box height-bottom">
                    <div class="service-ico">
                        <span class="ico-circle"><i class="bi bi-tools"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Tools</h2>
                    </div>

                    <a title="Wikipedia - Microsoft Office" target="_blank" href="http://en.wikipedia.org/wiki/Microsoft_Office">Microsoft Office <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Visual Studio Code" target="_blank" href="https://en.wikipedia.org/wiki/Visual_Studio_Code">Visual Studio Code <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - LibreOffice" target="_blank" href="https://en.wikipedia.org/wiki/LibreOffice">LibreOffice <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Adobe Dreamweaver" target="_blank" href="http://en.wikipedia.org/wiki/Adobe_Dreamweaver">Dreamweaver <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Xen" target="_blank" href="http://en.wikipedia.org/wiki/xen">XenServer <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Google Docs" target="_blank" href="https://en.wikipedia.org/wiki/Google_Docs">Google Docs <span class="bi bi-link-45deg"></span></a>
                    <br>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-box height-bottom">
                    <div class="service-ico">
                        <span class="ico-circle"><i class="bi bi-bricks"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Design</h2>
                    </div>

                    <a title="Wikipedia - HyperText Markup Language" target="_blank" href="http://en.wikipedia.org/wiki/HTML">HTML <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Dynamic HTML" target="_blank" href="http://en.wikipedia.org/wiki/DHTML">DHTML <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Extensible Markup Language" target="_blank" href="http://en.wikipedia.org/wiki/XML">XML <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Extensible HyperText Markup Language" target="_blank" href="http://en.wikipedia.org/wiki/XHTML">XHTML <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Asynchronous JavaScript and XML" target="_blank" href="http://en.wikipedia.org/wiki/AJAX">Ajax <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Cascading Style Sheets" target="_blank" href="http://en.wikipedia.org/wiki/CSS">CSS <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Database" target="_blank" href="https://en.wikipedia.org/wiki/Database">Database <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Bootstrap Technology" target="_blank" href="https://en.wikipedia.org/wiki/Bootstrap_(front-end_framework)">Bootstrap <span class="bi bi-link-45deg"></span></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-box height-bottom">
                    <div class="service-ico">
                        <!-- <span class="ico-circle"><i class="bi bi-card-checklist"></i></span> -->
                        <span class="ico-circle"><i class="bi bi-align-middle"></i></span>
                    </div>

                    <div class="service-content">
                        <h2 class="s-title">Bits and Bytes</h2>
                    </div>

                    <a title="Wikipedia - DIGITAL Command Language" target="_blank" href="http://en.wikipedia.org/wiki/DIGITAL_Command_Language">DCL <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Structured Query Language" target="_blank" href="http://en.wikipedia.org/wiki/sql">SQL <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Networking" target="_blank" href="http://en.wikipedia.org/wiki/computer_network">Networking <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Common Object Request Broker Architecture" target="_blank" href="https://en.wikipedia.org/wiki/Common_Object_Request_Broker_Architecture">Corba <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Multipurpose Internet Mail Extensions" target="_blank" href="http://en.wikipedia.org/wiki/MIME">MIME <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Command-Line Interface" target="_blank" href="https://en.wikipedia.org/wiki/Command-line_interface">Command-Line Interface <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Raspberry Pi" target="_blank" href="https://en.wikipedia.org/wiki/Raspberry_Pi">Raspberry Pi <span class="bi bi-link-45deg"></span></a>
                    <br>
                    <a title="Wikipedia - Adobe Photoshop" target="_blank" href="https://en.wikipedia.org/wiki/Adobe_Photoshop">Adobe Photoshop <span class="bi bi-link-45deg"></span></a>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
	</section><!-- End Tech Section -->


    <!-- ======= Education Section ======= -->
	<!-- <section id="education" class="portfolio-mf sect-pt4 route"> -->
    <section id="education" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/themes/education1.jpg)">
    <div class="container">

        <!--
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center service-box">
                    <h3 class="title-a">
                        Education
                    </h3>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        -->

        <div class="row">
            <div class="col-md-12">
                <div class="service-box">
                    <h3 class="title-a">
                        Education
                    </h3>
                    <div class="line-mf"></div>
                    <br><br>    

                    <div class="service-content">
                        <h1 class="w-title">1994 - 1996</h1>
                        <h2 class="s-title">Denver Institute of Technology</h2>
                        <h1 class="w-title">Denver, Colorado</h1>
                        <h2 class="w-title">Associate Degree in Computer Programming (3.9 GPA)</h2>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
	</section>

    <!-- ======= Resume Section ======= -->
    <!-- <section id="work" class="portfolio-mf sect-pt4 route"> -->
    <section id="work" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/themes/resume2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center service-box">
                    <h3 class="title-a">
                        R&eacute;sume
                    </h3>
                    <div class="line-mf"></div>
                    <p class="subtitle-a">
                        <a class="nav-link scrollto " target="_new" href="KevinKnappResume.pdf">Download R&eacute;sume &nbsp;<span class="bi bi-download"></span></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="service-box">
                    <div class="service-content">
                        <h1 class="s-title">Web &amp; Application Programmer / Systems Administrator</h1>
                        <h1 class="w-title">Auto Trakk, LLC</h1>
                        <h1 class="w-title">Montoursville, Pennsylvania</h1>
                        <h1 class="w-title">October 2010 - present</h1>
                    </div>

<!-- kdk x -->
                    <div class="service-content width-800">
						<ul class="resume">
                            <li class="resume">Create highly interactive and customized web UIs utilizing a variety of programming and scripting languages</li>
                            <li class="resume">Develop and maintain multiple customized software solutions, unique to the automotive leasing industry</li>
                            <li class="resume">Create and apply UI requirements utilizing a variety of programming and scripting languages</li>
                            <li class="resume">Develop and maintain web and application APIs using multiple client languages</li>
                            <li class="resume">Systems administration for OpenVMS, Linux and Windows</li>
                            <li class="resume">Hardware configuration, management and support</li>
                            <li class="resume">Citrix Hypervisor/XenServer administration</li>
                            <li class="resume">Responsive web app development</li>
                            <li class="resume">User training &amp; support</li>
						</ul>

						<div align="left">
                            <strong>
                                I've spent much of the past 20 years developing a complex web based automotive lease accounting system that primarily caters towards credit challenged 
                                consumers, which is used throughout the United States and Puerto Rico. The system is complete, from originations to collections and repossessions, and features 
                                advanced technologies such as electronic payment processing, credit bureau reporting, vehicle starter interrupts, GPS tracking, insurance tracking and more.
                                <br><br>
                                I began development on the system in 2001, while working for Systems For Financial Accounting, Inc. (below), and relocated from Colorado to Pennsylvania to work for 
                                Auto Trakk and continue development on premises, in 2010.
                            </strong>
 						</div>
					</div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="service-box">
                    <div class="service-content">
                        <h1 class="s-title">IT Manager / Programmer</h1>
                        <h1 class="w-title">Import Parts Warehouse</h1>
                        <h1 class="w-title">Denver, Colorado</h1>
                        <h1 class="w-title">May 2009 - October 2010</h1>
                    </div>

                    <div class="service-content width-800">
						<ul class="resume">
                            <li class="resume">Developed an online order tracking and ticket API for RockAuto.com, providing real-time access to parts inventory</li>
                            <li class="resume">Help desk support for software and hardware</li>
                            <li class="resume">Public, Intranet and Wiki web development</li>
                            <li class="resume">Network and security administration</li>
                            <li class="resume">Windows administration and support</li>
				            <li class="resume">VMware administration</li>
						</ul>
					</div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="service-box">
                    <div class="service-content">
                        <h1 class="s-title">Programmer / System Analyst</h1>
                        <h1 class="w-title">Systems For Financial Accounting, Inc.</h1>
                        <h1 class="w-title">Lakewood, Colorado</h1>
                        <h1 class="w-title">May 1997 - May 2009</h1>
                    </div>

                    <div class="service-content width-800">
						<ul class="resume">
                            <li class="resume">Converted legacy system to web based technologies, supporting thousands of daily users (see Auto Trakk, LLC above)</li>
                            <!-- <li class="resume">Adapted web based technologies to a legacy "green screen" lease accounting system, for a leading automotive leasing company, providing customers and dealers access across the country</li> -->
                            <li class="resume">Installation and configuration of multiple network platforms and remote access systems</li>
                            <li class="resume">Systems administration and management for OpenVMS and Windows servers</li>
                            <li class="resume">Developed a web based in-house support tracking and ticketing system</li>
                            <li class="resume">Help desk support for networks, software and hardware</li>
						</ul>
					</div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="service-box">
                    <div class="service-content">
                        <h1 class="s-title">Database Administrator / Programmer <!-- / Parts and Technical Specialists</h1> -->
                        <h1 class="w-title">Engine Parts Group, Inc.</h1>
                        <h1 class="w-title">Wheat Ridge, Colorado</h1>
                        <h1 class="w-title">May 1996 - May 1997</h1>
                    </div>

                    <div class="service-content width-800">
						<ul class="resume">
                            <li class="resume">Provided software/hardware support for an in-house inventory, accounting and electronic cataloging software</li>
                            <li class="resume">Creator of an automotive technical article, published in a quarterly newsletter</li>
                            <li class="resume">Established and maintained relations with automotive vendors and suppliers</li>
                            <li class="resume">Wrote scripts to import vendor data into electronic cataloging software</li>
						</ul>
					</div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
	</section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)"> -->
    <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/themes/contact8.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div id="contact" class="box-shadow-full service-box contact-height_">
                <div class="title-box-2_">
                    <h3 class="title-a">Contact</h3>
                </div>
                <div class="line-mf"></div>
                <div class="col-md-12">&nbsp;</div>
                <div class="row">
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-7 contact-align-left">
                        <ul class="list-ico">
                            <li><span class="bi bi-backspace-reverse"></span>Kevin D Knapp</li>
                            <li><span class="bi bi-geo-alt"></span>Montoursville, PA</li>
                            <li><span class="bi bi-phone"></span><a href="tel:+13032421569">(303) 242-1569</a></li>
                            <li><span class="bi bi-envelope"></span><a href="mailto: kevin@kevinknapp.name">kevin@kevinknapp.name</a></li>
                            <li><span class="bi bi-linkedin"></span><a target="_blank" href="https://www.linkedin.com/in/kevin-d-knapp">linkedin.com/in/kevin-d-knapp</a></li>
                        </ul>
                    </div>
                </div>  <!-- end row -->
            </div>
        </div>  <!-- end row -->
        <div class="row contact-spacer500">&nbsp;</div>
        </div>  <!-- end container -->
        </section>  <!-- end contact section -->

    </main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer>
	<div class="container">
		<div class="row">
        	<div class="col-sm-12">
          		<div class="copyright-box">
            		<!-- <p class="copyright">&copy; Copyright <strong>I like it when people call me Ace</strong>. All Rights Reserved</p> -->
            		<p class="copyright"><strong>&copy; Copyright 2022; I like it when people call me Ace</strong>.</p>
            		<div class="credits">
              			<!--
              			All the links in the footer should remain intact.
              			You can delete the links only if you purchased the pro version.
              			Licensing information: https://bootstrapmade.com/license/
              			Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            			-->
            			<!--
              				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            			-->
					</div>
          		</div>
        	</div>
      	</div>
	</div>
	</footer> <!-- End  Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<!-- <script src="assets/vendor/purecounter/purecounter.js"></script> -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script> 
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/typed.js/typed.min.js"></script> 
	<!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
</body>
</html>