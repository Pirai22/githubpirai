<?php
include_once('../DBConfig/Config.php');
class form extends dbconfig
{
    public function appoinment_form($patient_id,$appointment_date, $appointment_time,$status)
    {
        $sql = "insert into xxits_hms_app_det_t (patient_id, appointment_date, appointment_time, status)
        values ('".$patient_id."','".$appointment_date."','".$appointment_time."','".$status."')"; 
        // print_r($sql); 

        $result = mysqli_query($this->config(),$sql );
        // print_r($result);

        if($result ==0){

            header("location:http://localhost/Hospital/Main/Set_Hospital_Form.php");

        }
        
        else{

            header("location:http://localhost/Hospital/Pages/Hospital_List.php?inserted");
        }

    }

    public function appoinment_update($appointment_id, $patient_id, $appointment_date, $appointment_time, $status)
    {
        print_r($appointment_id);
        $sql = "update xxits_hms_app_det_t set patient_id = '".$patient_id."' , appointment_date = '".$appointment_date."' , 
        appointment_time = '".$appointment_time."' , status = '".$status."'
        where appointment_id = '". $appointment_id ."'";

        print_r($sql);
        $result = mysqli_query($this->config(),$sql);
        // print_r($result);

        if($result == 0)
        {
            header("location:http://localhost/Hospital/Main/Set_Hospital_Form.php");
        }

        else{

            header("location:http://localhost/Hospital/Pages/Hospital_List.php?updated");
        }
    }
        
}
    
print_r($_POST);
if(($_POST['appointment_id']) == '')
{
    $hospitalform = new form();
    $hospitalform->appoinment_form($_POST['patient_id'],$_POST['appointment_date'],$_POST['appointment_time'],$_POST['status']);
}

if(isset($_POST['appointment_id']) && $_POST['appointment_id'] > 0)
{
    $hospital_update = new form();
    $hospital_update->appoinment_update($_POST['appointment_id'],$_POST['patient_id'],$_POST['appointment_date'],$_POST['appointment_time'],$_POST['status']);
}

?>