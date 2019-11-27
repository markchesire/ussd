<?php 
//for africastalking  
$phonenumber = $_REQUEST['MSISDN'];  
$sessionID = $_REQUEST['sessionId'];  
$servicecode = $_REQUEST['serviceCode'];  
$ussdString = $_REQUEST['text']; 
//login credentials to the gateway
require_once('AfricasTalkingGateway.php');
$username   = "arapkimoi";
$apikey     = "bb3b747e6abf30440d154e58ba0c104591844bce67b01db9e791334e66212c3a";   
//set default level to zero
$level =0;  
if($ussdString != "")
	{  
		$ussdString=  str_replace("#", "*", $ussdString);  
		$ussdString_explode = explode("*", $ussdString);  
		$level = count($ussdString_explode);  
	}  
//main menu 

if ($level==0)
	{  
		displaymenu();  
	} 

function displaymenu()
	{  
		$ussd_text="CON Welcome to Kituro DRF.Reply with;<br/> 
		<br/>1. Student Performance
		<br/>2. School Updates
		<br/>3. Fee Structure
		<br/>4. Pay Fee
		<br/>5. Fee Balance
		<br/>6. Admissions
		<br/>7. Contact<br/>";  
	    ussd_proceed($ussd_text);   
	} 
	 
function ussd_proceed ($ussd_text)
	{  
		echo $ussd_text;   
	}  
if ($level>0)
	{  
		switch ($ussdString_explode[0])  
		{  
case 1:  
		Studentperformance($ussdString_explode,$phonenumber );  
		break;  

case 2:  
		Schoolupdates($ussdString_explode,$phonenumber);  
		break;  

case 3:  
		Feestructure($ussdString_explode,$phonenumber);  
		break;

case 4:  
		Payfee($ussdString_explode,$phonenumber);  
		break;

case 5:  
		Feebalance($ussdString_explode,$phonenumber);  
		break;

case 6:  
		Admissions($ussdString_explode,$phonenumber);  
		break;

case 7:  
		Contact($ussdString_explode,$phonenumber);  
		break;
		}  
	}
function Studentperformance($details,$admno)
	{  
        // First level response 
		if (count($details)==1)
			{  
				$ussd_text="CON Please select Form; 
				<br/>1. Form One
				<br/>2. Form Two
				<br/>3. Form Three
				<br/>4. Form Four";
				ussd_proceed($ussd_text);  
			}  
		// This is a first level response where the user selected 1 in the first instance
		else if (count($details)== 2)
			{  
				$ussd_text="CON Reply with; 
				<br/>1. Mini Drf
				<br/>2. Full Drf"; 
				ussd_proceed($ussd_text);  
			}  
	    // This is a third level response where the user selected 1 in the first instance
	    else if (count($details)== 3)
			{  
				$ussd_text="CON Enter student Admno";
		        ussd_proceed($ussd_text);  
	        }
		// This is a fourth level response where the user selected 1 in the first instance
		else if (count($details)== 4)
			{  
				$ussd_text="CON here is mini report:<br/>";
                ussd_proceed($ussd_text);
		        
			    if(isset($_POST['admno']))
			    		{
							$admno = mysql_real_escape_string ($_POST['admno']);
						}	
			    $dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT firstname, surname, marks, grade, position FROM performance WHERE admno ='100'";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    
								Firstname:$row[0]<br/>
								Surname:$row[1]<br/>
								Marks:$row[2]<br/>
								Grade:$row[3]<br/>
								Position:$row[4]<br/><br/>
							";  
						
			}
		else
			{//Choice is cancel  
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			}  
	}   
