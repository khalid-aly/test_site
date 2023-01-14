<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <title>Hello, world!</title>

    <style>
        body{background-color: rgb(255, 246, 235);}
        .dash{font-size: 32px;
              font-weight: bold;
              text-align: center;}
    </style>
</head>
<body>

<br>
<div class="dash">
<p>Dashboard</p>
</div>
<?php

include ('model.php');
$userObject=new users();
if (isset($_GET['do'])) {
    $do=$_GET['do'];
}else{
    $do='select';
}

if($do == 'select'){
    $users=$userObject->all();
    ?>
    <div class="container mt-5 pt-5">
        <a href="dashboard.php?do=add" class="btn btn-primary mb-5">Add New</a>
        <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Email</th>
            <th>User Group</th>
            <th>User State</th>
            <th>Registration Date</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user){ ?>
        <tr>
            <td><?php echo  $user['ID']; ?></td>
            <td><?php echo  $user['name']; ?></td>
            <td><?php echo  $user['email']; ?></td>
            <td><?php echo  $user['user_group']; ?></td>
            <td><?php echo  $user['user_state']; ?></td>
            <td><?php echo  $user['registration_date']; ?></td>
            <td>
<a href="dashboard.php?do=single&id=<?php echo $user['ID']; ?>" class="btn btn-primary">View</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th style="min-width: 200px;">Email</th>
            <th>User Group</th>
            <th>User State</th>
            <th>Registration Date</th>
            <th>Operations</th>
        </tr>
        </tfoot>
    </table>
    </div>
<?php
}else if($do == 'single'){
    $id=$_GET['id'];
    $user=$userObject->find($id);
    ?>
    <div class="container mt-5 pt-5">
        <h1 class="text-center">This is the view of <?php echo $user['name']; ?></h1>
        <div class="row">
            <div class="col-6">
                <p><strong>Email : </strong> <?php echo $user['email']; ?></p>
                <p><strong>Registration Date : </strong> <?php echo $user['registration_date']; ?></p>

            </div>
            <div class="col-6">
                <p><strong>State : </strong> <?php echo $user['user_state']; ?></p>
                <p><strong>Role : </strong> <?php echo $user['user_group']; ?></p>
            </div>
        </div>

    </div>
<?php
}else if($do == 'add'){
    ?>
    <div class="container mt-5 pt-5">
        <form class="row g-3 needs-validation" action="users.php?do=insert" method="post" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">User Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="userName" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a valid username.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a valid email at form of example@gmail.com.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Password</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control" name="password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please choose a valid password.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">User Group</label>
                <select class="form-select" id="validationCustom04" required name="userGroup">
                    <option selected disabled value="">Choose...</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>editor</option>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a role.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">User State</label>
                <select class="form-select" id="validationCustom04" required name="userState">
                    <option selected disabled value="">Choose...</option>
                    <option>pending</option>
                    <option>active</option>
                    <option>banned</option>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a valid password.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
<?php
}else if ($do == 'insert'){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_name=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
    $user_state=$_POST['userState'];
    $user_group=$_POST['userGroup'];
    if(empty($user_name)){

       $errors[]= 'user name can not be empty';
    }
    $stmt=$conn->prepare("SELECT * FROM users WHERE user_name='$user_name'");
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count > 0){
        $errors[]='this user name is already registered';
    }
    if(empty($email)){
        $errors[]= 'email  can not be empty';
    }
    if(empty($password)){
        $errors[]= 'password can not be empty';
    }
    if(isset($errors)){
        foreach ($errors as $error){
            echo  '<div class="alert alert-danger">' . $error . '</div>';
        }
    }else{
        // insert data into database
        $userObject->insert(
                '(userName,email,password,userState,userGroup) VALUES (?,?,?,?,?)',
                    array($user_name,$email,$hashedPassword,$user_state,$user_group)
        );
        echo  '<div class="alert alert-success">User Added Successfully</div>';

    }
    }else{
        header('Location: users.php');
    }
}else if($do == 'edit'){
    echo 'welcome to edit page';
}else if ($do == 'update'){
    echo 'welcome to update page';
}else if($do == 'delete'){
    echo 'welcome to delete page';
}else{
    echo 'you are not authorized';
}

?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>