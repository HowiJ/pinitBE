<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//////////////////////////////////////////////////////////////
																//
																//
	function contains($nee, $hay) {								//
		for ($i = 0; $i < strlen($hay); $i++) {					//
			if ($hay[$i] == $nee) {								//
				return true;									//
			}
		}
		return false;
	}
	function formattedLocation($test) {
		$find = "CLLocationCoordinate2D";   //Thing we dont want
		$index = 0;                         //Reset upon doing things

		$newstr = "";                       //String to return
		$poss = "0123456789,.?-";            //Possible things to keep

		for ($i = 0; $i < strlen($test); $i++) {
			// var_dump($test[$i]);
			if ($index < strlen($find) && $test[$i] == $find[$index]) {
				$index++;
			} else {
				$index = 0;
				if (contains($test[$i], $poss)) {
					$newstr = $newstr.$test[$i];
				}
			}													//
		}														//
		return $newstr;											//
	}															//
																//
	//////////////////////////////////////////////////////////////
class Main extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() {
		parent::__construct();
		$this->load->model("Map");
	 }


	public function index()
	{
		$users = $this->Map->getAllUsers();
		$trips = $this->Map->getAllTrips();
		$pins = $this->Map->getAllPins();

		$this->load->view('index',
		array(
			"users" => $users,
			"trips" => $trips,
			"pins" 	=> $pins
		));
	}

	//////////////////////////////////////////////////////////////
	//Check Login & get User Id
	public function checkLogin() {
		$username = $this->input->post();

		$ret = $this->Map->checkUsersByName($username['username']);
		// var_dump($ret);

		if (count($ret) == 1) {
			// var_dump("Found One");
			$this->session->set_userdata('currUser', $ret);
			redirect('/');
		} else if (count($ret) == 0){
			// var_dump("No Users by that name");
			$this->Map->addUser($username);
			redirect('/checkLogin');
		} else {
			// var_dump("Wtf there's two...");
			redirect('/');
		}
	}
	public function checkLoginByName($username) {

		$ret = $this->Map->checkUsersByName($username);
		// var_dump($ret);

		if (count($ret) == 1) {
			// var_dump("Found One");
			$this->session->set_userdata('currUser', $ret);
			redirect('/');
		} else if (count($ret) == 0){
			// var_dump("No Users by that name");
			$this->Map->addUser($username);
			redirect('/checkLogin');
		} else {
			// var_dump("Wtf there's two...");
			redirect('/');
		}
	}
	//////////////////////////////////////////////////////////////




	//////////////////////////////////////////////////////////////
	//NOTITEMS
	public function notPins($name) {
		$pins = $this->Map->notPins($name);
		$encode_pins = json_encode(array("pins" => $pins));

		echo $encode_pins;
	}
	public function notTrips($name) {
		$trips = $this->Map->notTrips($name);
		$encode_trips = json_encode(array("trips" => $trips));

		echo $encode_trips;
	}
	//////////////////////////////////////////////////////////////




	//////////////////////////////////////////////////////////////
	//Adding to Database
	public function addUser() {
		$user = $this->input->post();

		// var_dump($user);
		$this->Map->addUser($user);

		redirect('/');
	}
	public function addTrips() {
		$trips = $this->input->post();

		$arr = array();
		foreach ($trips as $key => $value) {
			array_push($arr, $value);
		}
		// $trips[1] = formattedLocation($trips[1]);
		// var_dump(formattedLocation($arr[1]));
		$arr[1] = formattedLocation($arr[1]);

		// echo json_encode("YES");
		// var_dump($arr);
		$this->Map->addTrips($arr);

		redirect('/');
	}
	public function addTripsByUserName() {
		$trips = $this->input->post();

		$arr = array();
		foreach ($trips as $key => $value) {
			array_push($arr, $value);
		}
		// $trips[1] = formattedLocation($trips[1]);
		// var_dump(formattedLocation($arr[1]));
		$arr[1] = formattedLocation($arr[1]);

		// checkLoginByName($arr[count($arr)-1]);
		$uId = $this->Map->getUserIdByName($arr[count($arr)-1]);
		$userId = 1;
		foreach ($uId as $key => $value) {
			$userId = $value;
		}
		// var_dump($userId);
		if ($userId):
			$arr[4] = $userId;
		endif;
		// echo json_encode("YES");
		// var_dump($arr);
		$this->Map->addTrips($arr);

		redirect('/');
	}
	public function addPinsByUserName() {
		$pins = $this->input->post();

		$arr = array();
		foreach ($pins as $key => $value) {
			array_push($arr, $value);
		}
		$arr[0] = formattedLocation($arr[0]);
		$uId = $this->Map->getUserIdByName($arr[1]);	//Username to be at index 1
		$userId = 4;
		foreach($uId as $key => $value) {
			$userId = $value;
		}
		$arr[1] = $userId;

		$this->Map->addPins($arr);

		redirect('/');
	}
	//////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////
	//DELETING FROM DATABASE
	public function deleteTripById() {
		$idArr = $this->input->post();
		$id;
		foreach ($idArr as $key => $value) {
			$id = $value;
		}

		$this->Map->deleteTripById($id);

		redirect('/');
	}
	public function deleteUserById() {
		$idArr = $this->input->post();
		$id;
		foreach ($idArr as $key => $value) {
			$id = $value;
		}

		$this->Map->deleteUserById($id);

		redirect('/');
	}
	public function deletePinById() {
		$idArr = $this->input->post();
		$id;
		foreach($idArr as $key => $value) {
			$id = $value;
		}

		$this->Map->deletePinById($id);

		redirect('/');
	}
	//////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////
	//JSON OBJECTS FOR API USAGE
	//ALL USERS
	public function allUsers() {
		$users = $this->Map->getAllUsers();
		$encode_users = json_encode(array("users" => $users));

		echo $encode_users;
	}
	public function allTrips() {
		$trips = $this->Map->getAlltrips();
		$encode_trips = json_encode(array("trips" => $trips));

		echo $encode_trips;
	}
	public function allPins() {
		$pins = $this->Map->getAllPins();
		$encode_pins = json_encode(array("pins"=> $pins));

		echo $encode_pins;
	}
	public function tripById($id) {
		$tripsArray = $this->Map->getTripByUserId($id);
		$encode_trips = json_encode(array("trips" => $tripsArray));

		echo $encode_trips;
	}
	public function tripByName($name) {
		$tripsArray = $this->Map->getTripByUserName($name);
		$encode_trips = json_encode(array("trips" => $tripsArray));

		echo $encode_trips;
	}
	public function tripByTId($tripId) {
		$tripsArray = $this->Map->getTripByTripId($tripId);
		$encode_trips = json_encode(array("trips" => $tripsArray));

		echo $encode_trips;
	}
	public function pinsByName($name) {
		$pinsArray = $this->Map->getPinsByName($name);
		$encode_pins = json_encode(array("pins"=>$pinsArray));

		echo $encode_pins;
	}
	//////////////////////////////////////////////////////////////






	//////////////////////////////////////////////////////////////
	//							Log off usr						//
			public function logoff() {							//
				$this->session->sess_destroy();					//
				redirect('/');									//
			}													//
	//															//
	//////////////////////////////////////////////////////////////
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
