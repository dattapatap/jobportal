@extends('website.layout')
@section('content')
<section class="sptb">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <style>
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 87.5%;
            color: #ff382b;
        }
        .unread{
            background-color: #1650e242;;
        }
        .read{
            background-color: white;
        }
    </style>
    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')
            <div class="col-lg-9 col-md-12 col-md-12">

                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Notifications</h3>
                        </div>
                        <div class="cord-body">
                            <div class="col-md-12">
                                @php
                                     $tot = 0;
                                @endphp
                                @foreach ($notifications as $notif )
                                    @php
                                        if($notif->unread()){
                                            $tot++ ;
                                        }
                                    @endphp
                                    @if($loop->last)
                                        @if($tot > 0)
                                            <div class="col-md-12 p-4">
                                                <a href="#" class="mark-all float-right" id="pl-2">
                                                    Mark all as read
                                                </a>
                                            </div>
                                        @endif
                                    @endif

                                @endforeach

                                @forelse($notification as $notif)
                                    <div class="row p-4 m-2 notifications @if($notif->unread()) unread @else  read @endif">
                                            <div class="notifyimg">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                            @if(isset($notif->data['recruiter_id']))
                                                <div class="col-md-9">
                                                    <a href="viewrecruiter/{{ $notif->data['recruiter_id']}} "><strong>{{ $notif->data['data']}}</strong></a>
                                                    <div class="small text-muted"> {{ $notif->created_at }}  </div>
                                                </div>
                                            @else
                                                <div class="col-md-9">
                                                    <a href="#"><strong>{{ $notif->data['data']}}</strong></a>
                                                    <div class="small text-muted"> {{ $notif->created_at }}  </div>
                                                </div>
                                            @endif
                                            <div class="col-md-2 mt-2 text-white">
                                                @if($notif->unread())
                                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notif->id }}">
                                                        Mark as read
                                                    </a>
                                                @endif
                                            </div>
                                    </div>
                                @empty
                                    There are no new notifications
                                @endforelse
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
            $(function() {
                    $('.mark-as-read').click(function(e) {
                        let id = $(this).data('id');
                        var div = $(this);
                        $.ajax({
                                type: 'POST',
                                url: "{{ route('employee.markNotification') }}",
                                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                },
                                success: function(response) {
                                    console.log('Succes!',response);
                                    div.parent('div').parent('div').removeClass('unread');
                                    div.parent('div').parent('div').addClass("read");
                                    if(response.tot <= 0 ){
                                        $('.mark-all').parent('div').remove();
                                        window.location.reload();
                                    }
                                    div.parent('div').remove();
                                },
                                error : function(err) {
                                    console.log('Error!', err.responseText);
                                },
                            });
                    });
                    $('.mark-all').click(function(e) {
                        $.ajax({
                                type: 'POST',
                                url: "{{ route('employee.markNotification') }}",
                                data:{
                                    "_token": "{{ csrf_token() }}",

                                    id:null},
                                success: function(response) {
                                    console.log(response);
                                    $("div.unread").removeClass("unread");
                                    $("div.notifications").addClass("read");
                                    if(response.tot <= 0 ){
                                        window.location.reload();
                                    }
                                },
                                error : function(err) {
                                    console.log('Error!', err.responseText);
                                },
                            });
                    });
                });
        })


    </script>
@endsection
