<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                            All categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}" class="btn btin-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                  <div class="panel-body">
                        @if(Session::has('delete_message'))
                            <div class="alert alert-success" role="role">{{Session::get('delete_message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Category Name</th>
                                    <th> Slug</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{'admin.editcategory',['category_slug'=>$category->slug]}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" wire:click.prevent="deleteCategory({{$category->id}})" style="margin: left 10px;"><i class="fa fa-times fa-2x text danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @php
                                    $i+=1;
                                    @endphp
                            </tbody>
                        </table>
                        
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
</div>

