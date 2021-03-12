@extends('admin.layout.layout')
@section('content')
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
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Notifications</h4>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                @forelse($notification as $notif)
                    <div class="row p-4 m-2 notifications @if($notif->unread()) unread @else  read @endif">
                            <div class="notifyimg">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="col-md-9">
                                <strong>{{ $notif->data['data']}}</strong>
                                <div class="small text-muted"> {{ $notif->created_at }}  </div>
                            </div>
                            <div class="col-md-2 mt-2 text-white">
                                @if($notif->unread())
                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notif->id }}">
                                        Mark as read
                                    </a>
                                @endif
                            </div>
                    </div>
                    @if($loop->last)
                        <div class="col-md-12">
                        <a href="#" class="mark-all" id="pl-2">
                            Mark all as read
                        </a>
                        </div>
                    @endif
                @empty
                    There are no new notifications
                @endforelse
            </div>
        </div>
    </div>
</div>
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
                                url: "{{ route('admin.markNotification') }}",
                                data: {id},
                                success: function(response) {
                                    console.log('Succes!',response);
                                    div.parent('div').parent('div').removeClass('unread');
                                    div.parent('div').parent('div').addClass("read");
                                    div.parent('div').remove();
                                },
                                error : function(err) {
                                    console.log('Error!', err.responseText);
                                },
                            });
                    });
                    $('.mark-all').click(function(e) {
                        console.log('mark all');
                        $.ajax({
                                type: 'POST',
                                url: "{{ route('admin.markNotification') }}",
                                data:{id:null},
                                success: function(response) {
                                    console.log(response);
                                    $("div.unread").removeClass("unread");
                                    $("div.notifications").addClass("read");
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
