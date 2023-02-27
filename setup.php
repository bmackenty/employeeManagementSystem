<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Employee management system setup</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h3>Welcome to the Employee Management System Setup Wizard</h3>
        <p>This file will setup your employee management system so you can start managing your employees! </p>
        <p>Please carefully read any error messages and follow the suggested steps to fix them</p>
        <!-- =========================================== -->
        <!-- start database_inc.php check                -->
        <!-- =========================================== -->
        <?php
        $filename = 'database_inc.php';
        if (file_exists($filename)) { ?>
            <div class="alert alert-success" role="alert">
                You have the file <strong>database_inc.php</strong>
            </div>
        <?php
            include('database_inc.php');
        } else { ?>
            <div class="alert alert-danger" role="alert">
                Error: You do NOT HAVE the file <strong>database_inc.php</strong>
            </div>
            <ul>
                <li>get the file <a target="_new" href="https://github.com/bmackenty/DesigningSolutionsThroughProgramming/blob/master/database_inc.php">from here</a>
                <li>edit the file as directed</li>
                <li>upload the file to our remote host in Germany</li>
                <li>reload this file</li>
            </ul>
        <?php
            die;
        }
        ?>
        <!-- =========================================== -->
        <!-- end database_inc.php check                 -->
        <!-- =========================================== -->


        <!-- =========================================== -->
        <!-- start database connectivity check           -->
        <!-- =========================================== -->

        <?php
        if (!$connect) { ?>
            <div class="alert alert-danger" role="alert">
                Error: <strong>database_inc.php</strong> is not correctly setup.
            </div>
            <ul>
                <li>get the file <a target="_new" href="https://github.com/bmackenty/DesigningSolutionsThroughProgramming/blob/master/database_inc.php">from here</a>
                <li>edit the file EXACTLY AS directed</li>
                <li>upload the file to our remote host in Germany</li>
                <li>reload this file</li>
            </ul>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                <strong>database_inc.php</strong> is setup successfully.
            </div>
        <?php }
        ?>
        <!-- =========================================== -->
        <!-- end database connectivity check           -->
        <!-- =========================================== -->

        <!-- =========================================== -->
        <!-- start MySQL tables check / creation         -->
        <!-- =========================================== -->

        <?php
        $query_test_employee_table = mysqli_query($connect, "select 1 FROM employees LIMIT 1;");
        if ($query_test_employee_table !== FALSE) { ?>
            <div class="alert alert-success" role="alert">
                You have a <strong>'employee'</strong> table in your database. That's good.
            </div>
        <?php } else {
            $sql_create_employees = "CREATE TABLE employees (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                employee_status TEXT NULL,
                employee_first_name TEXT NULL,
                employee_last_name TEXT NULL,
                employee_email TEXT NULL,
                employee_phone TEXT NULL,
                employee_address TEXT NULL,
                employee_city TEXT NULL,
                employee_division TEXT NULL,
                employee_country TEXT NULL,
                employee_hire_date DATE NULL,
                employee_salary TEXT NULL,
                employee_commission_pct TEXT NULL,
                employee_manager_id TEXT NULL,
                employee_department_id TEXT NULL,
                employee_notes TEXT NULL,
                employee_image TEXT NULL
                )";
            mysqli_query($connect, $sql_create_employees); ?>
            <div class="alert alert-success" role="alert">
                You didn't have a <strong>'employee'</strong> table in your database, but I've created one for you.
            </div>
        <?php
        }
        ?>


        <?php
        $query_test_user_table = mysqli_query($connect, "select 1 FROM users LIMIT 1;");
        if ($query_test_user_table !== FALSE) { ?>
            <div class="alert alert-success" role="alert">
                You have a <strong>'users'</strong> table in your database. That's good.
            </div>

        <?php } else {
            $sql_create_users = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email TEXT NULL,
        role TEXT NULL,
        password TEXT NULL
        )";
            mysqli_query($connect, $sql_create_users); ?>
            <div class="alert alert-success" role="alert">
                You didn't have a <strong>'users'</strong> table in your database, but I've created one for you.
            </div>



        <?php
        }
        ?>


        <?php
        $query_test_admin_user = mysqli_query($connect, "SELECT * FROM users WHERE role ='admin';");
        if (mysqli_num_rows($query_test_admin_user) > 0) {
        ?>
            <div class="alert alert-success" role="alert">
                You have an <strong>'admin'</strong> user in your users table. That's good.
            </div>

        <?php

        } else {
            $hashed_password = password_hash('employee_admin', PASSWORD_DEFAULT);
            $query_create_admin_user = mysqli_query($connect, "INSERT INTO users (email, role, password) VALUES ('admin@admin.com', 'admin', '$hashed_password');");


        ?>
            <div class="alert alert-success" role="alert">
                You do not have an admin user in your <strong>'users'</strong> table in your database. That's bad. I've created an admin user with default password.
            </div>
            <a class="btn btn-success" href="index.php">You are all setup - go back to the employee management system</a>

        <?php }
        ?>




    </div> <!-- closing container div -->
    <?php
    include('store_footer.php');
    ?>
    <!-- please don't touch anything below this line -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>