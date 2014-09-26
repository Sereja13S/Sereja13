<?php
namespace model\service;

use model\entity\Good;
class GoodService {
    function getList($category) {
        $goods = [];     
        $stmt = \util\MySQL::$db->prepare("SELECT id, name, description, price, category_id "
                . " FROM goods WHERE category_id = :cat_id");
        
        $stmt->bindParam('cat_id', $category);
        
        $stmt->execute();
        while ($item = $stmt->fetchObject('model\entity\Good')) {
            $goods[] = $item;
        }
        
        return $goods;
    }
    function getCategoruiesList() {
        $cats = [];
        $stmt = \util\MySQL::$db->prepare("SELECT id, name FROM categories");
        
        $stmt->execute();
        
        while ($item = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cats[] = $item;
        }
        
        return $cats;
    }
    
    function find($id) {
        $stmt = \util\MySQL::$db->prepare("SELECT id, name, description, price, category_id FROM goods WHERE id=:id");
        $stmt->bindParam('id', $id);
        $stmt->execute();
        return $stmt->fetchObject('model\entity\Good');
    }
    
    function add(Good $good) {
        if (empty($good->getId())) {
            $stmt = \util\MySQL::$db->prepare("INSERT INTO goods "
                . "(name, description, price, category_id) VALUES "
                . "(:name, :description, :price, :cat_id)");
        } else {
            $stmt = \util\MySQL::$db->prepare("UPDATE goods "
                . "SET name=:name, description=:description, price=:price, category_id=:cat_id "
                . "where id=:id");
            $stmt->bindParam('id', $good->getId());
        }
        
        
        $stmt->bindParam('name', $good->getName());
        $stmt->bindParam('description', $good->getDescription());
        $stmt->bindParam('price', $good->getPrice());
        $stmt->bindParam('cat_id', $good->getCategory_id());
        
        return $stmt->execute();
    }
}
