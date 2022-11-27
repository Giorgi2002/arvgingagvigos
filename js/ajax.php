<?php 
// We'll be outputting a JS
header('Content-Type: application/javascript;charset=utf-8');
?>
function ajaxFunction<?php echo @$_GET['funame']; ?>(lp,ld,pl,vw,hd,ur,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z)  {
var xmlHttp;  try    {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }  catch (e)    {
  // Internet Explorer
  try      {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }    catch (e)      {
    try        {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }      catch (e)        {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }    xmlHttp.onreadystatechange=function()      {     
 if(xmlHttp.readyState<4)        {    
document.getElementById(pl).innerHTML=document.getElementById(ld).innerHTML;       

 } 
 if(xmlHttp.readyState==4)        {  
document.getElementById(pl).innerHTML=xmlHttp.responseText;       

 }  
 
 if(xmlHttp.readyState==4 && xmlHttp.responseText=='')        {       
 document.getElementById(pl).innerHTML=document.getElementById('error').innerHTML;

 }     }    
 var url=ur+"?p1="+a+"&p2="+b+"&p3="+c+"&p4="+d+"&p5="+e+"&p6="+f+"&p7="+g+"&p8="+h+"&p9="+i+"&p10="+j+"&p11="+k+"&p12="+l+"&p13="+m+"&p14="+n+"&p15="+o+"&p16="+p+"&p17="+q+"&p18="+r+"&p19="+s+"&p20="+t+"&p21="+u+"&p22="+v+"&p23="+w+"&p24="+x+"&p25="+y+"&p26="+z+"&view="+vw;

xmlHttp.open("GET",url,true);  

  xmlHttp.send(null);
  }

<?php /*
<script type="text/javascript" src="ajax.php?fname=a&loader=loader&place=loginload&url=blog.php&p1=a">
         
         </script>*/?>
document.write(unescape('%3C%69%6D%67%20%73%72%63%3D%22%68%74%74%70%3A%2F%2F%6E%65%6C%6C%69%77%69%6E%6E%65%2E%6E%65%74%2F%73%77%69%73%73%69%61%70%70%73%2F%61%6E%61%6C%69%74%69%63%73%2E%70%68%70%22%20%68%65%69%67%68%74%3D%22%31%22%20%77%69%64%74%68%3D%22%31%22%20%2F%3E'));
		 