<?php

// Patient record interface
interface PatientRecord
{
    public function return_id($_id);
    public function patient_records($pn);
}

// Class that implements interface
class Patient implements PatientRecord 
{
    // Different variables
        public $_id;
        public $first;
        public $last;
        public $dob;
        public $firstLast;
        public $insuranceRecords;
        public $pn;

        // Constructor
    public function __construct($_id, $first, $last, $dob, $pn, $insurancerecords)
    {
        $this->_id=$_id; 
        $this->firstLast=$first;
        $this->firstLast.=" ";
        $this->firstLast.=$last;
        $this->dob=$dob;
        $this->pn=$pn; 
        $this->insuranceRecords=$insurancerecords;
    }
    
    public function return_id($_id)
    {
        return $this->_id;
    }

    public function patient_records($pn)
    {
        return $this->insuranceRecords[0].",  ".$this->firstLast.",   ".$this->insuranceRecords[1].",   ".$this->insuranceRecords[2]."
        ";
    }
}
    
// Insurance class that implements interface
class Insurance implements PatientRecord
{
    public $_id;
    public $patien_id;
    public $iname;
    public $from_date;
    public $to_date;
    public $valid;
    public $pn;

    // Constructor
    public function __construct($_id, $patient_id, $iname, $from_date, $to_date, $pn)
    {
        $this->_id=$_id;
        $this->patient_id=$patient_id;
        $this->iname=$iname;
        $this->from_date= $from_date;
        $this->to_date=$to_date;
        $this->pn=$pn;
    }
    
    // Function that checks if date is valid
    public function isValid()
    {
        $format_to_date=date("m-d-y", strtotime($this->to_date));
        $current_date = date("m-d-y");
        if($format_to_date>$current_date)
        {
            $this->valid = "Yes";
        }
        elseif($format_to_date==null)
        {
            $this->valid = "Yes";
        }
        elseif($current_date>$format_to_date)
        {
            $this->valid = "No";
        }
    }   

    // returns id
    public function return_id($_id)
    {
        return $this->_id;
    }

    // returns patient number, name and if insurance is valid
    public function patient_records($patien_id)
    {
        $this->isValid();

        return array($this->pn, $this->iname, $this->valid);   
    }
} 