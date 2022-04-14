
<?php $__env->startSection('data'); ?>
<style>

.table td, .table th {
    padding: 4px !important;
    color:black;
  border:1px solid rgb(226, 223, 223);

}


fieldset.scheduler-border {
  border: 2px groove #ddd !important;
  padding: 0 1.4em !important;
  box-shadow: 0px 0px 0px 0px #000;
  margin-top:16px;
}

legend.scheduler-border {
  font-size: 1.2em !important;
  font-weight: bold !important;
  text-align: left !important;
  width: auto;
  padding: 0 10px;
  border-bottom: none;
  margin-top: -15px;
  background-color: white;
  color: black;
}




.m_error_ul .m_error_li:before {
  content: '✓ ';
}





::-webkit-input-placeholder {
   color: red;
   font-weight: bold;
}
::-webkit-select-placeholder {
   color: red;
   font-weight: bold;
}

:-moz-placeholder { /* Firefox 18- */
   color: red;  
   font-weight: bold;
}

::-moz-placeholder {  /* Firefox 19+ */
   color: red;  
   font-weight: bold;
}

:-ms-input-placeholder {  
   color: red;  
   font-weight: bold;
}
.bold-option{
    font-weight: bold;
}

.card-header {
  padding: .3rem 1.6rem !important;
}
</style>

    
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
               

                <div class="card">
                    <div class="card-block">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Add New System User..</legend>
                  
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="m_error_ul">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="m_error_li" style="color:red;font-weight:bold;"><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                            

                        <form class="row g-3" action="<?php echo e(route('admin.user.save.post')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-4">
                              
                              <input type="text" name="number" placeholder="Enter User Number " class="form-control form-control-sm" id="inputEmail4">
                            </div>
                            <div class="col-md-4">

                              <input type="text" name="name" placeholder="Enter User Name" class="form-control form-control-sm" id="inputPassword4">
                            </div>
                            
                            <div class="col-md-4">
                            
                                <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter User Email" id="inputCity">
                              </div>

                            <div class="col-md-4">

                                <input type="password" name="password" placeholder="Enter User Password" class="form-control form-control-sm" id="inputPassword4">
                              </div>
                            <div class="col-md-4">

                                <input type="password" name="password_confirmation" placeholder="Enter User Confirm Password" class="form-control form-control-sm" id="inputPassword4">
                              </div>
                              <div class="col-md-4">
                             
                                <select name="user_type" id="" class="form-control form-control-sm bold-option">
                                    <option value="" class="bold-option">Select User Type</option>
                                    <option value="1" class="bold-option">Admin User</option>
                                    <option value="2" class="bold-option">Parent User</option>
                                </select>
                              </div>
                            
                            
                           
  
                            <div class="col-5">
                              
                            </div>
                            <div class="col-7">
                              <button type="submit" class="btn btn-success">Add New User</button>
                            </div>
                            &nbsp;  &nbsp;
                          </form>


                </fieldset>
            </div>




            



            </div>




            



            </div>
        </div>



        &nbsp;



        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
               <h4 class="fs-5 fw-bold mb-0">All User List</h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead style="background:#c8c8c8;">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $n=1;
                        ?>
                        <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_user_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($n++); ?></td>
                            <td><?php echo e($all_user_list->created_at); ?></td>
                            <td><?php echo e($all_user_list->number); ?></td>
                            <td><?php echo e($all_user_list->name); ?></td>
                            <td>
                              <?php if($all_user_list->user_type==1): ?>
                              <label class="badge bg-success">Admin User</label>
                              <?php else: ?>
                              <label class="badge bg-info">Parent User</label>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="" title="Active Image Slider"><i class="fa fa-thumbs-up btn btn-success btn-xs"></i></a>

                        <a href="" title="Deactive Image Slider"><i class="fa fa-thumbs-down btn btn-danger btn-xs"></i></a>

                
                            </td>
                          
                        </tr>
                                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
            
            </div>

        </div>




    </div>

</div>




    
<footer class="bg-white rounded shadow">
<div class="row">
<div class="col-12">
    <p class="mb-0 text-center text-lg-start">© 2022-2023 Md. Jahidul Islam Noman...</p>
</div>
</div>
</footer>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\familysafetracker\resources\views/Backend/user/add_new_user.blade.php ENDPATH**/ ?>