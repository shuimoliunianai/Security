<?php

namespace Security\Config;

/**
 * Security Config
 * User: dell
 * Date: 2017/7/4
 * Time: 10:55
 * @Auth Jesse
 */

trait Config
{
    protected static $thList = [
        "AREA" => [
            "ID" => [
                "name" => "编号",
                "width" => 50,
            ],
            "TITLE" => [
                "name" => "标题",
                "width" => 120,
            ],
            "LOCATION" => [
                "name" => '地方',
                "width" => 50,
            ],
            'AUTHOR' => [
                "name" => '作者',
                "width" => 50
            ],
            'REVIEW' => [
                "name" => '初审',
                "width" => 50,
            ],
            "SIGN" => [
                "name" => "签发",
                "width" => 50,
            ],
            "CREATE" => [
                "name" => "创建时间",
                "width" => 80
            ],
            "MAKE_TOP" => [
                "name" => "置为头条",
                "width" => 50
            ],
            "MAKE_TOPIC" => [
                "name" => "置为专题",
                "width" => 50
            ],
            "STATUS" => [
                "name" => "状态",
                "width" => 50
            ],
            "DESCRIPTION" => [
                "name" => "初审/签发/置顶",
                "width" => 80
            ],
            "OPTION" => [
                "name" => "操作",
                "width" => 150
            ]
        ],
        "GOVERN" => [
            "ID" => [
                "name" => '编号',
                "width" => 30
            ],
            'CHANNEL' => [
                "name" => '频道',
                "width" => 50
            ],
            'TYPE' => [
                "name" => '类型',
                "width" => 30
            ],
            'TITLE' => [
                "name" => '标题',
                "width" => 270
            ],
            'KEYWORDS' => [
                "name" => '关键词',
                "width" => 60
            ],
            'Tag' => [
                "name" => '标签',
                "width" => 60
            ],
            'REFER' => [
                "name" => '来源',
                "width" => 40
            ],
            'CREATE_TIME' => [
                "name" => '创建时间',
                "width" => 60
            ],
            'AUTHOR' => [
                "name" => '创建人',
                "width" => 50
            ],
            'SIGNER' => [
                "name" => '签发人',
                "width" => 50
            ],
            "MAKE_TOP" => [
                "name" => "置为头条",
                "width" => 50
            ],
            "MAKE_TOPIC" => [
                "name" => "置为专题",
                "width" => 50
            ],
            "STATUS" => [
                "name" => "状态",
                "width" => 50
            ],
            "DESCRIPTION" => [
                "name" => "初审/签发/置顶",
                "width" => 80
            ],
            "OPTION" => [
                "name" => "操作",
                "width" => 150
            ]
        ],
        "NEWS" => [
            "ID" => [
                "name" => '编号',
                "width" => 30
            ],
            'CHANNEL' => [
                "name" => '频道',
                "width" => 50
            ],
            'TYPE' => [
                "name" => '类型',
                "width" => 30
            ],
            'TITLE' => [
                "name" => '标题',
                "width" => 270
            ],
            'KEYWORDS' => [
                "name" => '关键词',
                "width" => 60
            ],
            'Tag' => [
                "name" => '标签',
                "width" => 60
            ],
            'REFER' => [
                "name" => '来源',
                "width" => 40
            ],
            'CREATE_TIME' => [
                "name" => '创建时间',
                "width" => 60
            ],
            'AUTHOR' => [
                "name" => '作者',
                "width" => 50
            ],
            'SIGNER' => [
                "name" => '签发人',
                "width" => 50
            ],
            "MAKE_TOP" => [
                "name" => "置为头条",
                "width" => 50
            ],
            "MAKE_TOPIC" => [
                "name" => "置为专题",
                "width" => 50
            ],
            "STATUS" => [
                "name" => "状态",
                "width" => 50
            ],
            "DESCRIPTION" => [
                "name" => "初审/签发/置顶",
                "width" => 80
            ],
            "OPTION" => [
                "name" => "操作",
                "width" => 150
            ]
        ],
    ];

    protected static $styleOption = [
        'TYPE_SEARCH_OPTION' => [
            0 => [
                "name" => '全部类型',
                "value" => ''
            ],
            1 => [
                "name" => '大图',
                "value" => 1
            ],
            2 => [
                "name" => '小图',
                "value" => 2
            ],
            3 => [
                "name" => '三图',
                "value" => 3
            ],
            4 => [
                "name" => '画廊',
                "value" => 4
            ],
            5 => [
                "name" => '微视',
                "value" => 5
            ]
        ]
    ];

