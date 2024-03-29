<?php
if(isset($_GET['action'], $_GET['id'])) {
    if($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        User::delete($id);
        header("Location:users.php");
    }
}

if(isset(
        $_POST['username'],
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['re_password'])) {

    $user = new User();
    $user->setUsername($_POST['username']);
    $user->setName($_POST['name']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);

    if(isset($_POST['id'])) {
        //update
        $id = $_POST['id'];
        $user->setId($id);

        $user->update();
    } else {
        //insert
        $user->insert();
    }


}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Students</h1>
                <div class="page-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-new-user">
                        <i class="glyphicon glyphicon-plus"></i> Add New User
                    </button>
                    <br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="users-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody id="users-body">

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<!-- Modals -->
<!--add new user-->
<div class="modal fade" id="add-new-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <lable>Username</lable>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <lable>Email</lable>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <lable>Full Name</lable>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <lable>Password</lable>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <lable>Re-Password</lable>
                                <input type="password" class="form-control" name="re_password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
