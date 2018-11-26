/***
 * Adapted by Carlos Bazilio (@carlosbazilio) from ...
 * Excerpted from "Seven Web Frameworks in Seven Weeks",
 * published by The Pragmatic Bookshelf.
 * Copyrights apply to this code. It may not be used to create training material, 
 * courses, books, articles, and the like. Contact us if you are in doubt.
 * We make no guarantees that this code is fit for any purpose. 
 * Visit http://www.pragmaticprogrammer.com/titles/7web for more book information.
***/
var app = angular.module("BasicApp", []); // (1)

app.service("greeter", function() { // (2)
  this.name = "";
  this.greeting = function() {
    return (this.name) ? ("Hello, " + this.name + "!") : "Hello Anônimo";
  };
});

app.service("liker", function() { // (2)
  this.thing = "";
  this.things = [];
  this.liking = function(event = null) {
  	if (((event == null) || (event.keyCode == 13)) &&
  		(this.thing.length > 0) && 
  		(this.things.indexOf(this.thing) == -1)) {
  		this.things.push(this.thing);
      this.thing = "";
  	}
    return this.things;
  };
  this.disliking = function(event) {
    if (event != null) {
      this.things = this.things.filter(x => x != event.currentTarget.innerText);
    }
    return this.things;
  };
});

app.controller("BasicController", function($scope, greeter, liker) { // (3)
  $scope.greeter = greeter;
  $scope.liker = liker;
});
