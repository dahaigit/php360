<?php
/*
 *
 * composite 结构设计模式 - 组合模式
 * 组合模式（Composite Pattern）有时候又叫做部分-整体模式，用于将对象组合成树形结构以表示“部分-整体”的层次关系。组合模式使得用户对单个对象和组合对象的使用具有一致性。
 * 常见使用场景：如树形菜单、文件夹菜单、部门组织架构图等。
 * 
 *
 * */

/**
 * 组合模式抽象基类
 */
/**
 *
 *安全式合成模式
 */
interface Component {
    public function getComposite(); //返回自己的实例
    public function operation();
}

class Composite implements Component { // 树枝组件角色
    private $_composites;
    public function __construct() { $this->_composites = array(); }
    public function getComposite() { return $this; }
    public function operation() {
        foreach ($this->_composites as $composite) {
            $composite->operation();
        }
    }

    public function add(Component $component) {  //聚集管理方法 添加一个子对象
        $this->_composites[] = $component;
    }

    public function remove(Component $component) { // 聚集管理方法 删除一个子对象
        foreach ($this->_composites as $key => $row) {
            if ($component == $row) { unset($this->_composites[$key]); return TRUE; }
        }
        return FALSE;
    }

    public function getChild() { // 聚集管理方法 返回所有的子对象
        return $this->_composites;
    }

}

class Leaf implements Component {
    private $_name;
    public function __construct($name) { $this->_name = $name; }
    public function operation() {}
    public function getComposite() {return null;}
}

// client
$leaf1 = new Leaf('first');
$leaf2 = new Leaf('second');

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);
$composite->operation();
var_dump($composite);

$composite->remove($leaf2);
$composite->operation();
var_dump($composite);






/**
 *
 *透明式合成模式
 */
//interface Component { // 抽象组件角色
//    public function getComposite(); // 返回自己的实例
//    public function operation(); // 示例方法
//    public function add(Component $component); // 聚集管理方法,添加一个子对象
//    public function remove(Component $component); // 聚集管理方法 删除一个子对象
//    public function getChild(); // 聚集管理方法 返回所有的子对象
//}
//
//class Composite implements Component { // 树枝组件角色
//    private $_composites;
//    public function __construct() { $this->_composites = array(); }
//    public function getComposite() { return $this; }
//    public function operation() { // 示例方法，调用各个子对象的operation方法
//        foreach ($this->_composites as $composite) {
//            $composite->operation();
//        }
//    }
//    public function add(Component $component) { // 聚集管理方法 添加一个子对象
//        $this->_composites[] = $component;
//    }
//    public function remove(Component $component) { // 聚集管理方法 删除一个子对象
//        foreach ($this->_composites as $key => $row) {
//            if ($component == $row) { unset($this->_composites[$key]); return TRUE; }
//        }
//        return FALSE;
//    }
//    public function getChild() { // 聚集管理方法 返回所有的子对象
//        return $this->_composites;
//    }
//
//}
//
//class Leaf implements Component {
//    private $_name;
//    public function __construct($name) {$this->_name = $name;}
//    public function operation() {echo $this->_name."<br>";}
//    public function getComposite() { return null; }
//    public function add(Component $component) { return FALSE; }
//    public function remove(Component $component) { return FALSE; }
//    public function getChild() { return null; }
//}
//
//// client
//$leaf1 = new Leaf('first');
//$leaf2 = new Leaf('second');
//
//$composite = new Composite();
//$composite->add($leaf1);
//$composite->add($leaf2);
//$composite->operation();
//
//$composite->remove($leaf2);
//$composite->operation();
