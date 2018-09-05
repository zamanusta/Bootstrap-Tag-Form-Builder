<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">

ode, samp, kbd {
	font-family: "Courier New", Courier, monospace, sans-serif;
	text-align: left;
	color: #555;
	}
pre code {
	line-height: 1.6em;
	font-size: 11px;
	}
pre {
	padding: 0.1em 0.5em 0.3em 0.7em;
	border-left: 11px solid #ccc;
	margin: 1.7em 0 1.7em 0.3em;
	overflow: auto;
	width: 93%;
	}
/* target IE7 and IE6 */
*:first-child+html pre {
	padding-bottom: 2em;
	overflow-y: hidden;
	overflow: visible;
	overflow-x: auto; 
	}
* html pre { 
	padding-bottom: 2em;
	overflow: visible;
	overflow-x: auto;
	}
	
	@import "compass/css3";

* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }



textarea .takenote{
  background-image: linear-gradient(#F1F1F1 50%, #F9F9F9 50%);
  background-size: 100% 4rem;
  border: 1px solid #CCC;
  width: 100%;
  height: 400px;
  line-height: 2rem;
  margin: 0 auto;
  padding: 4px 8px;
}
</style>
<title>Bootstrap 4 Form Builder</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><b>Boostrap 4 Form Builder</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation.php">Documentation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>

    </ul>
  </div>
</nav>

<?php include "includes/core.php";?>