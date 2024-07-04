<?php
$id = !empty($user->id) ? $user->id : '';
$fname = !empty($user->fname) ? $user->fname : '';
$lname = !empty($user->lname) ? $user->lname : '';
$mobile_no = !empty($user->mobile_no) ? $user->mobile_no : '';
?>
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
                    <div class="col">Edit User</div>
                </div>
            </div>
            <form action="<?php echo base_url('/user/edit/').$id; ?>" id="user_form" data-parsley-validate="" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="" >

                <div class="card-body">
                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-6">
                            <label>First Name <span class="required-astrick">*</span></label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Enter first name" data-parsley-minlength="2" data-parsley-minlength="100" required />
                            <ul class="parsley-errors-list fname"></ul>
                            <small class="text-danger"><?= isset($validation['fname']) ?  $validation['fname'] :null ; ?></small>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Last Name <span class="required-astrick">*</span></label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" placeholder="Enter last name" data-parsley-minlength="2" data-parsley-minlength="100" required />
                            <ul class="parsley-errors-list lname"></ul>
                            <small class="text-danger"><?= isset($validation['lname']) ?  $validation['lname'] :null ; ?></small>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-6">
                            <label>Mobile No. <span class="required-astrick">*</span></label>
                            <input class="form-control" type="text" name="mobile_no" value="<?php echo $mobile_no; ?>" placeholder="Enter mobile no" data-parsley-minlength="2" data-parsley-minlength="100" required />
                            <ul class="parsley-errors-list mobile_no"></ul>
                            <small class="text-danger"><?= isset($validation['mobile_no']) ?  $validation['mobile_no'] :null ; ?></small>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
</html>
