  <!-- login-area start -->
  <div class="register-area ptb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="<?php echo base_url('register/pro_reg'); ?>" method="post"> 

                                        <input type="text" name="full_name" placeholder="Nama Lengkap">
                                        <input type="text" name="email" placeholder="Email">
                                        <input type="text" name="telp" placeholder="No Telp">
                                        <input type="text" name="alamat" placeholder="Alamat"> 
                                        <input type="text" name="username" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">

                                        <div class="button-box">
                                            
                                            <button type="submit" class="default-btn floatright">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login-area end -->