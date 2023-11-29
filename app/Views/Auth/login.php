
<div class="container-fluid ">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
           
            <div class="card card-primary o-hidden border-0 shadow-lg my-5">
            <p class="h5 font-weight-bold text-center mt-5"> <i class="fas fa-shopping-bag"></i> &nbsp; APP Barang</p>
            <h4 class="font-weight-bold text-center mt-3"> Masuk Untuk memulai</h4>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <h1 class="h4 text-gray-900 mb-4">Login Admin</h1> -->
                                    <?= session('message');  ?>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('/login'); ?> ">
                                    <div class="form-group">
                                        <input type="text" placeholder="Username"class="form-control form-control-user" id="username" name="username" >
                                       
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password"class="form-control form-control-user" id="password" name="password">
                                     
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
