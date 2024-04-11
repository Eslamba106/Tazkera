<?php

return [
    [
        // "icon"   => "nav-icon fas fa-tachometer-alt",
        "route"  => "admin.dashboard",
        "title"  => "الرئيسية",
        "active" => "admin.dashboard",
    ],
    [
        // "icon"  => "far fa-circle nav-icon",
        "route" => "admin.support_team.index",
        "title" => "الدعم الفني",
        // "badge" => "Eslam",
        "active"=> "admin.support_team.*",
    ],
    [
        "route" => "admin.groups.index",
        "title" => "المجموعات",
        "active"=> "admin.groups.*",
    ],
    [
        "route" => "admin.users.index",
        "title" => "المستخدمين",
        "active"=> "admin.users.*",
    ],
];
