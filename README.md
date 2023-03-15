# client_001

How to set up the server?

** SMTP/Email SET UP **
- Host: smtp.gmail.com 
- Port: 587
- Email: mceslicam@gmail.com
- Password: ooswdnqskfcujmqw

** Database set up ** (Note: If your DB is already exist, please delete from your PHPMYADMIN)
- Host: localhost
- User: Root
- Password: 
- Db name: client_db_001


----------------------------------------------------------------------------------------
Changelogs (03-16-2023)
- Login (Admin, Student and Guidance)
- OTP
- User account creation
- Sending Email for account and OTP
- First to Fourth Year Exam Upload (no function yet)


Changelogs (02-23-2023)
- Change Counselor Services to Test Services
- Add site installation (web & db config)
- Add registration account for admin
- improved UIs (css, js, html)
- Re-organize folder for installation and app
- Create db configuration (including .env file)

----------------------------------------------------------------------------------------
Bootstrap template: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

Programmer: Denver | Project created: feb-2023

----------------------------------------------------------------------------------------
How to install your website?
1. Download the client_001(zip file)

![image](https://user-images.githubusercontent.com/20502334/219092211-6f9fd400-f438-432c-bc8f-8ad504952c4b.png)

2. Download and Install xampp apache (https://www.apachefriends.org/)
3. Open your Xampp Control panel then start the Apache

![image](https://user-images.githubusercontent.com/20502334/219094334-7742a1ac-ed27-4889-9e56-cac530671694.png)

4. After installing the xampp, open the htdocs folder (C:\xampp\htdocs)
5. Extract the client_001-master.zip to C:\xampp\htdocs directory

![image](https://user-images.githubusercontent.com/20502334/219094908-e87d0ab5-2950-4499-bf8f-6f628c8781e6.png)

6. Done! You can now view your website (http://localhost/index).
* Login:
http://localhost/client_001/login

* Send OTP:
http://localhost/client_001/send_otp

* Change/Update default password:
http://localhost/client_001/change_password

* Dashboard:
http://localhost/client_001/dashboard

----------------------------------------------------------------------------------------
Note: Back-end not yet implemented.
----------------------------------------------------------------------------------------
