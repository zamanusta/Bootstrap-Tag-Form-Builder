<?php 
include "includes/header.php";
$lines=$code="";
$formgroup =  $words = array();
$code = '
title h4 "Customer Registration Form" --***
text cusname [p:Name-Surname]  [l:Name of the Customer] 1/2***
radio [l:Gender] [o:"Female" "Male"] [v:"f" "m"] @@ 1/2***
select [p:Please Select] [l:Registered Branch]  [o:"Berlin" "Paris" "Istanbul!!"] [v:"1" "2" "3"] 1/2***
number cusage [l:Number of Renewals] [v:5] [min:4] 1/2***
checkbox [o:"Update Main Server"]***
textarea notes [l:Notes] [p:Your personal notes about customer]***
button submit "Update" [success] bb 1/3***
button reset "Reset" [secondary] bb 1/3
';

if(isset($_POST['submit'])){
	$start = 1;
	$code = $_POST['code'];
	
	$lines = explode("\n", $code);
	$item=0;
	
	foreach ($lines as $line) {
		if ($line!="") {
			if ($line=="[row]") {
				
			} elseif ($line=="[col]") {
				
			} else {
				$item++;
				
				$formitems [] = form_item($line, $item);
				
			}
			
		}	
	}
	
} else {
	
	
	$lines = explode("***", $code);
	$item=0;
	
	foreach ($lines as $line) {
		if ($line!="") {
			if ($line=="[row]") {
				
			} elseif ($line=="[col]") {
				
			} else {
				$item++;
				
				$formitems [] = form_item($line, $item);
				
			}
			
		}	
	}
			
}


?>
<div class="container-fluid">
<div class="row mt-1 ml-1 mr-1">

</div>
	<div class="row m-4">
		<div class="col-sm-5"> 
			<div class="border border-secondary p-4 bg-light">
				<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<h4 class="mb-4" >Your Short Codes</h4>
				
				<textarea id="code" name="code" style="height:400px; width:100%; font-size:80%;" class="takenote"><?php echo str_replace("***", "", $code);?></textarea>
				
				<br></br><button class="btn btn-block btn-warning" type="submit" name="submit">Preview >></button>
				</form>
				<br>
				<h5 class="mb-4" >Add Sample Codes:</h5>
				<button class="btn btn-sm mb-1" id="addtitle">+ Title</button>
				<button class="btn btn-sm mb-1" id="addtext">+ Text</button>
				<button class="btn btn-sm mb-1" id="addnumber">+ Number</button>
				<button class="btn btn-sm mb-1" id="addtime">+ Time</button>
				<button class="btn btn-sm mb-1" id="adddate">+ Date </button>
				<button class="btn btn-sm mb-1" id="addpassword">+ Password </button>
				<button class="btn btn-sm mb-1" id="addtextarea">+ Textarea</button>
				<button class="btn btn-sm mb-1" id="addselect">+ Select</button>
				<button class="btn btn-sm mb-1" id="addcheck">+ Check</button>
				<button class="btn btn-sm mb-1" id="addradio">+ Radio</button>
				<button class="btn btn-sm mb-1" id="addbutton">+ Button</button>
				
				<?php //include "helpfile.php";?>
				<div id="helpdiv" class="mt-4"></div>
			</div>
			
				
				
				
			
		</div>
		
		<div class="col-sm-7"> 
			<div class="border border-primary p-4 bg-light">
				<h4 class="mb-4" >Preview</h4>
				<div class="bg-white p-4 border border-warning">
					<?php
					
					preview ($formitems);
								
					?>
				</div>
				<div class="col-sm-12 mt-4 border border-danger">
				<h4 class="mb-4 mt-4" >HTML Codes <small><a id="copybutton" href="">[Copy]</a></small></h4>
					<?php
					
					printcode ($formitems);
					
					?>
				</div>
				
			</div>		
		</div>
		
	</div>

</div>


