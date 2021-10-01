# Renal Project
THE RENAL PROJECT is one of the India’s top company that provides the solution to dialysis patients. We are developing micro centers to reach dialysis patients even from the villages where hospitals are not present. Each microcenter consists of staffs who assists patients to make the dialysis process successful. We are growing exponentially to serve people and support human lives.
## Problem statement:
To develop a web application that will be helpful for the staffs, admins and doctors to track the details about the patients and to provide dialysis

### Workflow:
![Workflow](https://i.imgur.com/oJKoUPO.png "Workflow")
### Description:
Required Features 
- Develop a login page where the doctors, staff and admin can be able to login.
- Admin can able to create branches, doctors and admins. Inside the branch, staffs will be created. (Staffs are limited to branches where admins and doctors are not)
- Staffs can able to register the patients and provide dialysis. (There is no patient login)
- Doctors can view the registered patients graph. The graph should describe that the total number of patients registered per day and it should dynamically vary according to the registration done by staffs. 

### Installation
```bash
	git clone https://github.com/Shaileshsainee123/renal.git
	cd renal
	npm install
	composer install
	cp .env.example .env
	php artisan key:generate
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	php artisan serve
```
###### Admin Login
	Email: admin@renal.test
	Password: adminpass
### Screenshot
![](https://i.imgur.com/ctufEHH.png)

&copy; [Shailesh](https://github.com/Shaileshsainee123 "Shailesh") 