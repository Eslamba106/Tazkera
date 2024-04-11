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
    // [
    //     "icon"  => "far fa-circle nav-icon",
    //     "route" => "dashboard.products.index",
    //     "title" => "Products",
    //     // "badge" => "Eslam",
    //     "active"=> "dashboard.products.*",
    // ],
    // [
    //     "icon"  => "far fa-circle nav-icon",
    //     "route" => "home",
    //     "title" => "Front Office",
    //     // "badge" => "Eslam",
    //     "active"=> "/.*",
    // ],
];
