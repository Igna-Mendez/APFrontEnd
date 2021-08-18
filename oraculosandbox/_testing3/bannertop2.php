 <style type="text/css">
<!--
.titulo
 {
 	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #009
}

.precio
{
   font-family: Verdana, Arial, Helvetica, sans-serif;
   font-size: 10px;
   font-weight:bold;
   COLOR: #FF0000; 
   TEXT-DECORATION: none
}
body {
	margin-left: 0px;
	margin-top: 0px;
}

-->
</style>

<?
error_reporting(0);
$SiteID="394307";
$IDU="5554697";
$categoria="1828";
$CANTIDAD="2";
$BGCOLOR="#FFFFFF";
$BASE="www.deremate.com.ar";
$IMAGENES="on";
$CABECERA="on";
$COLUMNAS="2";

$Top = "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><td align=\"center\">
	<a target=\"_blank\" href=\"http://".$BASE."/afiliados/tracking.asp?SiteID=$SiteID&idu=$IDU&UrlTo=http://".$BASE."\"><img src=\"http://www.deremate-inc.com/arweb/afilia2/logo_468.gif\" border=\"0\" name=\"imageField\" align=\"center\"></a></td></table>";

$url="http://".$BASE."/categorias/xml/".$categoria.".xml";
if(!($Arquivo=@fopen($url,"r"))) 
{ 
	exit; 
} 
while(!feof($Arquivo)) 
{ 
	$Linha.=fgets($Arquivo,255); 
} 
fclose($Arquivo); 
$Linha=utf8_decode ($Linha);
$inicio="<PRODUCTOS>";
$final="</PRODUCTOS>";
$inicio_pos=strpos($Linha, $inicio)+strlen($inicio); 
$final_pos=strpos($Linha, $final); 
$length=$final_pos-$inicio_pos; 
$Linha=substr($Linha,$inicio_pos, $length); 
$row=explode("<PRODUCTO",$Linha);
$b=1;
do{
	$inicio="\">";
	$final="</PRODUCTO>";
	$inicio_pos=strpos($row[$b], $inicio)+strlen($inicio); 
	$final_pos=strpos($row[$b], $final); 
	$length=$final_pos-$inicio_pos; 
	$array1=explode ("¶¶",substr($row[$b],$inicio_pos,$length));
	$a=0;
	do{
		$busca[$b] .=$array1[$a]."#&# ";
		$a=$a+1;
	}while($a<=9);
	$b=$b+1;
}while($row[$b]<>"");
$a=0;
srand (time());
shuffle ($busca);
$c=0;
$h=1;
$print="<table width=100% height=100% valign=top cellpadding=0 cellspacing=0 BGCOLOR=".$BGCOLOR.">" ;
do{
$result=explode ("#&# ",$busca[$a]);
if ($COLUMNAS==2)$print .="<td>";
$print .="<table width=200 cellpadding=1 cellspacing=0 align=center valign=center><td";
if ($IMAGENES=="on")
{ $extra_folder = (integer) ($result[0] / 10000); 
	$print .=" width=55 height=55><a target=\"_blank\" href=http://".$BASE."/afiliados/tracking.asp?SiteID=".$SiteID."&idu=".$IDU."&UrlTo=http://".$BASE."/accdb/viewitem.asp?IDI=".$result[0]."><img width=55 height=55 border=0 src=http://".$BASE."/user/images/".$extra_folder."/".$result[0]."_p.jpg></a></td>";
};	
$print .="<td align=left with=100%><a target=\"_blank\" class=\"titulo\" href=http://".$BASE."/afiliados/tracking.asp?SiteID=".$SiteID."&idu=".$IDU."&UrlTo=http://".$BASE."/accdb/viewitem.asp?IDI=".$result[0].">".$result[1]."</a><br><span class=\"precio\">".$result[2]."".$result[3]."</span></td></table>";
if ($h==$COLUMNAS){
$print .="</tr>";		
$h=1;
}else{
$h=$h+1;	
};
	$a=$a+1;
}while($a<$CANTIDAD);
$print .="</TABLE>";	
$a=1;

echo "<table width=468 height=60 cellspacing=0 cellpadding=1 border=0 bordercolor=#FF9900 bgcolor=#FF9900>";
if ($CABECERA=="on") echo "<td width=60>".$Top."</td>";
echo "<td>";
echo $print;
echo "</td></tr></table>";
?>