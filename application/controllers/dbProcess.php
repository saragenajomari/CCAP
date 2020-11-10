<?php 

class DbProcess extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }
	/* User Authentication */
	public function userlogin()
	{
        $email = $this->input->post('emailLog'); 
        $password = $this->input->post('pword');
        $exist = $this->accounts_model->login($email,$password);
        if($exist == 1){
            $data['logged'] = $this->accounts_model->login_get_user($email,$password);
            foreach($data['logged'] as $data_item_userdata){
                $_SESSION['uid'] = $data_item_userdata->id;
                $_SESSION['fname'] = $data_item_userdata->fname;
                $_SESSION['lname'] = $data_item_userdata->lname;
                $_SESSION['type'] = $data_item_userdata->type;
            } 
           if($_SESSION['type']=='admin'){
                $_SESSION['prod'] = 'car';
           }
        }
        echo $exist;
	}

    /*Register a seller*/
    public function registerUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password'); 
        $fname =  $this->input->post('fname');
        $lname =  $this->input->post('lname');
        $address = $this->input->post('address');
        $contact = $this->input->post('cnum');
       
            //For storing users information to db
            $userdata = array(
                'email' => $email,
                'password' => $password,
                'fname' => $fname,
                'lname' => $lname,
                'address' => $address,
                'contact' => $contact,
                'type' => 'seller'
            );
           $this->accounts_model->add_account($userdata);
    }

    public function add_rating_part(){
       
        $rate = $_POST['vote'];
        $comment = $_POST['comment'];
        $id = $_POST['id'];
        $user = $_POST['user'];
        $date_cur = date("Y-m-d");

        $ratingdata= array(
            'id' => $id,
            'rating' => $rate,
            'comment' => $comment,
            'user' => $user,
            'comment_date' => $date_cur
        );
        $this->rating_model->add_rating_part($ratingdata);
    }


    public function add_rating(){
       
        $rate = $_POST['vote'];
        $comment = $_POST['comment'];
        $id = $_POST['id'];
        $user = $_POST['user'];
        $date_cur = date("Y-m-d");

        $ratingdata= array(
            'id' => $id,
            'rating' => $rate,
            'comment' => $comment,
            'user' => $user,
            'comment_date' => $date_cur
        );
        $this->rating_model->add_rating($ratingdata);
    }

    public function delete_rating_part(){
       
        $id = $_POST['id'];
        
        $ratingdata= array(
            'id' => $id,
        );
        $this->rating_model->delete_rating_part($ratingdata);
    }


    public function delete_rating(){
       
        $id = $_POST['id'];
        
        $ratingdata= array(
            'id' => $id,
        );
        $this->rating_model->delete_rating($ratingdata);
    }

    /*Add a car*/
    public function add_product(){
        $pic1;
        $pic2;
        $pic3;
        $pic4;
        $pic5;
        $fileNameNew;
        $sellerid = $_SESSION['uid'];
        $sellerName = $_SESSION['fname']." ".$_SESSION['lname'];
        $sellerName = strtoupper($sellerName);
        //Post values for products from form
        $make = $this->input->post('make'); 
        $make = strtoupper($make);
        $model = $this->input->post('model'); 
        $model = strtoupper($model);
        $price = $this->input->post('price');
        $year = $this->input->post('year');  
        $trans = $this->input->post('trans');  
        $seatCap = $this->input->post('seatCap');
        $color = $this->input->post('color');
        $mileage = $this->input->post('mileage');
        $bstyle = $this->input->post('bstyle');
        $cengine = $this->input->post('cEngine');
        $door = $this->input->post('door');
        $dtype = $this->input->post('dType');
        $fuelType = $this->input->post('fuelType');
        $note = $this->input->post('note');
        $rfs = $this->input->post('rfs');
        $date1 = $this->input->post('date');
        $date = date('Y-m-d', strtotime($date1));
        
        //For uploading image to a folder
        //picture 1
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['file1']['name'];
        $_FILES['file']['type']     = $_FILES['file1']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['file1']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['file1']['error'];
        $_FILES['file']['size']     = $_FILES['file1']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic1 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/cars";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  
        
        //picture 2
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['file2']['name'];
        $_FILES['file']['type']     = $_FILES['file2']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['file2']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['file2']['error'];
        $_FILES['file']['size']     = $_FILES['file2']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic2 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/cars";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  

        //picture 3
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['file3']['name'];
        $_FILES['file']['type']     = $_FILES['file3']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['file3']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['file3']['error'];
        $_FILES['file']['size']     = $_FILES['file3']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic3 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/cars";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  

        //picture 4
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['file4']['name'];
        $_FILES['file']['type']     = $_FILES['file4']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['file4']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['file4']['error'];
        $_FILES['file']['size']     = $_FILES['file4']['size'];

        $fileNameNew  = $random.$_FILES['file']['name']; 
        $pic4 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/cars";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  

        //picture 5
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['file5']['name'];
        $_FILES['file']['type']     = $_FILES['file5']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['file5']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['file5']['error'];
        $_FILES['file']['size']     = $_FILES['file5']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic5 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/cars";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  
        
        //For storing cars's information to db
        $itemdata = array(
            'sellerId' => $sellerid,
            'make' => $make,
            'price' => $price,
            'model' => $model, 
            'status' => 'pending',
            'year' => $year,
            'transmission' => $trans,
            'seating_capacity' => $seatCap,
            'bodystyle' => $bstyle,
            'mileage' => $mileage,
            'color' => $color,
            'cylinder_engine' => $cengine,
            'door' => $door,
            'drive_type' => $dtype,
            'fuel_type' => $fuelType,
            'note' => $note, 
            'rfs' => $rfs,
            'pictureOne' => $pic1,
            'pictureTwo' => $pic2,
            'pictureThree' => $pic3,
            'pictureFour' => $pic4,
            'pictureFive' => $pic5,
            'seller_name' => $sellerName,
            'post_date' => date('Y-m-d'),
            'update_car_on' => $date
        );
        
        $query_result = $this->product_model->add_product($itemdata);
        redirect('pages/success_dashboard_seller');
    }

    public function alter_product(){
    
        $id = $this->input->post('carId'); 
        $data['item_details'] = $this->product_model->get_items($id);
        
        foreach($data['item_details'] as $data_items){
            $sellerId =  $data_items->sellerId;
            $sellerName =  $data_items->seller_name; 
        }

        //uploading new pictures 
        //picture 1
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['pic1']['name'];
            $_FILES['file']['type']     = $_FILES['pic1']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pic1']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['pic1']['error'];
            $_FILES['file']['size']     = $_FILES['pic1']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic1 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/cars";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic1 = $data_items->pictureOne; 
                }
            } 

            //picture 2
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['pic2']['name'];
            $_FILES['file']['type']     = $_FILES['pic2']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pic2']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['pic2']['error'];
            $_FILES['file']['size']     = $_FILES['pic2']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic2 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/cars";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic2 = $data_items->pictureTwo; 
                }
            } 

            //picture 3
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['pic3']['name'];
            $_FILES['file']['type']     = $_FILES['pic3']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pic3']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['pic3']['error'];
            $_FILES['file']['size']     = $_FILES['pic3']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic3 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/cars";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic3 = $data_items->pictureThree; 
                }
            } 

            //picture 4
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['pic4']['name'];
            $_FILES['file']['type']     = $_FILES['pic4']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pic4']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['pic4']['error'];
            $_FILES['file']['size']     = $_FILES['pic4']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic4 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/cars";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic4 = $data_items->pictureFour; 
                }
            } 

            //picture 5
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['pic5']['name'];
            $_FILES['file']['type']     = $_FILES['pic5']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pic5']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['pic5']['error'];
            $_FILES['file']['size']     = $_FILES['pic5']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic5 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/cars";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic5 = $data_items->pictureFive; 
                }
            } 

        $make = $this->input->post('mk'); 
        $make = strtoupper($make);
        $model = $this->input->post('mod'); 
        $model = strtoupper($model);
        $price = $this->input->post('pr');
        $year = $this->input->post('yr');  
        $trans = $this->input->post('tr');  
        $seatCap = $this->input->post('seat');
        $color = $this->input->post('clr');
        $mileage = $this->input->post('miles');
        $bstyle = $this->input->post('bodstyle');
        $cengine = $this->input->post('cengine');
        $door = $this->input->post('dr');
        $dtype = $this->input->post('drive');
        $fuelType = $this->input->post('fuel');
        $note = $this->input->post('nt');
        $rfs = $this->input->post('reason');
        $date1 = $this->input->post('dt');
        $date = date('Y-m-d', strtotime($date1));

        $itemdata = array(
            
            'sellerId' => $sellerId,
            'make' => $make,
            'price' => $price,
            'model' => $model, 
            'status' => 'approved',
            'year' => $year,
            'transmission' => $trans,
            'seating_capacity' => $seatCap, 
            'bodystyle' => $bstyle,
            'mileage' => $mileage,
            'color' => $color,
            'cylinder_engine' => $cengine,
            'door' => $door,
            'drive_type' => $dtype,
            'fuel_type' => $fuelType,
            'note' => $note,
            'rfs' => $rfs,
            'pictureOne' => $pic1,
            'pictureTwo' => $pic2,
            'pictureThree' => $pic3,
            'pictureFour' => $pic4,
            'pictureFive' => $pic5,
            'seller_name' => $sellerName,
            'update_car_on' => $date
            //'post_date' => $date
        );
        $this->product_model->edit_product($itemdata,$id); 
        redirect('pages/success_edit_car/'.$id);
    }
    /*Add a Part*/
    public function add_parts(){
        
        $pic1;
        $pic2;
        $pic3;
        $fileNameNew;
        $sellerid = $_SESSION['uid'];
        $sellerName = $_SESSION['fname']." ".$_SESSION['lname'];
        $sellerName = strtoupper($sellerName);

        //Post values for parts from form
        $price = $this->input->post('price');
        $pcat = $this->input->post('prodCat');
        $pcat = strtoupper($pcat);
        $brand = $this->input->post('brand');
        $brand = strtoupper($brand);
        $color = $this->input->post('color');
        $desc = $this->input->post('desc');
        $note = $this->input->post('note');
        $model_name = $this->input->post('model_name');
        $rfs = $this->input->post('rfs');
        $date1 = $this->input->post('date1');
        $date = date('Y-m-d', strtotime($date1));

        //For uploading image to a folder
        //picture 1
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['pfiles1']['name'];
        $_FILES['file']['type']     = $_FILES['pfiles1']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['pfiles1']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['pfiles1']['error'];
        $_FILES['file']['size']     = $_FILES['pfiles1']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic1 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/parts";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  
        
        //picture 2
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['pfiles2']['name'];
        $_FILES['file']['type']     = $_FILES['pfiles2']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['pfiles2']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['pfiles2']['error'];
        $_FILES['file']['size']     = $_FILES['pfiles2']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic2 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/parts";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  

        //picture 3
        $random = uniqid();
        $_FILES['file']['name']     = $_FILES['pfiles3']['name'];
        $_FILES['file']['type']     = $_FILES['pfiles3']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['pfiles3']['tmp_name'];
        $_FILES['file']['error']     = $_FILES['pfiles3']['error'];
        $_FILES['file']['size']     = $_FILES['pfiles3']['size'];

        $fileNameNew  = $random.$_FILES['file']['name'];
        $pic3 = $fileNameNew;

        $config['file_name'] = $fileNameNew;
        $config['upload_path']=  "./uploads/parts";
        $config['allowed_types'] = "jpg|jpeg|png";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            if(is_file($config['upload_path'])){
                chmod($config['upload_path'], 777); 
            }
            $this->upload->data();
        }else{
            $data['error'] = array('error' => $this->upload->display_errors());
            echo $data['error']['error'];
        }  
        //For storing part's information to db
        $itemdata = array(
            'price_range' => $price,
            'parts_category' => $pcat,
            'brand' => $brand,
            'color' => $color,
            'desc' => $desc,
            'note' => $note,
            'seller_id' => $sellerid,
            'picture' =>  $pic1,
            'pictureTwo' => $pic2,
            'pictureThree' => $pic3,
            'seller_name' => $sellerName,
            'post_date' => date('Y-m-d'),
            'status' => 'pending',
            'model_name' => $model_name,
            'rfs' => $rfs,
            'update_part_on' => $date
        );

        $query_result = $this->product_model->add_part($itemdata);
        redirect('pages/success_dashboard_seller_part');
    }

    function alter_parts(){
           
        $id = $this->input->post('partId'); 
        $data['item_details'] = $this->parts_model->get_items_parts($id);
        
        foreach($data['item_details'] as $data_items){
            $seller_id =  $data_items->seller_id;
            $seller_name =  $data_items->seller_name;
        }

        //picture 1
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['ppic1']['name'];
            $_FILES['file']['type']     = $_FILES['ppic1']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ppic1']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['ppic1']['error'];
            $_FILES['file']['size']     = $_FILES['ppic1']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic1 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/parts";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic1 = $data_items->picture; 
                }
            } 

            //picture 2
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['ppic2']['name'];
            $_FILES['file']['type']     = $_FILES['ppic2']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ppic2']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['ppic2']['error'];
            $_FILES['file']['size']     = $_FILES['ppic2']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic2 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/parts";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic2 = $data_items->pictureTwo; 
                }
            } 

            //picture 3
            $random = uniqid();
            $_FILES['file']['name']     = $_FILES['ppic3']['name'];
            $_FILES['file']['type']     = $_FILES['ppic3']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ppic3']['tmp_name'];
            $_FILES['file']['error']     = $_FILES['ppic3']['error'];
            $_FILES['file']['size']     = $_FILES['ppic3']['size'];

            if(!empty($_FILES['file']['name'])){
                $fileNameNew  = $random.$_FILES['file']['name'];
                $pic3 = $fileNameNew;

                $config['file_name'] = $fileNameNew;
                $config['upload_path']=  "./uploads/parts";
                $config['allowed_types'] = "jpg|jpeg|png";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    if(is_file($config['upload_path'])){
                        chmod($config['upload_path'], 777); 
                    }
                    $this->upload->data();
                }else{
                    $data['error'] = array('error' => $this->upload->display_errors());
                    echo $data['error']['error'];
                } 
            }else{
                foreach($data['item_details'] as $data_items){
                    $pic3 = $data_items->pictureThree; 
                }
            } 


        $price = $this->input->post('price');
        $pcat = $this->input->post('prodCat');
        $pcat = strtoupper($pcat);
        $brand = $this->input->post('brand');
        $brand = strtoupper($brand);
        $color = $this->input->post('color');
        $desc = $this->input->post('desc');
        $note = $this->input->post('note');
        $model_name = $this->input->post('model_name');
        $rfs = $this->input->post('rfs');
        $date1 = $this->input->post('dtp');
        $date = date('Y-m-d', strtotime($date1));

        $itemdata = array(
            'price_range' => $price,
            'parts_category' => $pcat,
            'brand' => $brand,
            'color' => $color,
            'desc' => $desc,
            'note' => $note,
            'seller_id' => $seller_id,
            'picture' =>  $pic1,
            'pictureTwo' => $pic2,
            'pictureThree' => $pic3,
            'seller_name' => $seller_name,
            'post_date' => $date,
            'status' => 'approved',
            'model_name' => $model_name,
            'rfs' => $rfs,
            'update_part_on' => $date
        );

        $query_result = $this->parts_model->edit_parts($itemdata,$id);
        redirect('pages/success_edit_part/'.$id);
    }

    /*Admin approve a pending request for car*/
    function approve_car(){
        $id = $this->input->post('id');
        $this->product_model->approve_car($id);
        echo 1;
    }

    /*Admin approve a pending request for part*/
    function approve_part(){
        $id = $this->input->post('id');
        $this->parts_model->approve_part($id);
        echo 1;
    }

    /*Admin/Seller disapprove/remove a pending/approved request on a car*/
    function decline_car(){
        $id = $this->input->post('id');
        $this->product_model->decline_car($id);
        echo 1;
    }

    /*Admin/Seller disapprove/remove a pending/approved request on a part*/
    function decline_part(){
        $id = $this->input->post('id');
        $this->parts_model->decline_part($id);
        echo 1;
    }

    /*Seller mark as sold on a car*/
    function sold_car(){
        $id = $this->input->post('id');
        $this->product_model->sold_car($id);
        echo 1;
    }
    
    /*Seller mark as sold on a part*/
    function sold_part(){
        $id = $this->input->post('id');
        $this->parts_model->sold_part($id);
        echo 1;
    }

    function logout(){
        unset(
            $_SESSION['uid'],
            $_SESSION['fname'],
            $_SESSION['lname'],
            $_SESSION['type'],
            $_SESSION['prod']
            );
            session_destroy();
            redirect('pages/index');
    }
}

?>