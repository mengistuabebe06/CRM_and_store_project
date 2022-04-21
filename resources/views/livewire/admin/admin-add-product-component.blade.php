       <!-- Content Start -->
       <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            My Account ({{Auth::user()->name}})

                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <li class="menu-item menu-item-has-children parent" >
							<ul class="submenu curency" >
								<li class="menu-item" >
									<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
								</li>
								<li class="menu-item" >
									<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
								</li>
								<form id="logout-form" method="POST" action="{{route('logout')}}"> 
								@csrf
                                </form>
							</ul>
						</li>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
<div>
    <!-- add categories  -->
    <div class="container-fluid pt-0 px-0">
                <div class="bg-light text-center rounded p-0">
                    <div class="d-flex align-items-center justify-content-between mb-0">
                        
                        <a href="">Add New Product</a>
                    </div>
                    <div class="col-md-0">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Product</a>
                    </div>
                    <div class="col-md-2">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-primary pull-right">Add New</a>
                            </div>
                    <div class="table-responsive">
                    
                        @if(Session::has('message'))
                            <div class="alert alert-sucess" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form  wire:submit.prevent="addProduct">
                                               
                            <div class="form-group">
                                <div class="col-md-4">
                                <label >Product Name</label>
                                    <input type="text" placeholder="product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-4">
                                <label class="col-md-4">Product Image</label>
                                    <input type="file"  class="input-file" wire:model="image"/>
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width=""120/>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-4">
                                <label class="col-md-4">Product Stock</label>
                                    <select class="form-control" wire:model="stock">
                                        <option value="InStock">InStock</option>
                                        <option value="OutStock">OutStock</option>
                                    </select>
                                    <input type="text" placeholder="product stock" class="form-control input-md" wire:model="stock"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                <label class="col-md-4">Product feature</label>
                                    <select class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <input type="text" placeholder="Product feature" class="form-control input-md" wire:model="feature"/>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-4">
                                <label class="col-md-4">Product Quantity</label>
                                    <input type="text" placeholder="Product Quantity" class="form-control input-md" wire:model="quantity"/>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-4">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug"/>
                                </div>
                            </div> -->
                            <div class="form-group">
                                
                                <div class="col-md-4">
                                <label class="col-md-4">Product Category</label>
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" placeholder="product Category" class="form-control input-md" wire:model="category"/> -->
                                </div>
                                <div class="form-group">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
                                    <Button type="submit"  class="btn btn-primary">submit</Button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <!-- end categories -->
</div>