<div style="display:none;">
<div id="titlehelp">
<h4>Title</h4>
<small><p class="border border-secondary bg-warning p-1">title <i>class</i> "title text" [attributes]</p></small>
<p><b>Classes:</b> <small>h1, h2 ... h6</small>
</br><b>Attributes:</b> <small>--: Border-bottom</p></small>
<small><p class="border border-secondary bg-white p-1">title h3 "Registration Form" --
</br>title h5 "Name of Company"
</p></small>
</br>
</div>

<div id="texthelp">
<h4>Text Inputs</h4>
<p>For <b>input</b> style of <i>text, date, number, password</i>:</p>
<small><p class="border border-secondary bg-warning p-1"><i>type</i> name [parameters] [attributes] <i>column-size</i></p></small>
<p><b>Types:</b> <small>text, date, time, number, password</small>
</br><b>Parameters:</b> <small>p: placeholder, l: label, v: value, h: help-text, min: minimum (for date, time, number), max: (for date, time, number)</small>
</br><b>Attributes:</b> <small>**: required, ##: disabled</p></small>
<small><p class="border border-secondary bg-white p-1">text customername [l:Name of Customer] [p:Name - Surname] ** 1/2
</br>date regdate [l:Date of Registration] ** 1/2
</br>number customerage [l:Age of Customer] [v:30] [min:18] ## 1/3
</br>time time-entrance [l:Time of Entrance] [min:09:00] [max:23:00] ## 1/3
</p></small>
</br>
</div>

<div id="checkhelp">
<h4>Radios and Checks</h4>
<p>For <b>input</b> style of <i>checkbox, radio</i>:</p>
<small><p class="border border-secondary bg-warning p-1"><i>type</i> name [parameters] [attributes] <i>column-size</i></p></small>
<p><b>Types:</b> <small>checkbox, radio</small>
</br><b>Parameters:</b> <small>l: label, o: options, v: values, h: help-text</small>
</br><b>Attributes:</b> <small>**: required, ##: disabled, @@: inline, </p></small>
<small><p class="border border-secondary bg-white p-1">radio country [l:Country of Birth] [o:"UK" "USA"] **
</br>radio city [l:Destination] [o:"Ankara" "Sofia"] [v:"1" "2"] [h:Please Select Destination] @@ 1/2
</br>checkbox customerage [l:Age of Customer] [o:18+] [v:1] [h:Currently not open for people older than 18] ## 1/3
</p></small>
</br>
</div>

<div id="selecthelp">
<h4>Select Box (Dropdown)</h4>
<p>For <b>input</b> style of <i>selectbox</i>:</p>
<small><p class="border border-secondary bg-warning p-1">select name [parameters] [attributes] <i>column-size</i></p></small>
<p><b>Parameters:</b> <small>l: label, o: options, v: values, h: help-text</small>
</br><b>Attributes:</b> <small>**: required, ##: disabled, $$:selected (in option quotation marks), !!:disabled (in option quotation marks)</p></small>
<small><p class="border border-secondary bg-white p-1">select country [l:Country of Birth] [o:"UK!!" "USA"] **
</br>select [l:Destination] [o:"Ankara$$" "Berlin" "Paris" "Rome!!" "Sofia!!"] [v:"1" "2" "3" "4" "5"] [h:Please Select Destination] ** 1/2
</br>checkbox customerage [l:Age of Customer] [o:18+] [v:1] [h:Currently not open for people older than 18] ## 1/3
</p></small>
</br>
</div>

<div id="textareahelp">
<h4>Textarea</h4>
<p>For <b>input</b> style of <i>textarea</i>:</p>
<small><p class="border border-secondary bg-warning p-1">select name [parameters] [attributes] <i>column-size</i></p></small>
<p><b>Parameters:</b> <small>p: placeholder, l: label, v: values, h: help-text</small>
</br><b>Attributes:</b> <small>**: required, ##: disabled</p></small>
<small><p class="border border-secondary bg-white p-1">textarea notes [l:Quick Notes] [p:Write your note here]
</p></small>
</br>
</div>

