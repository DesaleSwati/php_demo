<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Codeigniter 4 Crud Application</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Codeigniter 4 Crud Application</h2>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">User List</div>
                    <div class="col text-right">
                        <a href=<?php echo base_url('/user/add'); ?>>Add User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php

                        if(!empty($user_data))
                        {
                            foreach($user_data as $user)
                            {
                                echo '
                                <tr>
                                    <td>'.$user["id"].'</td>
                                    <td>'.$user["fname"].'</td>
                                    <td>'.$user["lname"].'</td>
                                    <td>'.$user["email"].'</td>
                                    <td>'.$user["mobile_no"].'</td>
                                    <td><a href='.base_url("/user/edit/").$user["id"].'>Edit</a></td>';
                                    if($user["is_deleted"] == 0){
                                        echo '<td><a href='.base_url("/user/delete/").$user["id"].'>Delete</a></td>';
                                    }else{
                                        echo '<td><a href='.base_url("/user/restore/").$user["id"].'>Restore</a></td>';
                                    }
                                echo '</tr>';
                            }
                        }else{
                            echo '
                            <tr>
                                <td colspan=7 style="text-align: center;">No records found.</td>
                            </tr>';
                        }

                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    // if($pagination_link)
                    // {
                    //     $pagination_link->setPath('crud');

                    //     echo $pagination_link->links();
                    // }
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
