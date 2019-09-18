<!DOCTYPE html>
<html>
<head> 
      <!--// has nothing to do with html headings
      // this only contains metadata.
      // html metadata is data about the html document. is not displayed
      <title>Myfirst HTML and PHP file</title>--> 
      <meta charset="UTF-8">
      <!--//metadata typically defines document title, character set,
      // styles, links, scripts, and other meta information-->
  <style>
  body {background-color: powderblue;}
  h1 {
    color: blue;
    font-family: verdana;
    font-size:200%;
    }

  p {
    border: 2px solid powderblue;
    margin: 50px;
    color: red;
    font-family:courier;
    font-size: 150%;
    }
  #p01 {
    color: blue;
  }
  p.error {
    color: red;
  }

  </style>
  <!-- to use an external style sheet for HTML pages link to the style sheet from the header
  <link rel="stylesheet" href="styles.css">
  this link can be referenced with a full URL or a relative path from current page
  the link used above references a .css located within the same folder
  -->
</head>
<body>
<p id="p01">I am different</p> <!-- should be unique within a page--> 
<p class="error">uh oh spaghetti-o</p>

<?php
$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;
echo '<br>';
var_dump($x);
  $cars = array (' ','mani','hi');
  var_dump($cars);
  
  class car {
    	function car(){
          	$this->model = 'vw';
        }
  }
  $herbie = new car();
  echo '<br>';
  echo $herbie->model;
  echo '<br>';
  echo strlen($herbie->model);
  echo '<br>';
  echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
  // this string is case sensitve duh smh why was that even a thought
  echo '<br>';
  // define(name, value, case-insensitive)
  define('greeting', 'weols.com!');
  
  echo greeting;
  echo '<br>';
  function test(){
    echo greeting;
    echo $x;
  }
  test();
  /* $a === $b identical
     $a !=$b not equal
     $a <> $b not equal
     $a !== $b not identical
     < less than
     > greater than
     <= less than or equal to
     >= greater than or equal to
     <=> spaceship, returns int depending on the variables
     */
  echo '<br>';
  echo ($x <=> $y);
  // without $ a variable is treated like a constant
  echo ($x.$y);
  echo '<br>';
  $x.=$y;
  echo $x;
  // arithmetic and array operators are the same
  echo '<br>';
  // $x = expr1 ? expr2 : expr3; if expr1 is true $x = expr2 else expr3
  // $x = expr1 ?? expr2; $x = expr1 if expr1 exists and not NULL else = expr2
  // if else works the same, switch works the same
  // loops work the same
  // for each ($colors as $value){ iterates through the array
  // 	echo "$value <br>";
  // function calls work the same
  function blah($name){
    echo 'heyyyyy<br>';
    echo "$name <br>"; // variable doesnt need .  .
    // but a function like sum() does
  }
  
  bLaH('booty-Os'); // not case sensitive
  // declare(strict_types=1); must be on very first line of php
  // and data types wil cause fatal error on type mismatch
  echo '<br>';
  function height(int $minheight = 50){
    echo "height is $minheight <br>";
  }
  height(350); // uses passed value
  height(); // if none defaults to value in function
  
  // : type before curly brace declares/forces return type to be of that type else fatal error
  function sum(int $a, int $b): float {
    $c = $a + $b;
    return $c;
  }
  echo "hiya senior " . sum(6,2) . " mister";
  // arrays work the same
  // array length is count($array);
  
  //associative array
  $age = array("peter"=>"35", "ben"=>"37", "joe"=>"43");
  // or
  $age2['peter'] = '35';
  $age2['ben']='37';
  $age2['joe'] = '43';
  
  echo '<br>';
  echo $age['peter'];
  echo '<br>';
  echo $age2['joe'];
  echo '<br>';
  
  sort($age2); // sorts in ascending alphabetical order
  $age2length = count($age2);
  for($i = 0; $i < $age2length; $i++){
    // why does $age[$i]; not work here, technically should
    echo $age2[$i];
    echo '<br>';
  }
  // other sort array functions
  $f = 9;
  
  function shabuya(){
    $f = 8;
    echo $f;
  }
  shabuya();
  echo '<br>';
  echo $f;
  echo '<br>';
  // case sensitive
  $GLOBALS['q']=$GLOBALS['x']+$GLOBALS['y'];
  echo $q;
  echo '<br>';
  /* $_GET
  	 both get and post creaate an array ie( array (key=>value,...).
  	 this array holds key/value pairs, where keys are form names and values are input data.
     both get and post are treated as superglobals, always accessible
     $_GET is an array of variables passed to the current script via URL params
     $_POST is an array of variables passed to the current script via the HTTP POST method
     info from get method is VISIBLE TO EVERYONE, displayed in url and everything, limited to 2000 chars
     in URL so could be useful to bookmark certain pages
     use for non-sensitive data
     NOT PASSWORDS OR SENSITIVE DATA
 */
 /*	 $_POST
 	 INVISIBLE TO OTHERS
     no limits on info that can be sent
     not possible to bookmark page
     USEFUL FOR SENSITIVE DATA
*/
  /* <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  */
  echo $x;
  /* htmlspecialchars() is very useful for security, it makes anything an escape char essentially
  also useful are php trim() and php stripslashes() functions
  */
  
  $email = $password = "";
  if ($_SERVER["REQUEST METHOD"] == "POST"){
     if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
     if (empty($_POST["password"])) {
    $password = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  }
  
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
  <h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  E-mail: <input type="text" name="email">
  <br><br>
  Password: <input type ="text" name="password">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
  
<?php
echo "<h2>Your Input:</h2>";
Email: <input type="text" name = "email" value="<?php echo $email;?>">
$cars3 = array // 2d-array
  (
    array("volvo", 22, 18),
    array("bmw", 15,13),
    array("saab",5,2)
  );
echo $cars [0][0] . "blah" . $cars[0][1] . "hiya" $cars[2][1];
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

for($row=0;$row<4;$row++){
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>;"
}
echo date("d-m-Y") . "<br>";
/*include and require statements take all the text/code/markup in a file and
copies it into the file that uses the include statement;
useful for multiple pages of a website
*/
/*
  include 'filename'; will produce a fatal error and stop the script
  or
  require 'filename'; will produce a warning and the script will continue
*/
echo readfile();
$myfile = fopen() or die("unable to open file!");
echo fread ($myfile, filesize());
fclose($myfile);
/*fread() and fclose() explained: r read only, w for write only erases file contents - pointer starts at beginning of file,
  a for write only but esisting data is preserved starts at end of file, x create new file for write only else FALSE, 
  r+ open file for read/write pointer at beginning, w+ opens file for read/write - erase contents of file - pointer t beginning, 
  a+ opens file for read/write contents preserved - starts at end of file, x+ creates a new file for read/write else FALSE
*/

// feof($myfile) checks if eof is reached, is useful for looping through data of unknown length
// fgetc() used to read a single char from a file

//file upload: 
?>
<h1> welcome to our car rental home page!</h1>
<?php include 'footer.php';?>
<div class="menu">
<?php include 'menu.php';?>
</div>
<!--// when manipulating files BE CAREFUL
// common errors: editing the wrong file, filling a hd with garbage data, and deleting file contents by accidents


/*
*
*       HTML notes
*
*/

//lowercase tags and quotes around attributes are highly recommended
// both quote types are good, if one is used in an attribute value, use the other one-->
<h1></h1>
<b></b>
<a href="">this is a link</a>
<img src="img_girl.jpg" width="500" height="600" alt ="The girl with the jacket"> // the alt can be read by t2s
// alt is also useful if img does not appear it will still be displayed
<p style="color:red"> i am a paragraph</p> // inline css styling on that element
<h2 title="I'm a header"> this is the title as a header</h2>
<p title="I'm a tooltip">
this is a paragraph. as a tooltip. <!--// idk what that is though-->
</p>
<hr> <!--//adds a horizontal rule
// id specifies a unique id for an element
// browsers automatically add white space before and after a paragraph
// browsers dont care for white space inside one paragraph tag, extra space gets removed
// dropping end tag can cause random errors-->
<br><!-- // is a line break-->
<pre>
  My bonnie lies over the ocean
  My bonnie lies over the sea
</pre> // defines preformatted text
<tagname style="property:value;"> // property and value are both CSS
<body style="background-color:black;"> // defines background color
<h1> heading</h1>
</body>
<!--// style="color:;"
// style="font-family:;">
// style="font-size:;">
// style text alignment same format as others-->
<b> bold text </b> // bold 
<strong>strong text </strong> // important
<i>italic text </i> // italic 
// em (important), mark(highlighted), small, del(strikethrough text), ins(insert), sub(subscript), 
// sup(superscript) all share the same tag styles
<p>this is a paragrpah with a quote. < q ><q> is used for short quotations</q><p/>
// browsers usually insert quotes around these
<blockquote> defines a section that is quoted from another source, browsers usually indent these.</blockquote>
<p> the <abbr title="world health org">WHO</abbr> was founded in 1948.</p>
<!-- this is a comment-->
<h1 style="background-color:Tomato;">Hello World</h1>
<h1 style="border:2px solid DodgerBlue;">bobby blue</h1>
<h1 style="color:violet;">Hello World</h1>
<!-- colors can also be specified using RGB values, HEX values, HSL values, RGBA values, and HSLA values
    CSS stands for cascading style sheets
    used to describe how hTML elements are displayed.
    inline - by using the style attribute in HTML elements
    internal - by using <style> in <head> section
    external (MOST COMMON) - by using an external CSS file

    inline is used to uniquely style a single HTML element
    internal is used to define a style for a single HTML page, example is done in head
    external is used in the header and has a link to the external css page
        the external page must not contain any HTML and must be saved as .css
-->
<a href="https://www.w3schools.com/html/" target="_blank">visit our page, click here!</a>
<!-- make sure to add the slash at the end or else too many requests may be sent
     target defines where to open link
     _blank - new tab
     _self - same tab
     _parent - parent frame
     _top - full body of wind
-->
<a href="default.asp">
  <img src="smiley.gif" alt=:HTML tutorial" style="width:42px;height:42px;border:0;">
</a> <!-- this uses an image as a hyperlink, wild stuff now lol--> 
<!-- title specifies extra info about an element as a tooltop, while hovering over the item--> 
<!-- use id in comboination with hyperlink in order to make bookmarks on the same page
      if different pages then have the hyperlink be similar to <a href="html_demo.html#C4">jum to blah</a>
-->
<!-- for images it is recommended to use style for width and height instead of just using width and height
      if image is on a different server then just link the entire url, if on same server give path
      gifs are allowed in HTML
-->
<img src="workplace.jpg" alt="Workspace" usemap="#workmap">
<map name="workmap">
  <area shape="rect" coords="34, 44, 270, 350" href="computer.htm" alt="Computer">
  <!-- and so on and so forth--> 
</map> <!-- this allows for images to be clickable and the coordinates is for what part of the image-->

<picture>
  <source media="(min-width: 650px)" srcset="img_pink_flowers.jpg">
  <source media="(min width: 465px)" srcset="img_white_flower.jpg">
  <img src="img_orange_flowers.jpg" alt="flowers" style="width=auto;">
</picture><!-- this tag will choose which photo to display based on browser size
  always s[ecify the img last incase browser does not support picutre or source goes unfound / tags dont match-->

<table style="width:100%;"> <!-- defines a table--> 
  <tr> <!-- defines a table row-->
    <th>firstname</th> <!-- defines a table header-->
    <th>Lastname</th>
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td> <!-- defines a table data cell, these can contain a variety of elements-->
    <td>Smith</td>
    <td>50</td>
  </tr>
</table>
<!-- if adding borders remember to add to both table andtable cells ie headers and rows and actual cells--> 
<ul style="list-style-type: square;">
  <li>coffee</li>
  <li>tea</li>
    <ul>
      <li>Black tea</li><!-- nested lists-->
      <li>Green tea</li>
    </ul>
  <li>mlik</li>
</ul> <!-- unordered list--> 
<ol type="I" start="50"><!-- type here defines what to number the list with, start determines what number to start ar-->
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol> 
<dl> <!-- list with a description to each item-->
  <dt>Coffee</dt>
  <dd>- black hot drink</dd>
  <dt>Milk</dt>
  <dd>- white cold drink</dd>
</dl> 
<!-- float: left; inside a list parameter makes the list sideways--> 

</body>
</html>