<div id="buttonhelp">
<h4>Button</h4>
<small><p class="border border-secondary bg-warning p-1">button name "button text" [bootstrap-class] [attributes] <i>column-size</i></p></small>
<p><b>Bootstrap Class:</b> <small>primary, secondary, success, info, dark, light, warning, danger... Get more info about <a href="https://getbootstrap.com/docs/4.1/utilities/colors/">Bootstrap Colors</a>.</small>
</br><b>Attributes:</b> <small>bb: block-size button</p></small>
<small><p class="border border-secondary bg-white p-1">button submit "Send" [primary] bb
</br>button reset "Reset" [secondary] 1/3
</p></small>
</br>
</div>


</div>




<script>
function copyFunction() {
  const copyText = document.getElementById("htmlcode").textContent;
  const textArea = document.createElement('textarea');
  textArea.textContent = copyText;
  document.body.append(textArea);
  textArea.select();
  document.execCommand("copy");
  alert('Copied to the Clipboard.');
}
function exportHTML() {
	  const copyText = document.getElementById("htmlcode").textContent;
	  const textArea = document.createElement('textarea');
	  textArea.textContent = copyText;
	  document.body.append(textArea);
	  textArea.select();
	  document.execCommand("copy");
	}

document.getElementById('copybutton').addEventListener('click', copyFunction);
$(document).ready(function(){
$("#addtext").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + "text txtname [p:Placeholder Text]  [l:Label Text] [h:Help Text] 1/1 \n");	
	var help = $('#texthelp').html();	
	$('#helpdiv').html(help);
});
$("#addtime").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + "time timename [l:Label Text] [h:Help Text] [min:00:01] [max:23:59] [v:23:00] 1/1 \n");
	var help = $('#texthelp').html();	
	$('#helpdiv').html(help);
});
$("#adddate").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + "date datename [l:Label Text] [min:2018-01-01] 1/1 \n");
	var help = $('#texthelp').html();	
	$('#helpdiv').html(help);
});
$("#addpassword").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + "password pwname [l:Label Text] 1/1 \n");
	var help = $('#texthelp').html();	
	$('#helpdiv').html(help);
});
$("#addnumber").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + "number numname [l:Label Text] [max:99] 1/1 \n");
	var help = $('#texthelp').html();	
	$('#helpdiv').html(help);
});
$("#addtitle").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'title h3 "Title Here" -- \n');
	var help = $('#titlehelp').html();	
	$('#helpdiv').html(help);
});
$("#addtextarea").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'textarea txtname [p:Placeholder Text]  [l:Label Text] [h:Help Text] 1/1 \n');
	var help = $('#textareahelp').html();	
	$('#helpdiv').html(help);
});
$("#addcheck").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'check [l:Label Text] [o:"Option Text"] [v:"1"] 1/1 \n');
	var help = $('#checkhelp').html();	
	$('#helpdiv').html(help);
});
$("#addradio").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'radio [l:Label Text] [o:"Option1 Text", "Option2 Text", "Option3 Text"] [v:"1", "2", "3"] @@ 1/1 \n');
	var help = $('#checkhelp').html();	
	$('#helpdiv').html(help);
});
$("#addselect").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'select [p:Select...] [l:Label Text] [o:"Select1 Text", "Select2 Text", "Disabled Text!!"] [v:"1", "2", "3"] @@ 1/1 \n');
	var help = $('#selecthelp').html();	
	$('#helpdiv').html(help);
});
$("#addbutton").click(function(){
	var txt = $("textarea#code");
	txt.val( txt.val() + 'button submit "Button Text" [info] bb 1/3 \n');
	var help = $('#buttonhelp').html();	
	$('#helpdiv').html(help);
});
});
</script>

</body>
</html>