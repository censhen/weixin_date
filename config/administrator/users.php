<?php
/**
 * Actors model config
 */
return array(
    'title' => '用户管理',
    'single' => '用户',
    'model' => 'App\User',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'photo1' => array(
            'title' => '照片1',
            'output' => '<img src="/(:value)" height="100" />',
            'sortable' => false,
        ),
//        'photo2' => array(
//            'title' => '照片2',
//            'output' => '<img src="/(:value)" height="100" />',
//            'sortable' => false,
//        ),
        'name' => array(
            'title' => '姓名',
        ),
        'gender' => array(
            'title' => '性别',
            'output' => function($value)
            {
                if($value == \App\User::GENDER_MALE)
                    return '男';
                elseif($value == \App\User::GENDER_FEMALE)
                    return '女';
                else
                    return $value;
            },
        ),
//        'created_at' => array(
//            'title' => '创建时间',
//        ),
//        'wechat_account' => array(
//            'title' => '微信账号',
//        ),
        'age' => array(
            'title' => '年龄',
        ),
        'city' => array(
            'title' => '居住地',
        ),
        'height' => array(
            'title' => '身高',
        ),
        'self_intro' => array(
            'title' => '自我介绍',
        ),
        'expectation' => array(
            'title' => '期望',
        ),
        'reviews' => array(
            'title' => '红娘评论',
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => '姓名',
            'editable' => false,
        ),
        'wechat_account' => array(
            'title' => '微信账号',
            'editable' => false,
        ),
        'interest' => array(
            'title' => '兴趣爱好',
            'editable' => false,
        ),
        'reviews' => array(
            'title' => '红娘评论',
            'type' => 'textarea',
//            'limit' => 300, //optional, defaults to no limit
            'height' => 200, //optional, defaults to 100
        ),
    ),
    'query_filter'=> function($query)
    {
        $query->where('type','=', \App\User::TYPE_MEMBER);
    },
);