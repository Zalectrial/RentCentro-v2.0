<?php
Class Property {
	private $dbhost='rentcentro.net';
	private $dbuser='rcnet';
	private $dbpassword='ict342@usc';
	private $dbname='rcnet_assignment3';
	private $con;
    //for uploading file
	public $src = "./assets/images/";
    public $tmp;
    public $filename;
    public $type;
    public $uploadfile;

	public function startupload(){
        $this->filename = $_FILES["file"]["name"];
        $this->tmp = $_FILES["file"]["tmp_name"];
		$this->uploadfile = $this->src . basename($this->filename);
		if(move_uploaded_file($this->tmp, $this->uploadfile)){
            return $this->filename;
        }
    }
    

	public function __construct(){
		$this->con = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpassword); //initializing database conection
	}

	public function authenticate($email,$password){
		//for authenticating user
		$query="SELECT * FROM users WHERE email = :email";
		$q = $this->con->prepare($query);
		$q->execute(array(':email'=>$email));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		//password_hash($password,PASSWORD_DEFAULT);
		if(password_verify($password, $data["password"])){
			$_SESSION['email']=$email; // storing email in session data after authentication
			$_SESSION['name']=$data["fname"]; // storing name in session data
			$_SESSION['type']=$data["type"]; // storing usertype
			$_SESSION['alert']="true";
			$_SESSION['alert_message']="<i class='fa fa-check'></i> You are now connected !";
			return true;
		}else{
			return false;
		}
	}

	public function add_user($fname,$lname,$phone,$email,$password){
		// for adding new user to database
		$password=password_hash($password,PASSWORD_DEFAULT);
		$query = "INSERT INTO users SET fname=:fname,email=:email,`password`=:password,phone=:phone,lname=:lname";
		$q = $this->con->prepare($query);
		$q->execute(array(':fname'=>$fname,':lname'=>$lname,':email'=>$email,
		':password'=>$password,':phone'=>$phone));
		return true;
	}

	public function logout(){
		//for logging out user and destroying the current session
		unset($_SESSION['email']);
		unset($_SESSION['name']);
		unset($_SESSION['type']);
		$_SESSION['alert']="true";
		$_SESSION['alert_message']="<i class='fa fa-close'></i> You are now disconnected !";
		
	}



	public function getUserProperties($email){
		// gor getting all saved articles
		$query="SELECT * FROM xml_article WHERE subscriberID = :email";
		$q = $this->con->prepare($query);
		$q->execute(array(':email'=>$email));
		$data = $q->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getProperty($id){
		$query="SELECT * FROM property LEFT JOIN property_specs ON property_specs.property_id=id WHERE id = :id ";
		$q = $this->con->prepare($query);
		$q->execute(array(':id'=>$id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		return $data;
	}



	public function saveProperty(){
		$street_no=$_REQUEST["street_no"];
		$street_name=$_REQUEST["street_name"];
		$postcode=$_REQUEST["postcode"];
		$city=$_REQUEST["city"];
		$book=$_REQUEST["book"];
		$comm=$_REQUEST["comm"];
		$description=$_REQUEST["description"];
		$availablity=$_REQUEST["availablity"];
		$bedroom=$_REQUEST["bed"];
		$bathroom=$_REQUEST["bath"];
		$buiilding=$_REQUEST["building"];
		$land=$_REQUEST["land"];

		$pet=0;
		$net=0;
		$furn=0;
		$ac=0;
		$swim=0;
		$spa=0;
		$energy=0;
		if(isset($_REQUEST["pet"]))
			$pet=$_REQUEST["pet"];
		if(isset($_REQUEST["net"]))
			$net=$_REQUEST["net"];
		
		if(isset($_REQUEST["ac"]))
			$ac=$_REQUEST["ac"];
		
		if(isset($_REQUEST["furn"]))
		$furn=$_REQUEST["furn"];
		
		if(isset($_REQUEST["swim"]))
		$swim=$_REQUEST["swim"];

		if(isset($_REQUEST["spa"]))
		$spa=$_REQUEST["spa"];

		if(isset($_REQUEST["energy"]))
		$energy=$_REQUEST["energy"];

		$query = "INSERT INTO property SET street_no=:street_no,street_name=:street_name,description=:description,availablity=:availablity,postcode=:postcode,city=:city,book_price=:book,commission_rate=:comm,image=:image";
		$q = $this->con->prepare($query);
		$q->execute(array(':street_no'=>$street_no,':street_name'=>$street_name,
		':description'=>$description,':availablity'=>$availablity,':postcode'=>$postcode,
		':city'=>$city,':book'=>$book,':comm'=>$comm,':image'=>$this->startupload()
		));

		$query = "SELECT * FROM property ORDER BY id DESC LIMIT 1";
		$q = $this->con->prepare($query);
		$q->execute();
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$id=$data["id"];

		$query = "INSERT INTO property_specs SET property_id=:property_id,bedroom=:bedroom,bathroom=:bathroom,pet_friendly=:pet_friendly,furnished=:furnished,air_condition=:air_condition,swimming_pool=:swimming_pool,spa=:spa,energy=:energy,internet=:internet,building_size=:building_size,land_size=:land_size";
		$q = $this->con->prepare($query);
		$q->execute(array(':property_id'=>$id,':bedroom'=>$bedroom,
		':bathroom'=>$bathroom,':pet_friendly'=>$pet,':furnished'=>$furn,
		':air_condition'=>$ac,':swimming_pool'=>$swim,':spa'=>$spa,':energy'=>$energy,':internet'=>$net,
		':building_size'=>$buiilding,':land_size'=>$land
		));
		return true;
	}


	public function search(){
		$query=$_REQUEST["query"];
		
		$query="SELECT * FROM property p LEFT JOIN property_specs ps ON  ps.property_id=p.id WHERE street_no LIKE '%$query%' OR street_name LIKE '%$query%' OR city LIKE '%$query%' OR postcode LIKE '%$query%' ";

		if(isset($_REQUEST["checkin"]) && $_REQUEST["checkin"]!=""){
			$date=$_REQUEST["checkin"];
			$query+=" AND availablity=".$date;
		}
		
		$q = $this->con->prepare($query);
		$q->execute(array());
		$data = $q->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getAllProperties()
	{
		$query="SELECT * FROM property ";
		$q = $this->con->prepare($query);
		$q->execute(array());
		$data = $q->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function updateCommission()
	{
		$params=array(':id'=>$_REQUEST["id"],':comm'=>$_REQUEST["commission"]);
		$query = "UPDATE property SET commission_rate=:comm WHERE id=:id";
		$q = $this->con->prepare($query);
		return $q->execute($params) == true ? true : false;
	}


}