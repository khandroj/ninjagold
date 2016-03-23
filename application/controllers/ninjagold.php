<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NinjaGold extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->session->userdata("goldCount"))
		{
			$this->session->set_userdata("goldCount", 0);
		}

			if(!$this->session->userdata("activityLog"))
		{
			$this->session->set_userdata("activityLog", array());
		}

		$gold = $this->session->userdata("goldCount");
		$log = $this->session->userdata("activityLog");


		$this->load->view('index', array("gold" => $gold, "log" => $log));
	}

	public function process_money()
	{
		// var_dump($this->input->post());
		//add a random amount to our old gold count.

		//generate a random amount based on which building the user clicked...

		$building = $this->input->post('building');

		$min = 0;
		$max = 0;

		if($building == "farm"){
			$min = 10;
			$max = 20;

		}
		
		if($building == "cave"){
			$min = 5;
			$max = 10;

		}
		
		if($building == "house"){
			$min = 2;
			$max = 5;

		}
		
		if($building == "casino"){
			$min = -50;
			$max = 50;

		}

		$foundGold = rand($min, $max);


		//add to old count'

		//$this->session->userdata("goldCount") += $foundGold; NO GOOD

		//first we check out the old value of the gold count

		$oldGold = $this->session->userdata("goldCount");

		$newGold = $oldGold + $foundGold;

		//after we add them we check the new gold value back into the session.

		$this->session->set_userdata("goldCount", $newGold);

		//generate a new activity message

		$message = "You entered a $building and earned $foundGold golds! " . date('g:i M jS Y');

		//get the old messages array

		$messages = $this->session->userdata("activityLog");

		//mutate the old messages array

		array_unshift($messages, $message);

		//put it back in the session

		$this->session->set_userdata("activityLog", $messages);

		// echo $message;
		//want to get this back into the session-store into array


		//redirect!

		redirect("/");

	}


}























