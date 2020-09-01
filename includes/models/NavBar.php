<?php

namespace App {
    class NavBar extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('navbar');
        }
        public function getParentsElements()
        {
            return $this->getManyRows([
                'parent_id' => null
            ], 'ASC', 'order_id');
        }
        public function getChilds($parent_id)
        {
            return $this->getManyRows([
                'parent_id' => $parent_id
            ]);
        }
        public function deleteElement($id)
        {
            $deletedRow = $this->getOneRow($id);
            var_dump("DEL-ID" . $deletedRow);
            if ($deletedRow == null) return false;
            $childs = $this->getChilds($id);
            if ($childs != null) {
                $this->updateRow($childs[0]['id'], [
                    'parent_id' => null,
                    'order_id' => $deletedRow['order_id']
                ]);
                for ($i = 1; $i < count($childs); $i++) {
                    $this->updateRow($childs[$i]['id'], [
                        'parent_id' => $childs[0]['id'],
                    ]);
                }
            }
            return $this->deleteRow($id);
        }
        public function addElement($title, $href, $order_id, $parent_id = null)
        {
            return $this->addRow([
                'title' => $title,
                'href' => $href,
                'order_id' => $order_id,
                'parent_id' => $parent_id
            ]);
        }
    }
}
