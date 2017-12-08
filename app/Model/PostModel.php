<?php
class Post extends AppModel {
    public $validate = array(
//        'title' => array(
//            'rule' => 'email',
//            'required' => true,
//            'message'  => '只接受字母和数字'
//        ),
//        'body' => array(
//            'rule' => 'notEmpty'
//        )
        'title' => 'email',
        'body' => 'notEmpty'
    );
}

//class User extends AppModel {
//    public $validate = array(
//        'login' => array(
//            'alphaNumeric' => array(
//                'rule'     => 'alphaNumeric',
//                'required' => true,
//                'message'  => '只接受字母和数字'
//            ),
//            'between' => array(
//                'rule'    => array('between', 5, 15),
//                'message' => '5到15个字符'
//            )
//        ),
//        'password' => array(
//            'rule'    => array('minLength', '8'),
//            'message' => '最少8个字符长'
//        ),
//        'email' => 'email',
//        'born' => array(
//            'rule'       => 'date',
//            'message'    => '请输入合法的日期',
//            'allowEmpty' => true
//        )
//    );
//}

?>