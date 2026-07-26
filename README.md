# Student Registration Application

CP476-B | Assignment 2

Tiara Bhakat, Yusra Hassan, Jordan Franschman, Zach Pereira, Qichen Hao

## About

This app has two pages. On the Register page a student fills in a form and the record is saved to a MySQL database. On the Student Directory page the saved records are read back and shown in a table. It is built with React, PHP and MySQL, and runs on XAMPP.

## Files

    StudentRegistrationApplication/
      backend/
        database.sql
        students.sql
        register.php
        students.php
      frontend/
        index.html
        src/  main.jsx  App.jsx  Header.jsx  Footer.jsx
              StudentForm.jsx  StudentList.jsx  style.css

## How to run it

1. Install XAMPP, open the Control Panel and start Apache and MySQL. Both should turn green.

2. Put the project folder inside htdocs. The folder has to be named StudentRegistrationApplication, because that name is part of the address the app uses.

        Windows:  C:\xampp\htdocs\
        macOS:    /Applications/XAMPP/xamppfiles/htdocs/

3. Open http://localhost/phpmyadmin and go to the SQL tab. Run database.sql first, then students.sql. This creates the college database and adds four sample students.

4. Check that the backend works by opening this address. It should show a line of text with the four students in it.

        http://localhost/StudentRegistrationApplication/backend/students.php

5. Start the frontend. Node.js needs to be installed first.

        cd frontend
        npm install
        npm run dev

   Then open http://localhost:5173 in a browser.

## Notes

If the project is kept somewhere else, or Apache is not on port 80, the address at the top of StudentForm.jsx and StudentList.jsx needs to be changed to match.

If MySQL will not start, another MySQL install is probably already using the same port. Stopping it and starting MySQL again from the Control Panel fixes it.
