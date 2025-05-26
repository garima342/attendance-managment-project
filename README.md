# attendance-managment-project
Full-stack online attendance management system using React, PHP, MySQL

•	Attendance Management System
This is a PHP-based Attendance Management System built using HTML, CSS, JavaScript, and MySQL for the database. The project is designed to help teachers mark attendance, generate reports, and manage students efficiently through a dashboard system.

•	Technologies Used
- HTML, CSS, JavaScript
- PHP (Server-side scripting)
- MySQL (Database)
- XAMPP (Local server)
- phpMyAdmin (Database management)

•	Project Structure
- `head2.html` - Homepage for the system
- `home.html` - It is the main page of the teacher’s dashboard 
- `demo.html` - Main page for admin’s dashboard
- `project/` - Contains all the files for execution of the project


Local Setup Instructions

1. Requirements
- XAMPP 
- A web browser (e.g., Chrome, Firefox)

2. Steps to Run Locally
1. Download and Install XAMPP if you haven’t already.
2. Start Apache and MySQL using the XAMPP Control Panel.
3. Place the project folder inside the `htdocs` directory of your XAMPP installation.
4. **Open phpMyAdmin** by visiting:
http://localhost/phpmyadmin
5. Create a new database named `attendancesystem`.
6. Import the database:
- Click on the database name.
- Use the Import tab to upload the `attendancesystem.sql` file provided in the `database/` folder.
7. Run the project by visiting:
http://localhost/project/head2.html (main page of the project)


Default Login Credentials (For Testing)
- Admin
  - Username: `banasthali`
  - Password: `admin123`
- Teacher
  - Username: `pooja`
  - Password: `pooja123`

Features
- Teacher, Admin Dashboards
- Mark attendance by subject and date
- Generate student-specific reports
- Responsive UI with animations
- Filter attendance by teacher and subject
- Login system for different roles
Notes
- The project was developed for academic purposes.
- The system currently runs on a local environment and is not deployed on GitHub or a live server.

License
This project is for educational purposes only.
