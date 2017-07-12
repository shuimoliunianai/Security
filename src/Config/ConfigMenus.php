<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/4
 * Time: 10:55
 */

namespace Security\Config;


trait ConfigMenus
{
    protected static $MenusList = [
        "新闻作者" => [
            "childmenus" => [
                "发布" => [
                    "url" => "/admin/news/news_list/role/1/status/10000", "special_role" => [], "shownum" => "0"
                ],
                "专题发布" => [
                    "url" => "/admin/special/special_list/role/1/status/10000", "special_role" => ["新闻-专题-作者", "新闻-专题-初审", "新闻-专题-签发"], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "1",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"

        ],
        "新闻初审" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/news/news_list/role/2/status/1", "special_role" => [], "shownum" => "1", "refresh_type" => "trial_num"
                ],
                "已办理" => [
                    "url" => "/admin/news/news_list/role/2/status/2", "special_role" => [], "shownum" => "0"
                ],
                "专题待办理" => [
                    "url" => "/admin/special/special_list/role/2/status/1", "special_role" => ["新闻-专题-初审", "新闻-专题-签发"], "shownum" => "0"
                ],
                "专题已办理" => [
                    "url" => "/admin/special/special_list/role/2/status/2", "special_role" => ["新闻-专题-初审", "新闻-专题-签发"], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "1",
            "operate" => ["初审", "签发"],
            "shownum" => "1"
        ],
        "新闻签发" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/news/news_list/role/3/status/2", "special_role" => [], "shownum" => "1", "refresh_type" => "sign_num"
                ],
                "已办理" => [
                    "url" => "/admin/news/news_list/role/3/status/3/self/1", "special_role" => [], "shownum" => "0"
                ],
                "本频道已签发" => [
                    "url" => "/admin/news/news_list/role/3/status/3", "special_role" => [], "shownum" => "0"
                ],
                "其它频道已签发" => [
                    "url" => "/admin/news/news_list/role/4/status/3", "special_role" => ["新闻-头条-签发", "新闻-专题-签发"], "shownum" => "0"
                ],
                "频道列表" => [
                    "url" => "/admin/news/channel_list", "special_role" => ["超管"], "shownum" => "0"
                ],
                "专题待办理" => [
                    "url" => "/admin/special/special_list/role/3/status/2", "special_role" => ["新闻-专题-签发"], "shownum" => "0"
                ],
                "专题已办理" => [
                    "url" => "/admin/special/special_list/role/3/status/3/self/1", "special_role" => ["新闻-专题-签发"], "shownum" => "0"
                ],
                "专题已签发" => [
                    "url" => "/admin/special/special_list/role/3/status/3", "special_role" => ["新闻-专题-签发"], "shownum" => "0"
                ],
                "Banner列表" => [
                    "url" => "/admin/news/banner_list", "special_role" => ["新闻-头条-签发"], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "1",
            "operate" => ["签发"],
            "shownum" => "1"
        ],
        "新闻回收站" => [
            "childmenus" => [],
            "url" => "/admin/news/news_recycle",
            "channeltype" => "1",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"
        ],
        "政务作者" => [
            "childmenus" => [
                "发布" => [
                    "url" => "/admin/govern/govern_news_list/role/1/status/10000", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "2",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"
        ],
        "政务初审" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/govern/govern_news_list/role/2/status/1", "special_role" => [], "shownum" => "1", "refresh_type" => "trial_num"
                ],
                "已办理" => [
                    "url" => "/admin/govern/govern_news_list/role/2/status/2", "special_role" => [], "shownum" => "0"
                ]
            ],

            "url" => "",
            "channeltype" => "2",
            "operate" => ["初审", "签发"],
            "shownum" => "1"
        ],
        "政务签发" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/govern/govern_news_list/role/3/status/2", "special_role" => [], "shownum" => "1", "refresh_type" => "sign_num"
                ],
                "已办理" => [
                    "url" => "/admin/govern/govern_news_list/role/3/status/3/self/1", "special_role" => [], "shownum" => "0"
                ],
                "所有频道已签发" => [
                    "url" => "/admin/govern/govern_news_list/role/3/status/3", "special_role" => ["新闻-头条-签发", "新闻-专题-签发"], "shownum" => "0"
                ],
                "本频道已签发" => [
                    "url" => "/admin/govern/govern_news_list/role/3/status/3", "special_role" => [], "shownum" => "0", "nosuper" => "1"
                ],
                "厅局列表" => [
                    "url" => "/admin/govern/govern_list", "special_role" => [], "shownum" => "0"
                ],
                "分类列表" => [
                    "url" => "/admin/govern/category_list", "special_role" => [], "shownum" => "0"
                ]
            ],

            "url" => "",
            "channeltype" => "2",
            "operate" => ["签发"], "special_role" => ["新闻-头条-签发", "新闻-专题-签发"],
            "shownum" => "1"
        ],
        "政务回收站" => [
            "childmenus" => [],
            "url" => "/admin/govern/govern_recycle",
            "channeltype" => "2",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"
        ],
        "地方作者" => [
            "childmenus" => [
                "发布" => [
                    "url" => "/admin/area/area_news_list/role/1/status/10000", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "3",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"
        ],
        "地方初审" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/area/area_news_list/role/2/status/1", "special_role" => [], "shownum" => "1", "refresh_type" => "trial_num"
                ],
                "已办理" => [
                    "url" => "/admin/area/area_news_list/role/2/status/2", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "3",
            "operate" => ["初审", "签发"],
            "shownum" => "1"
        ],
        "地方签发" => [
            "childmenus" => [
                "待办理" => [
                    "url" => "/admin/area/area_news_list/role/3/status/2", "special_role" => [], "shownum" => "1", "refresh_type" => "sign_num"
                ],
                "已办理" => [
                    "url" => "/admin/area/area_news_list/role/3/status/3", "special_role" => [], "shownum" => "0"
                ],
                "所有频道已签发" => [
                    "url" => "/admin/area/area_news_list/role/3/status/3/all/1", "special_role" => ["新闻-头条-签发", "新闻-专题-签发"], "shownum" => "0"
                ],
                "本频道已签发" => [
                    "url" => "/admin/area/area_news_list/role/3/status/3/all/1", "special_role" => [], "shownum" => "0", "nosuper" => "1"
                ],
                "地方列表" => [
                    "url" => "/admin/area/area_list", "special_role" => ["超管"], "shownum" => "0"
                ]

            ],
            "url" => "",
            "channeltype" => "3",
            "operate" => ["签发"], "special_role" => ["新闻-头条-签发", "新闻-专题-签发"],
            "shownum" => "1"
        ],
        "地方回收站" => [
            "childmenus" => [],
            "url" => "/admin/area/area_news_recycle",
            "channeltype" => "3",
            "operate" => ["作者", "初审", "签发"],
            "shownum" => "0"
        ],
        "广告管理" => [
            "childmenus" => [
                "广告列表" => [
                    "url" => "/admin/advert/advert_list", "special_role" => [], "shownum" => "0"
                ],
                "广告位列表" => [
                    "url" => "/admin/advert/advert_position_list", "special_role" => ["广告-全部-签发"], "shownum" => "0"
                ],
                "广告回收站" => [
                    "url" => "/admin/advert/advert_recycle", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "9",
            "operate" => ["作者", "初审", "签发"],

            "shownum" => "0"
        ],
        "评论管理" => [
            "childmenus" => [
                "评论列表" => [
                    "url" => "/admin/comment/comment_list", "special_role" => [], "shownum" => "0"
                ],
                "管理敏感词" => [
                    "url" => "/admin/comment/comment_word", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "推送管理" => [
            "childmenus" => [
                "推送列表" => [
                    "url" => "/admin/push/push_list", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "消息管理" => [
            "childmenus" => [
                "消息列表" => [
                    "url" => "/admin/message/message_list", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "反馈管理" => [
            "childmenus" => [
                "反馈列表" => [
                    "url" => "/admin/feedback/feedback_list", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "数据统计" => [
            "childmenus" => [
                "用户操作日志" => [
                    "url" => "/admin/statistics/log", "special_role" => [], "shownum" => "0"
                ],
                "用户操作统计" => [
                    "url" => "/admin/statistics/admin_user", "special_role" => [], "shownum" => "0"
                ],
                "新闻浏览日志" => [
                    "url" => "/admin/statistics/news_view_log", "special_role" => [], "shownum" => "0"
                ],
                "新闻浏览统计" => [
                    "url" => "/admin/statistics/news", "special_role" => [], "shownum" => "0"
                ],

            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "APP用户管理" => [
            "childmenus" => [
                "APP用户列表" => [
                    "url" => "/admin/User/user_list", "special_role" => [], "shownum" => "0"
                ]
            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ],
        "后台用户管理" => [
            "childmenus" => [
                "用户管理" => [
                    "url" => "/admin/admin_user/user_list", "special_role" => [], "shownum" => "0"
                ],
                "角色管理" => [
                    "url" => "/admin/admin_role/role_list", "special_role" => [], "shownum" => "0"
                ],
                "逻辑节点管理" => [
                    "url" => "/admin/admin_lnode/lnode_list", "special_role" => [], "shownum" => "0"
                ],
                "节点管理" => [
                    "url" => "/admin/admin_node/node_list", "special_role" => [], "shownum" => "0"
                ]

            ],
            "url" => "",
            "channeltype" => "",
            "operate" => [],
            "special_role" => [],
            "shownum" => "0"
        ]


    ];

}