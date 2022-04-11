@extends('Backend.master')
@section('data')
<style>

.table td, .table th {
    padding: 4px;
    color:black;

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

.btn{
    padding: 4px 8px !important;
}
.form-control{
    padding: .3rem 0.25rem !important;
}
select.form-control:not([size]):not([multiple]){
    height: auto !important;
}


.m_error_ul .m_error_li:before {
  content: '✓ ';
}


a.dt-button{
background-color: #01a9ac;
border-color: #01a9ac;
border-radius: 2px;
color: #fff;
background-image: none;
font-size: 11px;
}

button.dt-button:hover:not(.disabled),
div.dt-button:hover:not(.disabled),
a.dt-button:hover:not(.disabled) {
    background-image: none;
    background-color: #01c2c5;
    border-color: #01a9ac
}







button.dt-button,
div.dt-button,
a.dt-button,
button.dt-button:focus:not(.disabled),
div.dt-button:focus:not(.disabled),
a.dt-button:focus:not(.disabled),
button.dt-button:active:not(.disabled),
button.dt-button.active:not(.disabled),
div.dt-button:active:not(.disabled),
div.dt-button.active:not(.disabled),
a.dt-button:active:not(.disabled),
a.dt-button.active:not(.disabled) {
    background-color: #01a9ac;
    border-color: #01a9ac;
    border-radius: 2px;
    color: #fff;
    font-size: 11px
}

::-webkit-input-placeholder {
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
</style>

    
<div class="row">
    <div class="col-12 col-xxl-6 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
               

                <div class="card">
                    <div class="card-block">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Add New System User..</legend>
                  
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m_error_ul">
                                    @foreach ($errors->all() as $error)
                                        <li class="m_error_li" style="color:red;font-weight:bold;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form id="main" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" name="name" id="name" placeholder="Enter System User Name (***)">
                            </div>
        
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" name="number" id="number" placeholder="Enter System User Number (***)">
                            </div>
        
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" name="email" id="email" placeholder="Enter System User Email (Optional)">
                            </div>
                            <div class="col-sm-3">
                                <div style="padding:4px;">
                                    &nbsp;
                                    <input type="radio" id="html" checked name="is_2fa_verify" style="color:Blue;Font-weight:bold;" value="0">
                                    <span for="Yes" class="custom_radio" style="color:Blue;Font-weight:bold;">2FA Verify On</span>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="css" name="is_2fa_verify" style="color:red;Font-weight:bold;" value="1">
                                    <span for="No" class="custom_radio" style="color:red;Font-weight:bold;" >2FA Verify Off</span><br>
                                </div>
                            </div>
                
                
                        </div>
        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="password" class="form-control" autocomplete="off" name="password" id="password" placeholder="Enter System User Password (***)">
                            </div>
        
                            <div class="col-sm-3">
                                <input type="password" class="form-control" autocomplete="off" name="password_confirmation" id="password_confirmation" placeholder="Confirm User Password (***)">
                            </div>
        
                            <div class="col-sm-3">
                               <select name="user_type" id="user_type" class="form-control">
                                   <option value="">Select User Type </option>
                                   <option value="0">Admin User</option>
                                   <option value="2">Forward User </option>
                                   <option value="1">Call Center User</option>
                               </select>
                            </div>
                           
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success">Save System User</button>
                        </div>
                        </div>
                    </form>
                </fieldset>
            </div>
            </div>
            



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





@endsection