
<div class="row">
    <div class="col-sm-12">


        
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
                    <button type="submit" class="btn btn-grd-success">Save System User</button>
                </div>
                </div>
            </form>
        </fieldset>
    </div>
    </div>
    

    </div>
    </div>

