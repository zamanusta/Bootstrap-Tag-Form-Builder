<div class="container">
<div class="row">
<div class="col">
<h3 class="mt-4 mb-2 pb-2" style="border-bottom:1px #ccc solid;">Documentation:</h3>
</br>

<h4>Introduction</h4>
<p>Bootstrap 4 Form Builder script is a tool for creating Bootstrap 4 forms by using simple tag system. The purpose of the script is making the form-building process easier by modifying tags rather than the code. Complex forms can be build in minutes by using this script.</p>
<h5>Format</h5>
<p>The general format of the taglines are as below:</p>
<small><p class="border border-secondary bg-warning p-1">type name [parameters} [attributes] column-size</p></small>
<p>First element has to be the type of the item. Name element is not mandatory. When it is not defined, a name is assigned automatically. The order of parameters and attributes are not important. However column-size has to be in the end.</p>
<h5>Parameters</h5>
<p>Parameters are given with a format like [p:...]. For single element parameters, there is no need for quotation marks (For ex: Label). However, multiple element parameters (such as the options of a selectbox) must be in double quotation marks. For example, the text of options of a select box is given like [o:"A", "B", "C"]. The values of these options can be given manually (like [v:"1", "2", "3"]). When value parameter is missing, values are created from the text values of options automatically.</p>
<p>Common Parameters are:</p>
<ul>
<li><b>l: label -</b> Label of an input element.</li>
<li><b>p: placeholder -</b> Placeholder of an input element -help text inside-</li>
<li><b>v: value -</b> Value of input element, used when an input is wanted to have a ready value when the form loaded first. It is also used for determining the post values of options.</li>
<li><b>h: helptext -</b> Small text appears under the input, when an additional explanation is required.</li>
<li><b>o: options -</b> Text of options (used for selectbox, checkbox and radio options.</li>
<li><b>font size -</b> Only applicable for title, written directly as h1 ... h6.</li>
<li><b>bootstrap color -</b> Only applicable for button, written between brackets (Ex: [success]).</li> 
</ul>
<br>
<h5>Attributes</h5>
<p>Attributes are written directly to the line or inside the option text (before closing double quotation) and consists of two characters. </p>
<p>Common attributes are:</p>
<ul>
<li><b>** (required) :</b> Make the field required for validation.</li>
<li><b>## (disabled) :</b> Make the field disabled.</li>
<li><b>@@ (inline) :</b> Makes multiple checkboxes and radio options inline when used.</li>
<li><b>$$ (selected) :</b> Only applicable for selectbox, for option which wanted to be shown selected on load. Written before closing the quotation mark (For ex: [o:"Opt1", "Opt2$$"]).</li>
<li><b>!! (disabled) :</b> Only applicable for selectbox, for option which wanted to be shown disabled. Written before closing the quotation mark (For ex: [o:"Opt1", "Opt2!!"]).</li>
<li><b>bb (block) :</b> Only applicable for button. Makes the button block-style.</li>
 
</ul>
<br>
<h5>Column Size</h5>
<p>Size of columns are based on Bootstrap 4 grid system. A row consists of 12 columns. A size of 1/1 (or 1) means the whole row, while 1/2 means the half of the row. When three items with 1/2, 1/4 and 1/4 sizes will consist one complete row.</p>
  
</br>

<h3 class="mt-4 mb-2 pb-2" style="border-bottom:1px #ccc solid;">Examples:</h3>
<p>You can find extra explanation and example tagline below.</p>
<br>

<h4>Title</h4>
<small><p class="border border-secondary bg-warning p-1">title <i>class</i> "title text" [attributes]</p></small>
<p><b>Classes:</b> <small>h1, h2 ... h6</small>
</br><b>Attributes:</b> <small>--: Border-bottom</p></small>
<small><p class="border border-secondary bg-white p-1">title h3 "Registration Form" --
</br>title h5 "Name of Company"
</p></small>
</br>

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

<h4>Textarea</h4>
<p>For <b>input</b> style of <i>textarea</i>:</p>
<small><p class="border border-secondary bg-warning p-1">select name [parameters] [attributes] <i>column-size</i></p></small>
<p><b>Parameters:</b> <small>p: placeholder, l: label, v: values, h: help-text</small>
</br><b>Attributes:</b> <small>**: required, ##: disabled</p></small>

<small><p class="border border-secondary bg-white p-1">textarea notes [l:Quick Notes] [p:Write your note here]
</p></small>
</br>

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
</div>