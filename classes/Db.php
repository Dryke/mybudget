<?php
    class Db
    {
        public $server_name = '127.0.0.1';
        public $user_name = 'root';
        public $password = '';
        public $use = 'mybudget';

        public function connect()
        {
            $mysqli = new mysqli($this->server_name, $this->user_name, $this->password);

            if($mysqli->connect_error)
            {
                Db::showError($mysqli->connect_errno .' - '.$mysqli->connect_error);
            }
            else
            {
                $mysqli->select_db($this->use);
                return $mysqli;
            }
        }

        public function execute($query)
        {
            $mysqli = $this->connect();
            if($mysqli->query($query))
            {
                return true;
            }
            else
            {
                Db::showError($mysqli->error);
                return false;
            }
        }

        public function getNumRows($query)
        {
            $mysqli = $this->connect();
            if($result = $mysqli->query($query))
            {
                return($result->num_rows);
            }
            else
            {
                Db::showError($mysqli->error);
                return false;
            }
        }

        public function getRow($query)
        {
            $mysqli = $this->connect();
            if($result = $mysqli->query($query))
            {
                if($result->num_rows > 0)
                {
                    return($result->fetch_object());
                }
                else
                {
                    return false;
                }
            }
            else
            {
                Db::showError($mysqli->error);
                return false;
            }
        }

        public function getRows($query)
        {
            $mysqli = $this->connect();
            if($result = $mysqli->query($query))
            {
                $rows = array();
                while($row = $result->fetch_assoc())
                {
                    $rows[] = $row;
                }
                return $rows;
            }
            else
            {
                Db::showError($mysqli->error);
                return false;
            }
        }

        public static function showError($error)
        {
            die('<p>Error mysqli : '.$error.'</p>');
        }

        public function getDump()
        {
            $mysqli = $this->connect();
            $tables = $mysqli->query('SHOW TABLES');
            while($row = $tables->fetch_row())
            {
                $target_tables[] = $row[0];
            }

            foreach($target_tables as $table)
            {
                $result = $mysqli->query('SELECT * FROM '.$table);
                $fields_count = $result->field_count;
                $rows_num = $mysqli->affected_rows;
                $res =   $mysqli->query('SHOW CREATE TABLE '.$table);
                $table_line = $res->fetch_row();
                $content = (!isset($content) ?  '' : $content) . "\n\n".$table_line[1].";\n\n";

                for($i = 0, $st_counter = 0; $i < $fields_count; $i++, $st_counter=0)
                {
                    while($row = $result->fetch_row())
                    {
                        if($st_counter%100 == 0 || $st_counter == 0 )
                        {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                        }
                        $content .= "\n(";
                        for($j = 0; $j < $fields_count; $j++)
                        {
                            $row[$j] = str_replace("\n","\\n", addslashes($row[$j]));
                            if(isset($row[$j]))
                            {
                                $content .= '"'.$row[$j].'"' ;
                            }
                            else
                            {
                                $content .= '""';
                            }
                            if($j < ($fields_count-1))
                            {
                                $content.= ',';
                            }
                        }
                        $content .=")";
                        if((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num)
                        {
                            $content .= ";";
                        }
                        else
                        {
                            $content .= ",";
                        }
                        $st_counter++;
                    }
                }
                $content .="\n\n";
            }
            return $content;
        }
    }
?>
