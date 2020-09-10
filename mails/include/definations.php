<?php

	/*

	 * @author     Abhishek <abhishek@abhianni.com>

	 * @copyright  2010-2012 Abhianni Group.

	 * @link       http://www.abhianni.com

	 * @file       Definations File

	 */

		require_once $baseROOT . "/module/classMysql.php"; 	

		require_once $baseROOT . "/module/validation.php";

		require_once $baseROOT . "/module/classUtility.php"; 	

	

	/*

	 * Mysql Table Name Defination

	 */	 



	define("tblConfigure",			"tbl_gentsdeals_configure", 					true);

	

	define("tblAdministrator",		"tbl_gentsdeals_administrator",					true);

	

	define("tblEmailmanage",		"tbl_gentsdeals_emailmanage",					true);

	

	define("tblOrderkey",			"tbl_orderkey",									true);

	/*

	 * From Name Defination

	 */	 

	
		
	

		define("SHOE_SHINE_ORDER_FRISCO",		    "Shoe shine supply order - Frisco", 		true);

		

		define("SHOE_SHINE_ORDER_LEAWOOD",		    "Shoe shine supply order - Leawood", 		true);

		

		define("SHOE_SHINE_ORDER_PRESTONHOLLOW",    "Shoe shine supply order - Preston Hollow", true);

		

		define("SHOE_SHINE_ORDER_OTHER",    "Shoe shine supply order - Other", true);
		
		define("SHOE_SHINE_RECEIVED_FRISCO",		    "Shoe shine supply received - Frisco", 		true);

		

		define("SHOE_SHINE_RECEIVED_LEAWOOD",		    "Shoe shine supply received - Leawood", 		true);

		

		define("SHOE_SHINE_RECEIVED_PRESTONHOLLOW",    "Shoe shine supply received - Preston Hollow", true);
		
		define("SHOE_SHINE_CONFIRMED_FRISCO",		    "Shoe shine supply confirmed - Frisco", 		true);

		

		define("SHOE_SHINE_CONFIRMED_LEAWOOD",		    "Shoe shine supply confirmed - Leawood", 		true);

		

		define("SHOE_SHINE_CONFIRMED_PRESTONHOLLOW",    "Shoe shine supply confirmed - Preston Hollow", true);



		

		define("WEEKLY_SUPPLIES_ORDER_FRISCO",			"Weekly Supplies Order - Frisco", 		 true);

		

		define("WEEKLY_SUPPLIES_ORDER_LEAWOOD",			"Weekly Supplies Order - Leawood", 		 true);

		

		define("WEEKLY_SUPPLIES_ORDER_PRESTONHOLLOW",	"Weekly Supplies Order - Preston Hollow", true);

		

		define("WEEKLY_SUPPLIES_ORDER_OTHER",	"Weekly Supplies Order - Other", true);
		
		define("WEEKLY_SUPPLIES_RECEIVED_FRISCO",			"Weekly Supplies received - Frisco", 		 true);

		

		define("WEEKLY_SUPPLIES_RECEIVED_LEAWOOD",			"Weekly Supplies received - Leawood", 		 true);

		

		define("WEEKLY_SUPPLIES_RECEIVED_PRESTONHOLLOW",	"Weekly Supplies received - Preston Hollow", true);
		
		define("WEEKLY_SUPPLIES_CONFIRMED_FRISCO",			"Weekly Supplies confirmed - Frisco", 		 true);

		

		define("WEEKLY_SUPPLIES_CONFIRMED_LEAWOOD",			"Weekly Supplies confirmed - Leawood", 		 true);

		

		define("WEEKLY_SUPPLIES_CONFIRMED_PRESTONHOLLOW",	"Weekly Supplies confirmed - Preston Hollow", true);




		define("RUSH_ORDER_FRISCO",			"Rush Orders - Frisco", 				true);

		

		define("RUSH_ORDER_LEAWOOD",		"Rush Orders - Leawood", 				true);

		

		define("RUSH_ORDER_PRESTONHOLLOW",	"Rush Orders - Preston Hollow", 		true);

		

		define("RUSH_ORDER_OTHER",	"Rush Orders - Other", 		true);

		

		

		define("PAYROLL_DISPUTE_FRISCO",			"Payroll Dispute - Frisco", 			true);

		

		define("PAYROLL_DISPUTE_LEAWOOD",			"Payroll Dispute - Leawood", 		true);

		

		define("PAYROLL_DISPUTE_PRESTONHOLLOW",		"Payroll Dispute - Preston Hollow", 	true);

		

		

		define("MEMBERSHIP_CREDIT_DISPUTE_FRISCO",			"Membership Credit Disputes - Frisco", 			true);

		

		define("MEMBERSHIP_CREDIT_DISPUTE_LEAWOOD",			"Membership Credit Disputes - Leawood", 		true);

		

		define("MEMBERSHIP_CREDIT_DISPUTE_PRESTONHOLLOW",	"Membership Credit Disputes - Preston Hollow", 	true);

		

		

		//define("PAYROLL_ADVANCE",			"Payroll Advance", 						true);

		

		define("PAYROLL_ADVANCE_FRISCO",			"Payroll Advance - Frisco", 			true);

		

		define("PAYROLL_ADVANCE_LEAWOOD",			"Payroll Advance - Leawood", 			true);

		

		define("PAYROLL_ADVANCE_PRESTONHOLLOW",		"Payroll Advance - Preston Hollow", 	true);

		

		define("PAYROLL_ADVANCE_OTHER",		"Payroll Advance - Other", 	true);

		

		

		define("QUESTION_PAYROLL_FRISCO",			"Questionpayroll - Frisco", 			true);

		

		define("QUESTION_PAYROLL_LEAWOOD",			"Questionpayroll - Leawood", 			true);

		

		define("QUESTION_PAYROLL_PRESTONHOLLOW",	"Questionpayroll - Preston Hollow", 	true);

		

		define("QUESTION_PAYROLL_OTHER",	"Questionpayroll - Other", 	true);

		

		

		

		//define("TIME_CLOCK_CORRECTION",		"Time Clock Correction", 				true);

		

		define("TIME_CLOCK_CORRECTION_FRISCO",		"Time Clock Correction - Frisco", 	true);

		

		define("TIME_CLOCK_CORRECTION_LEAWOOD",		"Time Clock Correction - Leawood", 	true);

		

		define("TIME_CLOCK_CORRECTION_PRESTONHOLLOW",	"Time Clock Correction - Preston Hollow", 	true);

		

		define("TIME_CLOCK_CORRECTION_OTHER",	"Time Clock Correction - Other", 	true);

		

		//define("DIRECT_DEPOSIT",			"Direct Deposit", 						true);

		

		define("DIRECT_DEPOSIT_FRISCO",			"Direct Deposit - Frisco", 			true);



		define("DIRECT_DEPOSIT_LEAWOOD",		"Direct Deposit - Leawood", 		true);



		define("DIRECT_DEPOSIT_PRESTONHOLLOW",	"Direct Deposit - Preston Hollow", 	true);



		define("DIRECT_DEPOSIT_OTHER",	"Direct Deposit - Other", 	true);



		

		//define("I_HAVE_GOT_IDEA",			"I've Got an Idea", 					true);

		

		define("I_HAVE_GOT_IDEA_FRISCO",	"I've Got an Idea - Frisco", 		true);

		

		define("I_HAVE_GOT_IDEA_LEAWOOD",	"I've Got an Idea - Leawood", 		true);

		

		define("I_HAVE_GOT_IDEA_PRESTONHOLLOW",	"I've Got an Idea - Preston Hollow", true);

		

		

		

		//define("REPAIR_REQUEST",			"Repair Request", 						true);

		

		define("REPAIR_REQUEST_FRISCO",			"Repair Request - Frisco", 			true);

		

		define("REPAIR_REQUEST_LEAWOOD",		"Repair Request - Leawood", 		true);

		

		define("REPAIR_REQUEST_PRESTONHOLLOW",	"Repair Request - Preston Hollow", 	true);

		

		

		//define("REQUEST_A_MEETING",			"Request A Meeting", 					true);

		

		define("REQUEST_A_MEETING_FRISCO",		"Request A Meeting - Frisco", 		true);

		

		define("REQUEST_A_MEETING_LEAWOOD",		"Request A Meeting - Leawood", 		true);

		

		define("REQUEST_A_MEETING_PRESTONHOLLOW",	"Request A Meeting - Preston Hollow", true);

		

	

		//define("DREEM_MANAGER_MEETING",		"Dream Manager Meeting Request", 		true);

		

		define("DREEM_MANAGER_MEETING_FRISCO",		"Dream Manager Meeting Request - Frisco", 		true);

		

		define("DREEM_MANAGER_MEETING_LEAWOOD",		"Dream Manager Meeting Request - Leawood", 		true);

		

		define("DREEM_MANAGER_MEETING_PRESTONHOLLOW", "Dream Manager Meeting Request - Preston Hollow", true);

		

		

		

		//define("PAID_TRANING",				"Paid Training", 						true);

		

		define("PAID_TRANING_FRISCO",				"Paid Training - Frisco", 			true);

		

		define("PAID_TRANING_LEAWOOD",				"Paid Training - Leawood", 			true);

		

		define("PAID_TRANING_PRESTONHOLLOW",		"Paid Training - Preston Hollow", 	true);

		

		

		//define("FRONT_DESK_ORDERING",		"Front Desk Supplies Orders", 				true);

		

		

		define("FRONT_DESK_ORDERING_FRISCO",	"Front Desk Supplies Orders - Frisco", 	true);

		

		define("FRONT_DESK_ORDERING_LEAWOOD",	"Front Desk Supplies Orders - Leawood", true);

		

		define("FRONT_DESK_ORDERING_PRESTONHOLLOW",	"Front Desk Supplies Orders - Preston Hollow", 	true);

		

		define("FRONT_DESK_ORDERING_OTHER",	"Front Desk Supplies Orders - Other", 	true);
		
		define("FRONT_DESK_RECEIVED_FRISCO",	"Front Desk Supplies received - Frisco", 	true);

		

		define("FRONT_DESK_RECEIVED_LEAWOOD",	"Front Desk Supplies received - Leawood", true);

		

		define("FRONT_DESK_RECEIVED_PRESTONHOLLOW",	"Front Desk Supplies received - Preston Hollow", 	true);

		define("FRONT_DESK_CONFIRMED_FRISCO",	"Front Desk Supplies confirmed - Frisco", 	true);

		

		define("FRONT_DESK_CONFIRMED_LEAWOOD",	"Front Desk Supplies confirmed - Leawood", true);

		

		define("FRONT_DESK_CONFIRMED_PRESTONHOLLOW",	"Front Desk Supplies confirmed - Preston Hollow", 	true);


		//define("COLOR_ORDER_FROM",		    "Color Order Form", 						true);

		

		

		define("COLOR_ORDER_FROM_FRISCO",		"Color Order Form - Frisco", 			true);

		

		define("COLOR_ORDER_FROM_LEAWOOD",		 "Color Order Form - Leawood", 			true);

		

		define("COLOR_ORDER_FROM_PRESTONHOLLOW", "Color Order Form - Preston Hollow", 	true);

		

		define("COLOR_ORDER_FROM_OTHER", "Color Order Form - Other", 	true);

		define("COLOR_ORDER_FROM_RECEIVED_FRISCO",		"Color Order Form received - Frisco", 			true);

		

		define("COLOR_ORDER_FROM__RECEIVED_LEAWOOD",		 "Color Order Form received - Leawood", 			true);

		

		define("COLOR_ORDER_FROM__RECEIVED_PRESTONHOLLOW", "Color Order Form received - Preston Hollow", 	true);
		
		define("COLOR_ORDER_FROM_CONFIRMED_FRISCO",		"Color Order Form confirmed - Frisco", 			true);

		

		define("COLOR_ORDER_FROM__CONFIRMED_LEAWOOD",		 "Color Order Form confirmed - Leawood", 			true);

		

		define("COLOR_ORDER_FROM__CONFIRMED_PRESTONHOLLOW", "Color Order Form confirmed - Preston Hollow", 	true);

		

		

		

		//define("GENTS_UNIVERSITY",		 "Gents University", 					true);

		

		define("GENTS_UNIVERSITY_FRISCO",		    "Gents University - Frisco", 		true);

		

		define("GENTS_UNIVERSITY_LEAWOOD",		    "Gents Universty - Leawood", 		true);

		

		define("GENTS_UNIVERSITY_PRESTONHOLLOW",    "Gents University - Preston Hollow", true);

		

		

		

		//define("PAID_TIME_OFF",		    	"Paid Vacation", 						true);

		

		define("PAID_VACATION_FRISCO",		    	"Paid Vacation - Frisco", 			true);

		

		define("PAID_VACATION_LEAWOOD",		    	"Paid Vacation - Leawood", 			true);

		

		define("PAID_VACATION_PRESTONHOLLOW",		"Paid Vacation - Preston Hollow", 	true);

		

		define("PAID_VACATION_OTHER",		"Paid Vacation - Other", 	true);
		
		
		
		define("HOUR_24_FITNESS_FRISCO",		    	"24 Hours Fitness - Frisco", 			true);	

		define("HOUR_24_FITNESS_LEAWOOD",		    	"24 Hours Fitness - Leawood", 			true);	

		define("HOUR_24_FITNESS_PRESTONHOLLOW",		"24 Hours Fitness - Preston Hollow", 	true);		

		define("HOUR_24_FITNESS_OTHER",		"24 Hours Fitness - Other", 	true);

		

		

		//define("Technical_Professional_Interivew", 	"Technical/Professional Interivew", true);

	

