<?php
//
    class Presenter_Document extends Presenter{
        public function view(){

            //$this->site = \Config::get('site');
            /* Set title and description */
            $this->t = ""; $this->d = ""; $this->e = false;
            if(!isset($this->layout->title)){
                $this->t = Layout_Site::site_name . " | Blazed Labs";
            } else {  
                $this->t = $this->layout->title . " | " . Layout_Site::site_name . " | Blazed Labs"; 
            } 
            if(!isset($this->layout->description)){
                $this->d = Layout_Site::site_desc; 
            } else { 
                $this->d = $this->layout->description;
            }
            if(\Fuel::$env == \Fuel::PRODUCTION){
                //Only run in production
                $this->e = true;
            }
        }
    }