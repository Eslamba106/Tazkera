<?php

return [
    [
        "route"  => "user.dashboard",
        "title"  => "الرئيسية",
        "active" => "user.dashboard",
    ],
    [
        "route" => "user.dashboard",
        "title" => "التذاكر",
        "active"=> "user.dashboard.*",
    ],
    [
        "route" => "user.support.index",
        "title" => "الدعم الفني",
        "active"=> "user.support.*",
    ],
    // [
    //     "route" => "user.users.index",
    //     "title" => "المستخدمين",
    //     "active"=> "user.users.*",
    // ],
];
