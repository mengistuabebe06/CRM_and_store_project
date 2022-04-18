<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Category
                            </div>
                            <div class="col-md 6">
                                <a href="{{route('admin.categories')}}" class="btn btin-success pull-right">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-sucess" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-group" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label class="col-md-4">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4">Category Name</label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
