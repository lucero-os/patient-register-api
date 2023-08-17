Laravel 8 API for patient registration

Once repo is pulled, go to terminal and run `make setup` standing in the project root. The project will be installed and initialized.
Mysql refuses connection to app, so functionalities are limited, but the idea is to display the structure of my solution.

Endpoint: POST localhost/api/patient with body:
{
	"name": "Test",
	"email": "test@gmail.com",
	"phone": 1122334455,
    "photo": *image*
}

Accepts header "Accept-Language" to set response language (Only en, es & pt available)

Attached class diagram (patient-register-diagram.png) and recommended solution for Notification Management (recommendedNotificationService.png)