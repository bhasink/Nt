@extends('admin.layout.app')


@section('content')


    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            {{--<div class="x_title">--}}
            {{--<h2>Responsive example<small>Users</small></h2>--}}
            {{--<ul class="nav navbar-right panel_toolbox">--}}
            {{----}}
            {{--</ul>--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('delete'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif




            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Quotes</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>


                                @if($get_category_data)

                                    @foreach($get_category_data as $key=>$get_category_data_d)

                                        <tr>
                                            <td>{{$get_category_data_d->id}}</td>

                                            <td>{{$get_category_data_d->name}}</td>

                                            <td>{{$get_category_data_d->quotes}}</td>


                                            <td>{{$get_category_data_d->status ? 'Active':'Inactive'}}</td>

                                            <td>
                                                <a href="/admin/service/category/edit/{{$get_category_data_d->id}}" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>

                                                <form action="{{ route('services_cat.destroy', $get_category_data_d->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" onclick="return ConfirmDelete()">Delete</button>
                                                </form>

                                            </td>


                                        </tr>

                                    @endforeach

                                @endif

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



@section('script')

    <script>

        function ConfirmDelete()
        {
            var x = prompt("Are you sure you want to delete?");
            if (x == "delete" || x == "Delete" || x == "DELETE")
                return true;
            else
                return false;
        }

    </script>


@endsection