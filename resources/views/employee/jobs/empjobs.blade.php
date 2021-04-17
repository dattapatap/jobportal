@extends('website.layout')
@section('content')
<section class="sptb">
    <style>
        .table td:nth {
            text-align: center;
        }

        .alert-message {
            color: red;
        }
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 87.5%;
            color: #ff382b;
        }
    </style>

    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')

            <div class="col-lg-9 col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Jobs may you have interested</h3>
                    </div>
                    <div class="card-body">
                        <div class="settings-tab">
                            <ul class="tabs-menu nav">
                                <li class=""><a href="#tab1" class="active" data-toggle="tab"> Applied Jobs </a></li>
                                <li><a href="#tab2" data-toggle="tab" class=""> Saved Jobs</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive border-top userprof-tab" id="tab1">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="text-align: center">Description</th>
                                            <th scope="col" style="text-align: center">Location</th>
                                            <th scope="col" style="text-align: center">Salary(Month)</th>
                                            <th scope="col" style="text-align: center">Job Status</th>
                                            <th scope="col" style="text-align: center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($appliedjobs as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1}}</th>
                                                    <td>
                                                        <div class="media mt-0 mb-0">
                                                            <div class="media-body">
                                                                <div class="card-item-desc p-0">
                                                                    <a href="javascript::void(0);" class="text-dark"><h4 class="font-weight-semibold">{{ $item->job_title }}</h4></a>
                                                                    <a href="javascript::void(0);"><i class="fa fa-clock-o w-4"></i> {{ $item->created_at }}</a><br>
                                                                    <a href="javascript::void(0);"><i class="fa fa-tag w-4"></i> {{ $item->job_type}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class ="fa fa-map-marker mr-1 text-muted"></i>{{$item->location->name}}</td>
                                                    <td class="font-weight-semibold fs-16"><i class="fa fa-inr"></i> {{$item->min_salary.'-'.$item->max_salary }}</td>
                                                    <td style="text-align: center;">
                                                        @if ($item->status)
                                                            <a href="javascript::void(0);" class="badge badge-success">  Active </a>
                                                        @else
                                                            <a href="javascript::void(0);" class="badge badge-danger"> Expired </a>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a class="btn btn-primary btn-sm text-white" href="{{ url('job/search/'. $item->job_id .'/details') }}" ><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th scope="row" colspan="6" style="text-align: center;">  No Jobs Applied Still </th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane  table-responsive border-top userprof-tab" id="tab2">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="text-align: center">Description</th>
                                            <th scope="col" style="text-align: center">Location</th>
                                            <th scope="col" style="text-align: center">Salary(Month)</th>
                                            <th scope="col" style="text-align: center">Job Status</th>
                                            <th scope="col" style="text-align: center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($savedjobs as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1}}</th>
                                                    <td>
                                                        <div class="media mt-0 mb-0">
                                                            <div class="media-body">
                                                                <div class="card-item-desc p-0">
                                                                    <a href="javascript::void(0);" class="text-dark"><h4 class="font-weight-semibold">{{ $item->job_title }}</h4></a>
                                                                    <a href="javascript::void(0);"><i class="fa fa-clock-o w-4"></i> {{ $item->created_at }}</a><br>
                                                                    <a href="javascript::void(0);"><i class="fa fa-tag w-4"></i> {{ $item->job_type}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class ="fa fa-map-marker mr-1 text-muted"></i>{{$item->location->name}}</td>
                                                    <td class="font-weight-semibold fs-16"><i class="fa fa-inr"></i> {{$item->min_salary.'-'.$item->max_salary }}</td>
                                                    <td style="text-align: center;">
                                                        @if ($item->status)
                                                            <a href="javascript::void(0);" class="badge badge-success">  Active </a>
                                                        @else
                                                            <a href="javascript::void(0);" class="badge badge-danger"> Expired </a>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a class="btn btn-danger btn-sm text-white btn-deletejob" id="{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                                                        <a class="btn btn-primary btn-sm text-white" href="{{ url('job/search/'. $item->job_id .'/details') }}" ><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th scope="row" colspan="6" style="text-align: center;">  No Jobs Saved Still </th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-deletejob').click(function(){

            var tr = $(this).closest('tr');

            $.ajax({
                url:'{{ route("employee.savedjob.delete")}}',
                cache:'false',
                data:{'id':$(this).attr('id')},
                type:'POST',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    if(res.status){
                        toastr.success(res.success);
                        tr.remove();
                    }else{
                        toastr.warning(res.error);
                    }
                },
                error:function(error){
                    console.log(error.responseText);
                }
            });
        });
    });
</script>




@endsection
