angular.module('app', ["firebase"])
	.controller('posts', function ($scope, $firebaseObject, $firebase) {

		var ref = new Firebase("https://lonlott.firebaseio.com/pledges");

		// download the data into a local object
		$scope.data = $firebaseObject(ref);

		$scope.data.$loaded().then(function () {

			$scope.pledges = [];

			for (var pledge in $scope.data) {
				if ($scope.data.hasOwnProperty(pledge) && pledge.substr(0,1) === '-') {
					$scope.pledges.push($scope.data[pledge]);
				}
			}

			// console.log($scope.data);
			//
			// for (var pledge in $scope.data) {
			// 	if ($scope.data.hasOwnProperty(pledge) && $scope.data[pledge] && $scope.data[pledge].timestamp) {
			// 		if (new Date($scope.data[pledge].timestamp).valueOf() < 1440636690000) {
			//
			// 			console.log($scope.data[pledge].email, 'deleted');
			//
			// 			var samplePledge = new Firebase('https://lonlott.firebaseio.com/pledges/' + pledge);
			// 			samplePledge.remove();
			// 		}
			// 	}
			// }
		})

		$scope.sendSupport = function () {

			mixpanel.track("Support Received");

			// ref.remove();

			var name = document.forms["showSupport"]["name"].value,
				email = document.forms["showSupport"]["email"].value,
				message = document.forms["showSupport"]["message"].value;

			if (name == null || name == "") {
				$scope.warning("Please enter your name to continue.");
				return false;
			} else if (name.match(/ /g) && name.match(/ /g).length > 3) {
				$scope.warning("Please input just your first and last name.");
				return false;
			} else if (!email.match(/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/gm)) {
				$scope.warning("Please input a valid email address.");
				return false;
			}


			ref.push({
				name: $('#name').val().toLowerCase(),
				email: $('#email').val().toLowerCase(),
				comment: $('#message').val(),
				timestamp: new Date().toString()
			});

			$scope.name = $('#name').val();

			$('#name').val('');
			$('#email').val('');
			$('#message').val('');

			$scope.submitted = true;

			setTimeout(function () {
				location.hash = 'thanks';
				$('nav')[0].className = 'navbar navbar-default navbar-custom navbar-fixed-top is-fixed';
			},500);

		};


		$scope.warning = function (warnMessage) {

			$('#success').html("<div class='alert alert-danger'>");
			$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append("</button>");
			$('#success > .alert-danger').append("<strong>" + warnMessage);
			$('#success > .alert-danger').append('</div>');

			//clear all fields
			// $('#contactForm').trigger("reset");

		}

	});

function generateRandomUsers(num) {

	var url = 'https://randomuser.me/api';

	if (num) {
		url += '?results=' + num;
	}

	$.ajax({
		url: url,
		dataType: 'json',
		success: function (data) {
			for (var i = 0; i < data.results.length; i++) {
				var user = data.results[i].user;

				if (String(i).charAt(1) === '0') {
					supportQuote(user.name.first + ' ' + user.name.last, user.email);
				} else {
					$('#name')[0].value = user.name.first + ' ' + user.name.last;
					$('#email')[0].value = user.email;

					$('#pledge').click();
				}
			}
		}
	});
};

function removeBadData() {
	var ref = new Firebase("https://lonlott.firebaseio.com/pledges");

	data = $firebaseObject(ref);

}

function supportQuote(name, email) {
	$.ajax({
		url: 'http://api.theysaidso.com/qod.json',
		dataType: 'json',
		success: function (data) {
			$('#name')[0].value = name;
			$('#email')[0].value = email;
			$('#message')[0].value = data.contents.quotes[0].quote;

			$('#pledge').click();
		}
	})
}
