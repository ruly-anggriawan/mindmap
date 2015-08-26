<!DOCTYPE html>
<html ng-app="mindMapApp" lang="en">
<head>
<title>Mind Map</title>
<!-- Copyright 1998-2015 by Northwoods Software Corporation. -->
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
 <script src="vendor/angular/angular.min.js"></script>

<script src="vendor/gojs/release/go.js"></script>
<script src="vendor/gojs/goinit.js"></script>


</head>
<body ng-controller="MindMapCtrl" id="MindMapCtrl">


<div id="sample">

  <div id="myDiagram" style="border: solid 1px blue; width:100%; height:300px;"></div>


  <button id="SaveButton" onclick="save()">Save(mindmap to json)</button>
  <button onclick="load()">Load (json to mindmap)</button>
  <button onclick="layoutAll()">Layout</button>



  <form action="<?php echo url('mindmap') ?>" method="POST">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <!--input type="text" name="mySavedModel" value="{{mySavedModel}}"-->
    <button class="btn btn-default">SaveToDB</button>

    <textarea id="mySavedModel" json-text ng-model="mindMapNode" style="width:100%;height:400px">


    </textarea>


  </form>


</div>
</body>
</html>


<script type="text/javascript">
  var mindMapApp = angular.module('mindMapApp', []);

  angular.module('mindMapApp').directive('jsonText', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attr, ngModel) {
          function into(input) {
            return JSON.parse(input);
          }
          function out(data) {
            return JSON.stringify(data);
          }
          ngModel.$parsers.push(into);
          ngModel.$formatters.push(out);

        }
    };
});


  mindMapApp.controller('MindMapCtrl', ['$scope', '$http', function($scope, $http) {

    $scope.myDiagram = [];

    $scope.mindMapNode = {
                            "class": "go.TreeModel",
                            "nodeDataArray": [
                                    {"key":0, "text":"Mind Map", "loc":"0 0"},
                                    {"key":1, "parent":0, "text":"Getting more time", "brush":"skyblue", "dir":"right", "loc":"77 -22"},
                                    {"key":11, "parent":1, "text":"Wake up early", "brush":"skyblue", "dir":"right", "loc":"200 -48"},
                                    {"key":12, "parent":1, "text":"Delegate", "brush":"skyblue", "dir":"right", "loc":"200 -22"},
                                    {"key":13, "parent":1, "text":"Simplify", "brush":"skyblue", "dir":"right", "loc":"200 4"},
                                    {"key":2, "parent":0, "text":"More effective use", "brush":"darkseagreen", "dir":"right", "loc":"77 43"},
                                    {"key":21, "parent":2, "text":"Planning", "brush":"darkseagreen", "dir":"right", "loc":"203 30"},
                                    {"key":211, "parent":21, "text":"Priorities", "brush":"darkseagreen", "dir":"right", "loc":"274 17"},
                                    {"key":212, "parent":21, "text":"Ways to focus", "brush":"darkseagreen", "dir":"right", "loc":"274 43"},
                                    {"key":22, "parent":2, "text":"Goals", "brush":"darkseagreen", "dir":"right", "loc":"203 56"},
                                    {"key":3, "parent":0, "text":"Time wasting", "brush":"palevioletred", "dir":"left", "loc":"-20 -31.75"},
                                    {"key":31, "parent":3, "text":"Too many meetings", "brush":"palevioletred", "dir":"left", "loc":"-117 -64.25"},
                                    {"key":32, "parent":3, "text":"Too much time spent on details", "brush":"palevioletred", "dir":"left", "loc":"-117 -25.25"},
                                    {"key":33, "parent":3, "text":"Message fatigue", "brush":"palevioletred", "dir":"left", "loc":"-117 0.75"},
                                    {"key":331, "parent":31, "text":"Check messages less", "brush":"palevioletred", "dir":"left", "loc":"-251 -77.25"},
                                    {"key":332, "parent":31, "text":"Message filters", "brush":"palevioletred", "dir":"left", "loc":"-251 -51.25"},
                                    {"key":4, "parent":0, "text":"Key issues", "brush":"coral", "dir":"left", "loc":"-20 52.75"},
                                    {"key":41, "parent":4, "text":"Methods", "brush":"coral", "dir":"left", "loc":"-103 26.75"},
                                    {"key":42, "parent":4, "text":"Deadlines", "brush":"coral", "dir":"left", "loc":"-103 52.75"},
                                    {"key":43, "parent":4, "text":"Checkpoints", "brush":"coral", "dir":"left", "loc":"-103 78.75"}
                                  ]
                          };

    $scope.initMindMap = function(){
        console.log("init angular");
        myDiagram.model = go.Model.fromJson($scope.mindMapNode);
        $scope.myDiagram = myDiagram;
        console.log("$scope.myDiagram");
        console.log($scope.myDiagram);


    };

    $scope.$watch("mindMapNode", function(newValue, oldValue) {
      myDiagram.model = go.Model.fromJson($scope.mindMapNode);
      $scope.myDiagram = myDiagram;
  });

  $scope.$watch("mindMapNode", function(newValue, oldValue) {
    myDiagram.model = go.Model.fromJson($scope.mindMapNode);
    $scope.myDiagram = myDiagram;
});








  }]);

  $(function(){

    init();
    angular.element('#MindMapCtrl').scope().initMindMap();
  });
</script>
