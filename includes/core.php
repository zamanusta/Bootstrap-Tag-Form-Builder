<?php 
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    
    return substr($string, $ini, $len);
}

function between_chars($string){
	$string = str_replace("\",\"", "\" \"", $string);
	$string = str_replace("\", \"", "\" \"", $string);
    preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $string, $array);
    return $array;
}

function form_item($line, $item) {
	$formgroup = array();
		$words = explode(" ", trim($line));
		$placeholder = get_string_between($line, '[p:', ']');
		$type = $words[0];
		$col = end($words);
			switch ($col) {
			    case "1":
			       $colclass = "col-12";
			        break;
			    case "1/2":
			        $colclass = "col-6";
			        break;
			    case "1/3":
			        $colclass = "col-4";
			        break;
			    case "1/4":
			        $colclass = "col-3";
			        break;
			    case "1/6":
			        $colclass = "col-2";
			        break;			        			        
			    case "1/12":
			        $colclass = "col-1";
			        break;			    
			    
			    default:
			        $colclass = "col-12";
			}
		
			if (substr($words[1], 0, 1) != "[") {
			    $name = $words[1];
			} else {
				$name = "input$item";
			}
				
		$inputtext = "";
		
		//INPUT
		if (($type=="text") ||($type=="date") || ($type=="number") || ($type=="hidden") || ($type=="password") || ($type=="time")) {
			$value = get_string_between($line, '[v:', ']');
			$label = get_string_between($line, '[l:', ']');
			$min = get_string_between($line, '[min:', ']');
			$max = get_string_between($line, '[max:', ']');
			$formgroup [] = "<div class='form-group $colclass'>";
			if (!empty($label)) { $formgroup[] = "<label for='item$item'>$label</label>"; }			
			$inputtext .= "<input class='form-control' name='$name' id='item$item' type='$type' ";
			$helptext = get_string_between($line, '[h:', ']');
			if (!empty($placeholder)) { $inputtext .= "placeholder='$placeholder' "; }
			if (!empty($value)) { $inputtext .= "value='$value' "; }
			if (!empty($min)) { $inputtext .= "min='$min' "; }
			if (!empty($max)) { $inputtext .= "max='$max' "; }
			if (strpos($line, '##') !== false) {
			    $inputtext .= "disabled ";
			}
			if (strpos($line, '**') !== false) {
			    $inputtext .= "required ";
			}
			$inputtext .= "/>";
			$formgroup [] = $inputtext;
		if (!empty($helptext)) { $formgroup [] = "<small class='form-text text-muted'>$helptext</small>"; }
		$formgroup [] = "</div>";
		}
		
		
		//CHECKBOX RADIOBOX
		if (($type=="checkbox") || ($type=="check") || ($type=="radio")) {
			$options = get_string_between($line, '[o:', ']');
			$ptext = get_string_between($line, '[l:', ']');
			$values = get_string_between($line, '[v:', ']');
			$helptext = get_string_between($line, '[h:', ']');
			$inline = "";
			if ($type=="check") { $type = "checkbox"; }
			if (strpos($line, '@@') !== false) {
			    $inline .= " form-check-inline";
			}
			if (!empty($options)) {				
				$optionsarray = between_chars($options);				
			}
			if (!empty($values)) {				
				$valuesarray = between_chars($values);			
			} else {
				$valuesarray = between_chars($options);	
			}
			$formgroup [] = "<div class='form-group $colclass'>";
			$formgroup [] = "<p>$ptext</p>";
			if (isset($optionsarray)) {
				$v=-1;	
			foreach ($optionsarray[0] as $option) {
				$inputtext = "";
				$item++;
				$v++;
				$option = trim($option, '"');
				$formgroup [] = "<div class='form-check$inline'>";			
				$inputtext .= "<input class='form-check-input' name='$name' id='item$item' type='$type' ";
				$inputtext .= "value='".trim($valuesarray[0][$v], '"')."' ";
				if (strpos($line, '##') !== false) {
				    $inputtext .= "disabled ";
				}
				if (strpos($line, '**') !== false) {
				    $inputtext .= "required ";
				}
				$inputtext .= "/>";
				$formgroup [] = $inputtext;
				$formgroup[] = "<label class='form-check-label' for='item$item'>$option</label>"; 
				
				$formgroup [] = "</div>";
			}
			if (!empty($helptext)) { $formgroup [] = "<small class='form-text text-muted'>$helptext</small>"; }
			}
			$formgroup [] = "</div>";
			
		}
		//CHECKBOX FINAL
		
		if (($type=="title")) {
			$titletext = between_chars($line);
			$style="";
		if (strpos($line, '--') !== false) {
			    $style = "style='border-bottom:1px #ddd solid;'";
			}
			$formgroup [] = "<div class='form-group $colclass'  $style>";
			$formgroup [] = "<$name>".trim($titletext[0][2], "\"")."</$name>";
			
			$formgroup [] = "</div>";
		}
		
		if (($type=="button")) {
			$titletext = between_chars($line);
			$style="";
			$buttonclass = "btn ";
			if (strpos($line, 'bb') !== false) {
			    $buttonclass .= "btn-block";			    
			}
			if (strpos($line, '##') !== false) {
				    $buttondis = "disabled";
				} else {
					$buttondis = "";
				}
			$color = get_string_between($line, '[', ']');
			
			$formgroup [] = "<div class='form-group $colclass'  $style>";
			$formgroup [] = "<button id='item$item' type='$name' name='$name' class='$buttonclass btn-$color' $buttondis>".trim($titletext[0][2], "\"")."</button>";
			
			$formgroup [] = "</div>";
		}
		
		//TEXT AREA
	if (($type=="textarea")) {
			$value = get_string_between($line, '[v:', ']');
			$label = get_string_between($line, '[l:', ']');
			$formgroup [] = "<div class='form-group $colclass'>";
			if (!empty($label)) { $formgroup[] = "<label for='item$item'>$label</label>"; }			
			$inputtext .= "<textarea class='form-control' name='$name' id='item$item' ";
			$helptext = get_string_between($line, '[h:', ']');
			if (!empty($placeholder)) { $inputtext .= "placeholder='$placeholder' "; }			
			if (strpos($line, '##') !== false) {
			    $inputtext .= "disabled ";
			}
			if (strpos($line, '**') !== false) {
			    $inputtext .= "required ";
			}
			$inputtext .= "/>";
			if (!empty($value)) { $inputtext .= $value; }
			$inputtext .= "</textarea>";
			$formgroup [] = $inputtext;
			if (!empty($helptext)) { $formgroup [] = "<small class='form-text text-muted'>$helptext</small>"; }
		$formgroup [] = "</div>";
		}
		//CHECKBOX FINAL
		
		//DROPBOX
	if (($type=="selectbox") || ($type=="select")) {
		
			$options= get_string_between($line, '[o:', ']');
			$label = get_string_between($line, '[l:', ']');
			$values = get_string_between($line, '[v:', ']');
			$placeholder = get_string_between($line, '[p:', ']');
			if (strpos($line, '**') !== false) {
					    $inputtext = "required ";
					} else {
						$inputtext = "";
					}
			if (strpos($line, '##') !== false) {
					    $inputtext2 = "disabled ";
					} else {
						$inputtext2 = "";
					}
			$inline = "";			
			if (!empty($options)) {				
				$optionsarray = between_chars($options);				
			}
			if (!empty($values)) {				
				$valuesarray = between_chars($values);			
			} else {
				$valuesarray = between_chars($options);	
			}
			$formgroup [] = "<div class='form-group $colclass'>";
			$formgroup [] = "<label for='item$item'>$label</label>"; 
			$formgroup [] = "<select id='item$item' name='$name' class='form-control' $inputtext2 $inputtext>";
			if (!empty($placeholder)) {				
				$formgroup [] = "<option selected disabled>$placeholder</option>";			
			}
			if (isset($optionsarray)) {
				$v=-1;
				foreach ($optionsarray[0] as $option) {
					$inputtext = "";				
					$v++;
					$option = trim($option, '"');
					$inputtext .= "<option ";
					if (strpos($option, '!!') !== false) {
					    $inputtext .= "disabled ";
					}
					if (strpos($option, '$$') !== false) {
					    $inputtext .= "selected ";
					}
					$inputtext .= "value='".trim($valuesarray[0][$v], '"$$!!')."'>".trim($option,  '"$$!!')."</option>";
					
					$formgroup [] = $inputtext;
				
				}
				$formgroup [] = "</select>";
			}
			$formgroup [] = "</div>";
			
		}
		
	return $formgroup;
}

function preview($formitems) {
	echo '<form>';
	echo '<div class="form-row">';
	foreach ($formitems as $formgroup) { 
		foreach ($formgroup as $formitem) {
			echo $formitem;
		}
	}
	echo '</div>';
	echo '</form>';
}

function printcode($formitems) {
	echo "<pre id='htmlcode' class='my-pre border border-secondary' style='height:300px;'><code>";
	echo htmlentities('<form>')."</br>";
	echo htmlentities('<div class="form-row">')."</br>";
	foreach ($formitems as $formgroup) {
		foreach ($formgroup as $formitem) {
			echo htmlentities($formitem)."</br>";
		}
	}
	echo htmlentities('</div>')."</br>";	
	echo htmlentities('</form>');
	echo "</pre></code>";	
}

?>