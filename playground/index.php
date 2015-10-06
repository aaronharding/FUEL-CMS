<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<HTML>
<HEAD>
        <TITLE>www.s1021990-44190.mijnreus.nl</TITLE>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-cache">
</HEAD>

<BODY bgcolor=white>
<div align="center">
<font face="Arial, Helvetica">
<a href="http://www.webreus.nl">
<img src="http://www.webreus.nl/webreuslogo.jpg" alt="WebReus" border="0"/></a>
<br><br>
<b>De hosting omgeving voor www.s1021990-44190.mijnreus.nl is actief voor een klant van WebReus. </b>
<BR><BR>
U kunt een voorbeeld bekijken van de mappen op de website via deze link(s):<BR><BR>
<? 
function toon_mappen()
{
$directory = "";
 
//get all files in specified directory
$files = glob($directory . "*");
 
//print each file name
foreach($files as $file)
{
 //check to see if the file is a folder/directory
 if(is_dir($file))
 {
  
  echo "<a href='http://".$_SERVER['HTTP_HOST']."/"."$file'>$file</a><BR>";
 }
}

}

toon_mappen();

?>


</font>
</div>
</BODY>
</HTML>
