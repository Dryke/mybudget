<?php
    class Notification
    {
        public $class;
        public $title;
        public $text;
        public $active = 0;

        public function __construct($p_class = '', $p_title = '', $p_text = '')
        {
            if($p_class == '')
            {
                $this->active = 0;
            }
            else
            {
                $this->active = 1;
            }
            $this->class = $p_class;
            $this->title = $p_title;
            $this->text = $p_text;
        }
    }
?>