    protected static $createButton = [
        'AREA' => "<a href='javascript:;' onclick=\"area_news_add('添加地方新闻','/admin/area/area_news_add','900','600');\" class='btn btn-primary radius'><i class='Hui-iconfont'>&#xe600;</i> 添加地方新闻</a>",
        "GOVERN" => "<span class='l'> <a class='btn btn-primary radius' data-title='添加政务' data-href='/admin/govern/govern_news_add' onclick=\"govern_news_add('添加政务','/admin/govern/govern_news_add','800','500')\" href='javascript:;'><i class='Hui-iconfont'>&#xe600;</i> 添加政务</a> </span>",
        'NEWS'=>"<span class='l'><a class='btn btn-primary radius' data-title='添加新闻' data-href='/admin/news/news_add.html' onclick=\"news_add('添加新闻','/admin/news/news_add.html','800','500')\" href='javascript:;'><i class='Hui-iconfont'>&#xe600;</i>添加新闻</a></span>"
    ];

    protected static $newsStatusStyle = [
        0 => [
            'name' => '已删除',
            'class' => 'label label-warning radius'
        ],
        1 => [
            'name' => "待初审",
            'class' => 'label label-default radius'
        ],
        2 => [
            'name' => '待签发',
            'class' => 'label label-secondary radius'
        ],
        3 => [
            'name' => '已签发',
            'class' => 'label label-success radius'
        ],
        4 => [
            'name' => '初审回退',
            'class' => 'label label-warning radius'
        ],
        5 => [
            'name' => '签发回退',
            'class' => 'label label-warning radius'
        ],
        6 => [
            'name' => '作者追回',
            'class' => 'label label-warning radius'
        ],
        7 => [
            'name' => '初审追回',
            'class' => 'label label-warning radius'
        ],
        8 => [
            'name' => '签发追回',
            'class' => 'label label-warning radius'
        ],
    ];

    protected static $newsStatus = [
        "ALL" => [
            "name" => "全部状态",
            "value" => 10000
        ],
        "REVIEW_WAIT" => [
            "name" => '待初审',
            "value" => 1
        ],
        "SIGN_WAIT" => [
            "name" => '待签发',
            "value" => 2,
        ],
        "SIGN_SUCCESS" => [
            "name" => "已签发",
            "value" => 3
        ],
        "REVIEW_FAIL" => [
            "name" => "初审回退",
            "value" => 4
        ],
        "SIGN_FAIL" => [
            "name" => "签发回退",
            "value" => 5
        ],
        "AUTHOR_BACK" => [
            "name" => "作者追回",
            "value" => 6
        ],
        "REVIEW_BACK" => [
            "name" => "初审追回",
            "value" => 7
        ],
        "SIGN_BACK" => [
            "name" => "签发追回",
            "value" => 8
        ]
    ];

    protected static $handleStatusList = [
        "REVIEW_WAITING" => [
            "REVIEW_WAIT", "SIGN_FAIL", "REVIEW_BACK"
        ],
        "REVIEW_DONE" => [
            "SIGN_WAIT", "SIGN_SUCCESS", "SIGN_BACK"
        ],
        "SIGN_WAITING" => [
            "SIGN_WAIT", "SIGN_BACK"
        ],
        "SIGN_DONE" => [
            "SIGN_SUCCESS",
        ]
    ];

    protected static $statusRelation = [
        1 => "REVIEW_WAIT",
        2 => "SIGN_WAIT",
        3 => "SIGN_SUCCESS",
        4 => "REVIEW_FAIL",
        5 => "SIGN_FAIL",
        6 => "AUTHOR_BACK",
        7 => "REVIEW_BACK",
        8 => "SIGN_BACK",
    ];

    protected static $receiveStatus = [
        'APPOINT' => 1,
        'NOT_APPOINT' => 2,
        'RECEIVED' => 3
    ];

    protected static $currentRole = [
        1 => "新闻-头条-签发",
        2 => "新闻-专题-签发",
    ];

    protected static $newListHtml = [

    ];

