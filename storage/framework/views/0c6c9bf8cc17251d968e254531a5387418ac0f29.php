
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
               <h4 class="fs-5 fw-bold mb-0">Child User Location</h4>
               <?php if($errors->any()): ?>
               <div class="alert alert-danger">
                   <ul class="m_error_ul">
                       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="m_error_li" style="color:red;font-weight:bold;"><?php echo e($error); ?></li>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </ul>
               </div>
            <?php endif; ?>
            </div>
            <div class="card-body">
                <iframe id="Frame" width="100%" height="600"  scrolling="no" marginheight="0" marginwidth="0"  frameborder="0" name="myiframe" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo e($location_data->child_user_location_lat); ?>,<?php echo e($location_data->child_user_location_lon); ?>&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>

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
<?php echo $__env->make('Backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\familysafetracker\resources\views/Backend/childuser/child_user_live_location_view.blade.php ENDPATH**/ ?>