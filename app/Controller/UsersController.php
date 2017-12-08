<?php
class UsersController extends AppController{
    public function index(){
//        $bb = $this->User->find("all");
        $bb = $this->User->find(
            'all',
            array(
//                "conditions"=>array("User.userid"=>"1"),
                "fields"=>array('User.userid','User.name', 'User.classid','User.addtime'),
                'order' => array('User.userid desc', 'User.addtime asc'),
                'group' => array('User.classid'), //将字段GROUP BY
                'limit' => 3, //int整型
                'page' => 1, //int整型
//                'offset' => n, //int整型
//                'callbacks' => true /其他值可以是 false, 'before', 'after'

            )
        );
//            pr($bb);

//        $uu = $this->User->query('select * from users where userid>2;');
//        $uu = $this->User->field('name',array("classid >="=>3),"addtime desc");
//        $uu = $this->User->read('name');
//        复杂查找
//        $conditions = array("user.name like"=>"%g%","user.userid >="=>2);
//        $conditions = array("user.name"=>array("lili","daming","sally"));
//        $conditions = array("Not"=>array("name"=>array("lili","daming","sally")));
//        $conditions = array("user.userid=user.classid");
//        $conditions = array("user.userid!=1 and user.classid>1");
//        $conditions = array("Not"=>array("name"=>array("lili","daming"),"addtime"=>null),"OR"=>array("user.name"=>array("lili","daming","sally"),"user.userid >"=>1));
        $conditions = array("user.userid between ? and ?"=>array(2,4));
//        $conditions = array("fields"=>array("user.name","user.userid desc"),"group"=>"user.userid");//执行错误
//        $conditions = array('fields' => array('DISTINCT (user.name) as u_name'),'order' => array('user.userid desc'));//执行错误
        $uu = $this->User->find("all",array('conditions'=>$conditions));

        pr($uu);
    }
}