angular.module('app', ["firebase"])
	.controller('posts', function ($scope, $firebaseObject) {

		var ref = new Firebase("https://lonlott.firebaseio.com/pledges");

		// download the data into a local object
		$scope.data = $firebaseObject(ref);

		$scope.sendSupport = function () {

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
			}else if (!email.match(/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/gm)) {
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
