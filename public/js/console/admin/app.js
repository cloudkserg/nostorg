(function() {
  this.app = angular.module('app', ['templates', 'ngResource', 'ui.router', 'ui.bootstrap', 'ngTable']);

  this.app.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
    $urlRouterProvider.otherwise("/dashboard");
    $locationProvider.html5Mode(true);
    return $stateProvider.state('dashboard', {
      url: "/dashboard",
      templateUrl: "dashboard.html",
      controller: 'DashboardController'
    }).state('general', {
      abstract: true,
      template: '<ui-view>'
    }).state('general.users', {
      url: "/users",
      templateUrl: "users.html",
      controller: 'UserController'
    }).state('general.orders', {
      url: "/orders",
      templateUrl: "orders.html",
      controller: 'OrderController'
    });
  });

}).call(this);

(function() {
  app.controller('DashboardController', function($scope) {
    return $scope.message = 'hello world!';
  });

}).call(this);

(function() {
  app.controller('MenuController', function($scope) {
    return $scope.menus = [
      {
        title: 'MAIN NAVIGATION',
        header: true
      }, {
        title: 'Dashboard',
        state: 'dashboard',
        icon: 'dashboard',
        menus: []
      }, {
        title: 'General',
        icon: 'cloud',
        menus: [
          {
            title: 'User',
            icon: 'circle-o',
            state: 'general.users'
          }, {
            title: 'Order',
            icon: 'circle-o',
            state: 'general.orders'
          }
        ]
      }
    ];
  });

}).call(this);

(function() {
  app.controller('OrderController', function($scope, ngTableParams, Order, $uibModal) {
    $scope.filter = {
      _: ''
    };
    $scope.edit = function(order) {
      return $uibModal.open({
        templateUrl: 'order-edit-modal.html',
        controller: 'OrderEditModalController',
        size: 'lg',
        resolve: {
          order: function() {
            return order;
          },
          readonly: false
        }
      });
    };
    $scope.reload = function() {
      return $scope.tableParams.reload();
    };
    $scope.defaultData = [
      {
        id: 1001,
        name: 'Test1',
        mobile: '1234561',
        email: 'test1@example.com',
        address: 'Shanghai'
      }, {
        id: 1002,
        name: 'Test2',
        mobile: '1234562',
        email: 'test2@example.com',
        address: 'Beijing'
      }, {
        id: 1003,
        name: 'Test3',
        mobile: '1234563',
        email: 'test2@example.com',
        address: 'Chengdu'
      }
    ];
    return $scope.tableParams = new ngTableParams({
      page: 1,
      count: 25,
      filter: $scope.filter
    }, {
      total: 0,
      getData: function($defer, params) {
        var data;
        data = {
          filter: params.filter(),
          sorting: params.sorting(),
          count: params.count(),
          page: params.page(),
          total: true,
          _: (new Date).getTime()
        };
        Order.get(data).$promise.then(function(result) {
          return $defer.resolve(result.data);
        }, function() {
          return $defer.resolve($scope.defaultData);
        });
        return null;
      }
    });
  });

}).call(this);

(function() {
  app.controller('UserController', function($scope, ngTableParams, User, $uibModal) {
    $scope.filter = {
      _: ''
    };
    $scope.edit = function(user) {
      return $uibModal.open({
        templateUrl: 'user-edit-modal.html',
        controller: 'UserEditModalController',
        size: 'lg',
        resolve: {
          user: function() {
            return user;
          },
          readonly: false
        }
      });
    };
    $scope.reload = function() {
      return $scope.tableParams.reload();
    };
    $scope.defaultData = [
      {
        id: 1001,
        name: 'Test1',
        mobile: '1234561',
        email: 'test1@example.com',
        address: 'Shanghai'
      }, {
        id: 1002,
        name: 'Test2',
        mobile: '1234562',
        email: 'test2@example.com',
        address: 'Beijing'
      }, {
        id: 1003,
        name: 'Test3',
        mobile: '1234563',
        email: 'test2@example.com',
        address: 'Chengdu'
      }
    ];
    return $scope.tableParams = new ngTableParams({
      page: 1,
      count: 25,
      filter: $scope.filter
    }, {
      total: 0,
      getData: function($defer, params) {
        var data;
        data = {
          filter: params.filter(),
          sorting: params.sorting(),
          count: params.count(),
          page: params.page(),
          total: true,
          _: (new Date).getTime()
        };
        User.get(data).$promise.then(function(result) {
          return $defer.resolve(result.data);
        }, function() {
          return $defer.resolve($scope.defaultData);
        });
        return null;
      }
    });
  });

}).call(this);

(function() {
  app.controller('UserEditModalController', function($scope, $modalInstance, user, readonly, User) {
    $scope.user = user;
    $scope.readonly = readonly;
    $scope.ok = function() {
      User.update(user).$promise.then(function(result) {
        return console.log(result);
      });
      return $modalInstance.close($scope.user);
    };
    return $scope.cancel = function() {
      return $modalInstance.close();
    };
  });

}).call(this);

(function() {
  app.factory('Order', function($resource) {
    return $resource('/api/admin/orders/:id', {}, {
      update: {
        method: 'PUT',
        params: {
          id: '@id'
        }
      }
    });
  });

}).call(this);

(function() {
  app.factory('User', function($resource) {
    return $resource('/api/admin/users/:id', {}, {
      update: {
        method: 'PUT',
        params: {
          id: '@id'
        }
      }
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map