/* *** 

@ Beverages Orders Section			The Gents Place Technical/Professional Interivew Feedback Survey

*** */



		define("BeveragesOrdersLeawood",		"Beverages Orders - Leawood", 		true);

		define("BeveragesOrdersFrisco",			"Beverages Orders - Frisco", 			true);

		define("BeveragesOrdersPrestonHollow",	"Beverages Orders - Preston Hollow", 	true);

		define("BeveragesOrdersOther",	"Beverages Orders - Other", 	true);

		define("BeveragesOrdersreceivedLeawood",		"Beverages Orders received - Leawood", 		true);

		define("BeveragesOrdersreceivedFrisco",			"Beverages Orders received - Frisco", 			true);

		define("BeveragesOrdersreceivedPrestonHollow",	"Beverages Orders received - Preston Hollow", 	true);
		
		define("BeveragesOrdersconfirmedLeawood",		"Beverages Orders confirmed - Leawood", 		true);

		define("BeveragesOrdersconfirmedFrisco",			"Beverages Orders confirmed - Frisco", 			true);

		define("BeveragesOrdersconfirmedPrestonHollow",	"Beverages Orders confirmed - Preston Hollow", 	true);
		
		define("INTERVIEW_FORM",	"Interview Evolution Form", 	true);





		

		//define("LEAWOOD",				"Leawood", 									true);

		

		//define("FRISCO",				"Frisco", 									true);

		

		//define("PRESTON_HOLLOW",		"Preston Hollow", 							true);



