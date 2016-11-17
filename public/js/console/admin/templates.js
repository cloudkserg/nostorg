angular.module("templates", []).run(["$templateCache", function($templateCache) {$templateCache.put("dashboard.html","<div>\n    <!-- Content Header (Page header) -->\n    <section class=\"content-header\">\n        <h1>\n            Dashboard\n            <small>Control panel</small>\n        </h1>\n        <ol class=\"breadcrumb\">\n            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>\n            <li class=\"active\">Dashboard</li>\n        </ol>\n    </section>\n\n    <!-- Main content -->\n    <section class=\"content\">\n\n    </section>\n    <!-- /.content -->\n</div>");
$templateCache.put("orders.html","<div>\n    <div class=\"row\">\n        <div class=\"col-lg-12\">\n            <h1 class=\"page-header\">Order</h1>\n        </div>\n        <!-- /.col-lg-12 -->\n    </div>\n    <div>\n\n        <div class=\"row\">\n            <div class=\"col-sm-6\">\n                <button type=\"button\" class=\"btn btn-default btn-inverse btn-sm\" ng-click=\"reload()\">\n                    <span class=\"glyphicon glyphicon-refresh\"></span>\n                </button>\n            </div>\n            <div class=\"col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-2 col-lg-offset-4\">\n\n                <div class=\"input-group\">\n\n                    <input type=\"text\" class=\"form-control input-sm\" ng-model=\"filter.keyword\" placeholder=\"keyword\">\n                    <span class=\"input-group-btn\">\n                      <button class=\"btn btn-default btn-sm\" type=\"button\"\n                              ng-click=\"search()\"><i class=\"glyphicon glyphicon-search\"></i></button>\n                    </span>\n                </div>\n                <!-- /input-group -->\n            </div>\n            <!-- /.col-lg-6 -->\n        </div>\n\n        <table ng-table=\"tableParams\" class=\"table\" style=\"margin-top: 20px\">\n            <tr ng-repeat=\"order in $data\" class=\"text-center\">\n                <td data-title=\"\'#\'\">{{order.id}}</td>\n                <td data-title=\"\'姓名\'\">{{order.name}}</td>\n                <td data-title=\"\'手机\'\">{{order.mobile}}</td>\n                <td data-title=\"\'邮箱\'\">{{order.email}}</td>\n                <td data-title=\"\'住址\'\">{{order.address}}</td>\n                <td data-title=\"\'操作\'\">\n                    <button class=\"btn btn-default btn-sm\" ng-click=\"edit(order)\">编辑</button>\n                </td>\n            </tr>\n        </table>\n    </div>\n</div>");
$templateCache.put("photos.html","<div>\n    <!-- Content Header (Page header) -->\n    <section class=\"content-header\">\n        <h1>\n            Photos\n            <small>Control panel</small>\n        </h1>\n        <ol class=\"breadcrumb\">\n            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>\n            <li class=\"active\">photos</li>\n        </ol>\n    </section>\n\n    <!-- Main content -->\n    <section class=\"content\">\n\n    </section>\n    <!-- /.content -->\n</div>");
$templateCache.put("third-one.html","<div>\n    <!-- Content Header (Page header) -->\n    <section class=\"content-header\">\n        <h1>\n            Third One\n            <small>Control panel</small>\n        </h1>\n        <ol class=\"breadcrumb\">\n            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>\n            <li class=\"active\">third one</li>\n        </ol>\n    </section>\n\n    <!-- Main content -->\n    <section class=\"content\">\n        {{phase}}\n        <div style=\"height: 50px\"></div>\n    </section>\n    <!-- /.content -->\n</div>");
$templateCache.put("third-two.html","<div>\n    <!-- Content Header (Page header) -->\n    <section class=\"content-header\">\n        <h1>\n            Third Two\n            <small>Control panel</small>\n        </h1>\n        <ol class=\"breadcrumb\">\n            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>\n            <li class=\"active\">third two</li>\n        </ol>\n    </section>\n\n    <!-- Main content -->\n    <section class=\"content\">\n        {{phase}}\n        <div style=\"height: 1550px\"></div>\n\n    </section>\n    <!-- /.content -->\n</div>");
$templateCache.put("user-edit-modal.html","<div class=\"modal-header\">\n    <h3 class=\"modal-title\">Edit User</h3>\n</div>\n<div class=\"modal-body\">\n    <form class=\"form-horizontal\">\n        <fieldset>\n\n            <!-- Text input-->\n            <div class=\"form-group\">\n                <label class=\"col-md-4 control-label\" for=\"name\">Name</label>\n\n                <div class=\"col-md-4\">\n                    <input id=\"name\" name=\"name\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\"\n                           ng-model=\"user.name\">\n\n                </div>\n            </div>\n\n            <!-- Text input-->\n            <div class=\"form-group\">\n                <label class=\"col-md-4 control-label\" for=\"email\">Email</label>\n\n                <div class=\"col-md-4\">\n                    <input id=\"email\" name=\"email\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\"\n                           ng-model=\"user.email\">\n\n                </div>\n            </div>\n\n\n            <!-- Text input-->\n            <div class=\"form-group\">\n                <label class=\"col-md-4 control-label\" for=\"mobile\">Mobile</label>\n\n                <div class=\"col-md-4\">\n                    <input id=\"mobile\" name=\"mobile\" placeholder=\"\" class=\"form-control input-md\" required=\"\"\n                           type=\"text\" ng-model=\"user.mobile\">\n\n                </div>\n            </div>\n\n\n            <!-- Textarea -->\n            <div class=\"form-group\">\n                <label class=\"col-md-4 control-label\" for=\"address\">Address</label>\n\n                <div class=\"col-md-4\">\n                    <textarea class=\"form-control\" id=\"address\" name=\"address\" ng-model=\"user.address\"></textarea>\n                </div>\n            </div>\n\n\n        </fieldset>\n    </form>\n\n</div>\n<div class=\"modal-footer\">\n    <button class=\"btn btn-primary\" type=\"button\" ng-click=\"ok()\" ng-hide=\"readonly\">Save</button>\n    <button class=\"btn btn-warning\" type=\"button\" ng-click=\"cancel()\">Cancel</button>\n</div>");
$templateCache.put("users.html","<div>\n    <div class=\"row\">\n        <div class=\"col-lg-12\">\n            <h1 class=\"page-header\">User</h1>\n        </div>\n        <!-- /.col-lg-12 -->\n    </div>\n    <div>\n\n        <div class=\"row\">\n            <div class=\"col-sm-6\">\n                <button type=\"button\" class=\"btn btn-default btn-inverse btn-sm\" ng-click=\"reload()\">\n                    <span class=\"glyphicon glyphicon-refresh\"></span>\n                </button>\n            </div>\n            <div class=\"col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-2 col-lg-offset-4\">\n\n                <div class=\"input-group\">\n\n                    <input type=\"text\" class=\"form-control input-sm\" ng-model=\"filter.keyword\" placeholder=\"keyword\">\n                    <span class=\"input-group-btn\">\n                      <button class=\"btn btn-default btn-sm\" type=\"button\"\n                              ng-click=\"search()\"><i class=\"glyphicon glyphicon-search\"></i></button>\n                    </span>\n                </div>\n                <!-- /input-group -->\n            </div>\n            <!-- /.col-lg-6 -->\n        </div>\n\n        <table ng-table=\"tableParams\" class=\"table\" style=\"margin-top: 20px\">\n            <tr ng-repeat=\"user in $data\" class=\"text-center\">\n                <td data-title=\"\'#\'\">{{user.id}}</td>\n                <td data-title=\"\'姓名\'\">{{user.name}}</td>\n                <td data-title=\"\'手机\'\">{{user.mobile}}</td>\n                <td data-title=\"\'邮箱\'\">{{user.email}}</td>\n                <td data-title=\"\'住址\'\">{{user.address}}</td>\n                <td data-title=\"\'操作\'\">\n                    <button class=\"btn btn-default btn-sm\" ng-click=\"edit(user)\">编辑</button>\n                </td>\n            </tr>\n        </table>\n    </div>\n</div>");}]);
//# sourceMappingURL=templates.js.map
