<?php
    class Category
    {
        public $id;
        public $id_parent;
        public $name;

        public function add()
        {
            $db = new Db();
            return $db->execute('INSERT INTO category(name, id_parent) VALUES("'.$this->name.'", "'.$this->id_parent.'")');
        }

        public function delete()
        {
            $db = new Db();
            if($this->id != '')
            {
                $db->execute('DELETE FROM category WHERE id_parent = "'.$this->id.'"');
                return $db->execute('DELETE FROM category WHERE id = "'.$this->id.'"');
            }
            else
            {
                return false;
            }
        }

        public static function getTree()
        {
            $db = new Db();
            $categories = $db->getRows('SELECT * FROM category WHERE id_parent = 0');
            foreach($categories as $key => $category)
            {
                $children = $db->getRows('SELECT * FROM category WHERE id_parent = "'.$category['id'].'"');
                foreach($children as $child)
                {
                    $categories[$key]['children'][] = $child;
                }
            }
            return $categories;
        }

        public static function getMainCategories()
        {
            $db = new Db();
            return $db->getRows('SELECT * FROM category WHERE id_parent = 0');
        }
    }
?>