// Second level menu
function Schoolupdates($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text="CON Reply with;  
				<br/>1. Term Opening Date
				<br/>2. Term Closing Date
				<br/>3. AGM Meeting
				<br/>4. Parents Meetings
				<br/>5. A.O.B";
				ussd_proceed($ussd_text);  
			} 
		// Second level response where user selected 1 in the second level menu 
		else if (count($details)==2)
			{  

				$ussd_text="CON Term Opening date is:<br/>"; 
				ussd_proceed($ussd_text); 
                
				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT openingdate FROM dates";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    Opening date:$row[0]<br/>
							";  
				 
			}  
		// third level response where user selected 2 in the second level menu
		else if (count($details)==3)
			{  
				$ussd_text="CON Term Closing  Date is:<br/>";  
				ussd_proceed($ussd_text);  

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT closingdate FROM dates";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    Closing date:$row[0]<br/>
							";  
			}
		//// Fourth level response where user selected 3 in the second level menu
		else if (count($details)==4)
			{  
				$ussd_text="CON AGM Meeting Date is:<br/>";  
				ussd_proceed($ussd_text);  

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT agmdate FROM dates";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    AGM date:$row[0]<br/>
							";  
			}
		// Fifth level response where user selected 4 in the second level menu
		else if (count($details)==5)
			{  
				$ussd_text="CON Parents Meeting date:<br/>";  
				ussd_proceed($ussd_text);  

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT parentsdate FROM dates";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    Form 1 parents date:$row[0]
							";   
			}
		// Sixth level response where user selected 5 in the second level menu
		else if (count($details)==6)
			{  
				$ussd_text="CON A.O.B:<br/>";  
				ussd_proceed($ussd_text); 

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT aob FROM dates";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    $row[0]
							";    
			}
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}
// Third level menu
function Feestructure($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text="CON Here is Fee Structure<br/>NB GOK Subsidy excluded<br/>";
				ussd_proceed($ussd_text);  
                
				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT boarding_equipment,repairs,travel_transport,admin_costs,electricity_water,activity,pe,total_fee FROM fee_structure";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							  Boarding Equipment and Stores(Ksh):$row[0]<br/>
							  Repairs, maintenance and improvement(Ksh):$row[1]<br/>
							  Local travel and transport(Ksh):$row[2]<br/>
							  Administration costs(Ksh):$row[3]<br/>
							  Electricity, Water and conservancy(Ksh) (EWC):$row[4]<br/>
							  Activity fees(Ksh):$row[5]<br/>
							  Personnel emolument (PE)(Ksh):$row[6]<br/>
							  Total school fees(Ksh):$row[7]
							";    
			}

			//} 
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}
// Fourth level menu
function Payfee($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text = "CON Use Mpesa:<br/>"; 
				ussd_proceed($ussd_text);

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT paybill_number,account_number FROM bank_details";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							  Paybill Number:$row[0]<br/>
							  Account Number:$row[1]
							";    
			} 
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}

// Fifth level menu
function Feebalance($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text = "CON Your Fee balance is:"; 
				ussd_proceed($ussd_text);
			} 
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}

// Sixth level menu
function Admissions($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text = "CON Enter student ADMNO:<br"; 
				ussd_proceed($ussd_text);
				$admno = "";
			    	if(!empty($_POST['admno']))
			    		{
							$admno = $_POST['admno'];
						}
			    $dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT firstname, surname, marks, grade, position FROM performance WHERE admno =trim('$admno')";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    Admno:$row[0]<br/>
								Firstname:$row[1]<br/>
								Surname:$row[2]<br/>
								Marks:$row[3]<br/>
								Grade:$row[4]<br/>
								Position:$row[5]<br/><br/>
							";  
			} 
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}

// Seventh level menu
function Contact($details)
	{  
		if (count($details)==1)
			{  
				$ussd_text = "CON Contact us On:<br"; 
				ussd_proceed($ussd_text);

				$dblink = mysqli_connect("localhost", "root", "", "kth_ussd");
				$sqlquery = "SELECT * FROM contact";
				$result = mysqli_query($dblink,$sqlquery) or die("Error:".mysqli_error($dblink));
				while($row = mysqli_fetch_array($result))
					echo "
							    $row[0]<br/>
							    Hotline1:$row[1]<br/>
							    Hotline2:$row[2]
							";  
			} 
		//Choice is cancel menu ends
		else
			{ 
				$ussd_text = "END Your session is over";  
				ussd_proceed($ussd_text);  
			} 
	}


 
   
?>
