<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inventory</title>

    <?php include 'header-acp.php';
    if($_SESSION['grade'] != "BAN") {
        header("Location: http://$_SERVER[SERVER_NAME]/ACP/"); }
    ?>
    <div class="container-fluid">

        <div class="row-fluid ">
            <div class="span12"><!-- Main -->
                <div class="page-header" style="margin-top:0;">
                    <h1>Inventory
                    </h1></div>
                <div class="well" >
                    <center>
                        <form action='' method='POST'>
                            <div class="input-append">
                                <input type="text"  name="term"  class="span9" placeholder="Enter Character Name" autocomplete='off' data-provide="typeahead" data-items="10" data-source='[""<?php $sqlstring1="select * from charac0 ";
                                $r1= odbc_exec($con,$sqlstring1);
                                while($dd = odbc_fetch_array($r1)) {
                                    echo ",\"".trim($dd['c_id'])."\"";
                                } ?>]'>
                                <input type="submit" name="S1" value="Search" class="btn"  >
                            </div>
                        </form>
                        <table cellpadding="3" cellspacing='3' >


                            <tbody>
                            <tr>
                                <?php
                                if($_POST['S1'] == 'Search')
                                {
                                    foreach($_POST as $key => $value) {
                                        $data[$key] = antisql($value); }

                                    $char=$data['term'];
                                    echo $char." Wearing :";
                                    include 'Stats/wear.php';
                                    if($pic['Necklace']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Necklace]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Necklace]\" data-original-title=\"<b>$names[Necklace]</b>\" ></td>";
                                        //echo "<br>Slot 1:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Helmet']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Helmet]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Helmet]\" data-original-title=\"<b>$names[Helmet]</b>\" ></td>";
                                        //echo "<br>Slot 2:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Ring']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Ring]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Ring]\" data-original-title=\"<b>$names[Ring]</b>\" > </td></tr><tr>";
                                        //echo "<br>Slot 3:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td></tr><tr>";}
                                    if($pic['Weapon']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Weapon]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Weapon]\" data-original-title=\"<b>$names[Weapon]</b>\" ></td>";
                                        //echo "<br>Slot 4:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Armor']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Armor]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Armor]\" data-original-title=\"<b>$names[Armor]</b>\" > </td>";
                                        //echo "<br>Slot 5:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Shield']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Shield]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Shield]\" data-original-title=\"<b>$names[Shield]</b>\" ></td></tr><tr>";
                                        //echo "<br>Slot 6:".$wear['Name'];
                                    }
                                    else {
                                        if($pic['Weapon']!=''&& $$pic['Shield']==''){
                                            print "<td style='cursor:pointer'><img src='$pic[Weapon]' class='thumbnail' dissabled ></td></tr><tr>";
                                        }
                                        else{
                                            print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td></tr><tr>";}}
                                    if($pic['Gloves']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Gloves]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Gloves]\" data-original-title=\"<b>$names[Gloves]</b>\" ></td>";
                                        //echo "<br>Slot 7:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Pant']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Pant]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Pant]\" data-original-title=\"<b>$names[Pant]</b>\" ></td>";
                                        //echo "<br>Slot 8:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                    if($pic['Boots']!=''){
                                        print "<td style='cursor:pointer'><img src='$pic[Boots]' class='thumbnail' rel='drevil'  data-trigger='hover' data-content=\"$stat[Boots]\" data-original-title=\"<b>$names[Boots]</b>\" ></td>";
                                        //echo "<br>Slot 9:".$wear['Name'];
                                    }
                                    else { print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil' class='thumbnail'  data-trigger='hover' data-content='' data-original-title='<b>Empty Inventory</b>' > </td>";}
                                }
                                echo "</tr>
  </tbody>
</table>
<table>
<tbody>
<tr>";
                                echo $char."'s Inventory :";
                                $query1 = odbc_exec($con,"SELECT * FROM charac0 WHERE c_id='$char' ");
                                while ($sup = odbc_fetch_array($query1))
                                {
                                    include('inc/m_body_char.php');
                                    $sr = explode(";",$INVEN[1]);
                                    $result = array();
                                    $source = array_values($sr);
                                    $count = count($source);
                                    for($i = 3; $i < $count; $i +=4) {
                                        $result[] = $source[$i]+1;
                                    }
                                    $array2 = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29" ,"30");
                                    $result1 = array_diff($array2,$result);
                                    sort($result);
                                    $j=0;
                                    $new1=1;

                                    $pdo=new PDOExamples();
                                    $resultnew = $result + $result1;
                                    foreach($array2 as $value1) {
                                        if (in_array($value1, $result)) {
                                            $slot=$new1;
                                            $new=$value1;
                                            include 'Stats/opt.php'  ;
                                            print "<td style='cursor:pointer'><img src='$img' rel='drevil'  data-trigger='hover' data-content=\"$message<b>Slot:</b> $value1\" data-original-title=\"<b>$name</b>\" > </td>";
                                            $new1++;
                                        }
                                        if (in_array($value1, $result1)) {
                                            print "<td style='cursor:pointer'><img src='http://www.a3ultimate.com/allitems/Blank.jpg' rel='drevil'  data-trigger='hover' data-content='<b>Slot:</b> $value1' data-original-title='<b>Empty Inventory</b>' > </td>";
                                        }
                                        if(($j+1)%6==0){echo "</tr><tr>";}
                                        $j++;

                                    }
                                }
                                ?>
                            </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div><!-- Main -->
        </div><!-- Cointainer -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://www.a3ultimate.com/js/bootstrap-tooltip.js"></script>
        <script src="http://www.a3ultimate.com/js/bootstrap-popover.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("[rel=drevil]").popover({
                    placement : 'bottom',
                    html: 'true',
                    trigger: "hover",

                    animation: 'true'
                });
            });
        </script>
        <hr>
        <?php include('browser.php');
        $ua=getBrowser();
        $ip=$_SERVER['REMOTE_ADDR'];
        ?>
        <div class="row-fluid" align="center" class="form-inline">
            <div class="span4" style="border-right:1px solid #d9d9d9"><p style="margin:0; padding:0; text-align:center">Your IP:&nbsp;&nbsp;  <i>  <?php echo getRealIpAddr();?> </i></p></div>
            <div class="span4" style="border-right:1px solid #d9d9d9"><p style="margin:0; padding:0; text-align:center">Your Browser:<i>&nbsp;&nbsp;<?php echo $ua['name'] . " " . $ua['version'] ;?></i></p></div>
            <div class="span4"><p style="margin:0; padding:0 ;text-align:center">Visitor Counter : <i>&nbsp;&nbsp;<?php echo $_country; ?></i></p></div>

        </div><!-- details -->
    </div> <!-- /container fluid-->
    <?php include 'footer.php';?>