/* *** 

@ 

Closing Duties >> Front Desk Closing

*** */



		define("FRONT_DESK_CLOSING_LEAWOOD",		"Front Desk Closing - Leawood", 		true);

		

		define("FRONT_DESK_CLOSING_FRISCO",			"Front Desk Closing - Frisco", 			true);

	

		define("FRONT_DESK_CLOSING_PRESTON_HOLLOW",	"Front Desk Closing - Preston Hollow", 	true);



/* *** 

@Main  >> Closing Duties >> End Of Day

*** */



		define("END_OF_DAY_LEAWOOD",				"End Of Day - Leawood", 				true);

		

		define("END_OF_DAY_FRISCO",					"End Of Day - Frisco", 					true);

	

		define("END_OF_DAY_PRESTON_HOLLOW",			"End Of Day - Preston Hollow", 			true);

		

		

		//define("OPENING_DUTIES",					"Opening Duties", 						true);

		

		define("OPENING_DUTIES_FRISCO",					"Opening Duties - Frisco", 			 true);

		

		define("OPENING_DUTIES_LEAWOOD",				"Opening Duties - Leawood", 		 true);

		

		define("OPENING_DUTIES_PRESTON_HOLLOW",			"Opening Duties - Preston Hollow", 	true);

		

		

	//	define("Leave_Early_Request",				"Leave Early Request", 					true);

		

		define("LEAVE_EARLY_REQUEST_FRISCO",			"Leave Early Request - Frisco", 		true);

		

		define("LEAVE_EARLY_REQUEST_LEAWOOD",			"Leave Early Request - Leawood", 		true);

		

		define("LEAVE_EARLY_REQUEST_PRESTON_HOLLOW",	"Leave Early Request - Preston Hollow", true);

		

		

		//define("I_Want_to_Work_More",				"I Want to Work More", 					true);

		

		define("I_WANT_TO_WORK_MORE_FRISCO",			"I Want to Work More - Frisco", 		true);

		

		define("I_WANT_TO_WORK_MORE_LEAWOOD",			"I Want to Work More - Leawood", 		true);

		

		define("I_WANT_TO_WORK_MORE_PRESTON_HOLLOW",	"I Want to Work More - Preston Hollow", true);

		

		

		define("TEST_FORM",							"Test Form", 							true);



		

		define("sessionID", 			session_id(), 										true);	

			

		





	

?>	