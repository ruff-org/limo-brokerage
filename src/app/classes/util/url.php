<?php
    class Util_Url{
        /*
            Util_Url::get_url()
                @Returns the current page URL.
        */
        public static function get_url(){
            return \ice\Layout::get_actual_url(); 
        }
    }