    protected static $newsListHtml = [
        "MAKE_TOP" => [
            "top_done" => "<a class='ml-5' onClick=\"area_news_headlineno(this,?)\" href='javascript:;' title='取消'><span class='label label-success radius'>头条</span></a>",
            "top_before" => "<a class='ml-5' onClick=\"area_news_headlineyes(this,?)\" href='javascript:;' title='置为头条'><span class='label label-default radius'>非头条</span></a>",
            "top_delete" => "<span class='label label-warning radius' style='cursor: not-allowed;'>已删除</span>",
            "top_common" => "<span class='label label-warning radius' style='cursor: not-allowed;'>未签发</span>"
        ],
        "MAKE_TOPIC" => [
            "topic_before" => "<a class='ml-5' onClick=\"area_news_specialyes('置为专题','/admin/area/area_news_specialyes',?,'500','300');\" href='javascript:;' title='置为专题'><span class='label label-default radius'>非专题</span></a>",
            "topic_done" => "<a class='ml-5' onClick=\"area_news_specialno(this,?)\" href='javascript:;' title='取消'><span class='label label-success radius'>专题</span></a>",
            "topic_delete" => "<span class='label label-warning radius' style='cursor: not-allowed;'>已删除</span>",
            "topic_common" => "<span class='label label-warning radius' style='cursor: not-allowed;'>未签发</span>"
        ],
        "AUTHOR_BACK" =>
            [
                "html" => "<a style='text-decoration:none' onClick=\"area_news_takeback(?,6);\" href='javascript:;'>追回</a>",
                "location" => "option"
            ],
        "REVIEW" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_trial('初审','/admin/area/area_news_trial',?,'600','300');\" href='javascript:;' title='初审'>初审</a>",
                "location" => "option"
            ],
        "REVIEW_RECEIVE" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_trialget('领取','/admin/area/area_news_trialget',?,'600','300');\" href='javascript:;' title='领取'>领取</a>",
                "location" => "option"
            ],
        "REVIEW_BACK" =>
            [
                "html" => "<a style='text-decoration:none' onClick=\"area_news_takeback(?,7);\" href='javascript:;'>追回</a>&nbsp;&nbsp;",
                "location" => "option"
            ],
        "SIGN" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_sign('签发','/admin/area/area_news_sign',?,'600','300');\" href='javascript:;' title='签发'>签发</a>",
                "location" => "option"
            ],
        "SIGN_RECEIVE" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_signget('领取','/admin/area/area_news_signget',?,'600','300');\" href='javascript:;' title='领取'>领取</a>",
                "location" => "option"
            ],
        "SIGN_BACK" =>
            [
                "html" => "<a style='text-decoration:none' onClick='area_news_takeback(?,8);' href='javascript:;'>追回</a>",
                "location" => "option"
            ],
        "EDIT" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_edit('地方新闻编辑','/admin/area/area_news_edit',?);\" href='javascript:;' title='编辑'><i class='Hui-iconfont Hui-iconfont-edit'></i></a>",
                "location" => "common_option"
            ],
        "DELETE" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_del(this,?);\" href='javascript:;' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a>",
                "location" => "common_option"
            ],
        "PREVIEW" =>
            [
                "html" => "<a style='text-decoration:none' class='ml-5' onClick=\"area_news_preview('地方新闻预览','/admin/area/area_news_preview',?,'500','900');\" href=\"javascript:;\" title=\"预览\">预览</a>",
                "location" => "common_option"
            ],
        "STICKY" =>
            [
                "html" => "<select name='top' id='top' onchange=\"area_news_top(this,?)\">",
                "location" => "option"
            ],
        "HEAD_LINE_STICKY"=>[
            "html"=>"<select name='top'  id='top' onchange=\"news_top(this,'{id}','{head_line}',this.value,'{value_channel_id}','{request_channel_id}')\">",
            "location"=>"option"
        ],
        "STATUS" => " <span class='{class}'>{name}</span>",
        "CREATE" => "<span class='l'><a href='javascript:;' onclick=\"area_news_add('添加地方新闻','/admin/area/area_news_add','900','600')\" class='btn btn-primary radius'><i class='Hui-iconfont'>&#xe600;</i> 添加地方新闻</a></span>",
        "EMPTY"=>'<span></span>',
        'NOT_ALLOW'=>'<span class="label label-warning radius" style="cursor: not-allowed;">不允许</span>',
        'REVIEW_RECEIVE_BY_OTHER'=>[
            'html'=>"<span style='cursor: not-allowed;'>已被?领取</span>",
            'location'=>'option'
        ],
        'SIGN_RECEIVE_BY_OTHER'=>[
            'html'=>"<span style='cursor: not-allowed;'>已被?领取</span>",
            'location'=>'option'
        ],
    ];

    protected static $optionLocation = [

    ];

    protected static $topActionHtml = [
        0 => [
            "name" => "未置顶",
            "value" => 0
        ],
        99 => [
            "name" => "置顶一",
            "value" => 99,
        ],
        98 => [
            "name" => "置顶二",
            "value" => 98,
        ],
        97 => [
            "name" => "置顶三",
            "value" => 97,
        ],
        96 => [
            "name" => "置顶四",
            "value" => 96,
        ],
        95 => [
            "name" => "置顶五",
            "value" => 95,
        ],
        94 => [
            "name" => "置顶六",
            "value" => 94,
        ],
        93 => [
            "name" => "置顶七",
            "value" => 93,
        ],
        92 => [
            "name" => "置顶八",
            "value" => 92,
        ],
        91 => [
            "name" => "置顶九",
            "value" => 91,
        ],
        90 => [
            "name" => "置顶十",
            "value" => 90,
        ],
        89 => [
            "name" => "置顶十一",
            "value" => 89,
        ],
        88 => [
            "name" => "置顶十二",
            "value" => 88,
        ],
        87 => [
            "name" => "置顶十三",
            "value" => 87,
        ],
        86 => [
            "name" => "置顶十四",
            "value" => 86,
        ],
        85 => [
            "name" => "置顶十五",
            "value" => 85,
        ],
    ];
}