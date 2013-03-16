<style type="text/css">
#form ul{
	margin:10px 0px 0px 0px;
	padding:0px;
	border:0px solid blue;
	list-style-type :none;
}
#form ul > li {
	margin:0;
	padding:3px;
	border:0px solid gray;
	font-size:15px;
}
#form label{
	border:0px solid gray;
	width:128px;
	height:15px;
	margin-top:8px;
	display:inline-block;
	float:left;
}
#form input{
	height:30px; 
	width:200px;
	font-size:14px;
	padding:1px 25px 2px 4px;
	border:1px solid gray;
	box-shadow:none;
}
#form textarea{ box-shadow:none;width:203px;height:100px; min-height:100px; min-width:203px; max-width:203px; max-height:100px;padding:4px 22px 4px 4px; border:1px solid gray}
#form input:required, #form textarea:required {
	background:#F8F8F8 url(style/images/images.png) -236px -212px ;
}
#form input:required:valid, #form textarea:required:valid {
	background:#F8F8F8 url(style/images/images.png) -236px -320px;
	box-shadow: 0 0 2px #2291FF;
	border-color: #2291FF;
}
#form input:focus:invalid, #form textarea:focus:invalid {
	background:#F8F8F8 url(style/images/images.png) -236px -102px;
	box-shadow: 0 0 2px #FE9F12;
	border-color: #FE9F12;
}
.submit{
	border:1px solid gray;
	cursor:pointer;
	padding:7px;
	color:#FFFFFF;
	margin-top:15px;
	font-weight:bold;
	background:#00A5F4;
}
.submit:hover{
	background:#51C7FF;
}
.notification {
	background:#FF8000;
	border-radius:1px;
	color:#FFF;
	font-size:13px;
	margin-left:10px;
	margin-top:4px;
	position: absolute; 
	display: none;
	padding:5px;
}
.notification:before {
	content: "\25C0";
	color:#FF8000;
	position: absolute;
	top:4px;
	left:-9px;
}
#form input:focus + .notification,#form textarea:focus + .notification  {
	display: inline;
}
#form input:required:valid + .notification, #form textarea:required:valid + .notification {
	background:#2291FF;
}
#form input:required:valid + .notification::before, #form textarea:required:valid + .notification::before {
	color:#2291FF;
}
#notification_success{ margin-bottom:25px;background:#E0E0E0; margin-top:15px; width:340px; padding:10px; font-weight:bold;  color:#007FFF; font-weight:bold; text-align:center;}
#notification_error{ margin-bottom:25px;background:#E0E0E0;margin-top:15px; width:340px; padding:10px; font-weight:bold; color:#FF6600; font-weight:bold; text-align:center}


#content{ min-height:485px; border:1px solid #999; margin-bottom:5px; border-radius:10px; font-size:14px; box-shadow:0px 0px 5px #666666}
#title{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1; margin-bottom:30px; }
</style>
<div id="content">
<p id="title">CONTACT US</p>

<div id="form">
<form method="post">
<ul>
	<li style="margin-left:300px">
	<label>Name</label>
    <input name="name" type="text"  maxlength="50" required/>
    <span class="notification">Enter Your Name</span>
    </li>
	<li style="margin-left:300px">
	<label>Email</label>
    <input name="email" type="email"  maxlength="50" required/>
    <span class="notification">Enter Your Email</span>
    </li>
	<li style="margin-left:300px">
	<label>Telephone</label>
    <input name="telephone" type="text" maxlength="13" required pattern="\-?\d+(\.\d{0,})?"/>
    <span class="notification">Enter Your Number Telephone</span>
    </li>
	<li style="margin-left:300px">
	<label>Topic</label>
    <input name="topic" type="text"  maxlength="60" required/>
    <span class="notification">Enter Your Topic</span>
    </li>
	<li style="margin-left:300px">
	<label>Message</label>
    <textarea name="message"  required></textarea>
    <span class="notification">Enter Your Message</span>
    </li>
    <li style="margin-left:300px">
            <label>
            <?php
			$a = rand(0,9);
			$b = rand(0,9);
			$c = $a + $b;
			echo $a." + ".$b." = ";
			?>
			<input type="hidden" name="ver1" value="<?php echo $c; ?>" />
            </label>
            <input type="text" name="ver2"   required pattern="\-?\d+(\.\d{0,})?" />
            <span class="notification">Enter Verification</span>
    </li>
    <li style="margin-left:300px">
	<button type="submit" class="submit">Send</button>
    </li>
    
<?php
if(isset($_POST["name"]))
{	
	if($_POST["ver1"]==$_POST["ver2"])
	{
		require_once "js/function-date.php"; 
		$name=ucwords($_POST["name"]);
		$email=$_POST["email"];
		$telephone=$_POST["telephone"];
		$topic=ucfirst($_POST["topic"]);
		$message=ucfirst($_POST["message"]);
		$date=tanggal(date("Y/m/d"));
		$date1=hari(date("Y/m/d"));					
		$query = "insert into tb_tamu values (NULL, '$name', '$email','$telephone','$topic', '$message','$date1, $date','0')";	
		$add   	= mysql_query($query);
		if($add)
		{
		echo "
		<li style='min-height:55px;  margin-left:300px;'>
		<div id='notification_success'>Your message has send!</div>
		</li>";
		}
		else
		{
		echo "
		<li style='min-height:55px;  margin-left:300px;'>
		<div id='notification_error' class='error'>Your message failed to send,<br> Please try again!</div>
		</li>";
		}
	}
	else
	{
		echo "
		<li style='min-height:55px;  margin-left:300px;'>
		<div id='notification_error'>Your verification uncorrect!</div>
		</li>";
	}
}
?>
</ul>
</form>
</div>
</div>

