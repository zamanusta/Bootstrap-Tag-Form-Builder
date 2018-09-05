# Bootstrap-Tag-Form-Builder
Bootstrap 4 - Form Builder with Tags

## Introduction
Bootstrap 4 Form Builder script is a tool for creating Bootstrap 4 forms by using simple tag system. The purpose of the script is making the form-building process easier by modifying tags rather than the code. Complex forms can be build in minutes by using this script.

## Format
The general format of the taglines are as below:

>type name [parameters} [attributes] column-size

First element has to be the type of the item. Name element is not mandatory. When it is not defined, a name is assigned automatically. The order of parameters and attributes are not important. However column-size has to be in the end.

## Parameters
Parameters are given with a format like [p:...]. For single element parameters, there is no need for quotation marks (For ex: Label). However, multiple element parameters (such as the options of a selectbox) must be in double quotation marks. For example, the text of options of a select box is given like [o:"A", "B", "C"]. The values of these options can be given manually (like [v:"1", "2", "3"]). When value parameter is missing, values are created from the text values of options automatically.

Common Parameters are:

>l: label - Label of an input element.
>p: placeholder - Placeholder of an input element -help text inside-
>v: value - Value of input element, used when an input is wanted to have a ready value when the form loaded first. It is also used for determining the post values of options.
>h: helptext - Small text appears under the input, when an additional explanation is required.
>o: options - Text of options (used for selectbox, checkbox and radio options.
>font size - Only applicable for title, written directly as h1 ... h6.
>bootstrap color - Only applicable for button, written between brackets (Ex: [success]).

## Attributes
Attributes are written directly to the line or inside the option text (before closing double quotation) and consists of two characters.

Common attributes are:

>** (required) : Make the field required for validation.
>## (disabled) : Make the field disabled.
>@@ (inline) : Makes multiple checkboxes and radio options inline when used.
>$$ (selected) : Only applicable for selectbox, for option which wanted to be shown selected on load. Written before closing the quotation mark (For ex: [o:"Opt1", "Opt2$$"]).
>!! (disabled) : Only applicable for selectbox, for option which wanted to be shown disabled. Written before closing the quotation mark (For ex: [o:"Opt1", "Opt2!!"]).
>bb (block) : Only applicable for button. Makes the button block-style.

Column Size
Size of columns are based on Bootstrap 4 grid system. A row consists of 12 columns. A size of 1/1 (or 1) means the whole row, while 1/2 means the half of the row. When three items with 1/2, 1/4 and 1/4 sizes will consist one complete row.


Examples:
You can find extra explanation and example tagline below.


Title
title class "title text" [attributes]

Classes: h1, h2 ... h6 
Attributes: --: Border-bottom

title h3 "Registration Form" -- 
title h5 "Name of Company"


Text Inputs
For input style of text, date, number, password:

type name [parameters] [attributes] column-size

Types: text, date, time, number, password 
Parameters: p: placeholder, l: label, v: value, h: help-text, min: minimum (for date, time, number), max: (for date, time, number) 
Attributes: **: required, ##: disabled

text customername [l:Name of Customer] [p:Name - Surname] ** 1/2 
date regdate [l:Date of Registration] ** 1/2 
number customerage [l:Age of Customer] [v:30] [min:18] ## 1/3 
time time-entrance [l:Time of Entrance] [min:09:00] [max:23:00] ## 1/3


Radios and Checks
For input style of checkbox, radio:

type name [parameters] [attributes] column-size

Types: checkbox, radio 
Parameters: l: label, o: options, v: values, h: help-text 
Attributes: **: required, ##: disabled, @@: inline,

radio country [l:Country of Birth] [o:"UK" "USA"] ** 
radio city [l:Destination] [o:"Ankara" "Sofia"] [v:"1" "2"] [h:Please Select Destination] @@ 1/2 
checkbox customerage [l:Age of Customer] [o:18+] [v:1] [h:Currently not open for people older than 18] ## 1/3


Select Box (Dropdown)
For input style of selectbox:

select name [parameters] [attributes] column-size

Parameters: l: label, o: options, v: values, h: help-text 
Attributes: **: required, ##: disabled, $$:selected (in option quotation marks), !!:disabled (in option quotation marks)

select country [l:Country of Birth] [o:"UK!!" "USA"] ** 
select [l:Destination] [o:"Ankara$$" "Berlin" "Paris" "Rome!!" "Sofia!!"] [v:"1" "2" "3" "4" "5"] [h:Please Select Destination] ** 1/2 
checkbox customerage [l:Age of Customer] [o:18+] [v:1] [h:Currently not open for people older than 18] ## 1/3


Textarea
For input style of textarea:

select name [parameters] [attributes] column-size

Parameters: p: placeholder, l: label, v: values, h: help-text 
Attributes: **: required, ##: disabled

textarea notes [l:Quick Notes] [p:Write your note here]


Button
button name "button text" [bootstrap-class] [attributes] column-size

Bootstrap Class: primary, secondary, success, info, dark, light, warning, danger... Get more info about Bootstrap Colors. 
Attributes: bb: block-size button

button submit "Send" [primary] bb 
button reset "Reset" [secondary] 1/3

