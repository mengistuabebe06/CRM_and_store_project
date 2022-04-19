<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md 6">
                                <a href="{{route('admin.products')}}" class="btn btin-success pull-right">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-sucess" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-group" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label class="col-md-4">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file"  class="input-file" wire:model="image"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Product Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock">
                                        <option value="InStock">InStock</option>
                                        <option value="OutStock">OutStock</option>
                                    </select>
                                    <input type="text" placeholder="product stock" class="form-control input-md" wire:model="stock"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Product feature</label>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <input type="text" placeholder="Product feature" class="form-control input-md" wire:model="feature"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Product Quantity</label>
                                <div class="col-md-4">
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
                                <label class="col-md-4">Product Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" placeholder="product Category" class="form-control input-md" wire:model="category"/> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
