@extends('recruiter.layout.layout')
@section('content')
<style>
    .display-4 {
        font-size: 24px;
        font-weight: 300;
        line-height: 1.1;
        text-align: right;
    }
</style>

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Pricing</h4>
        </div>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        <div class="row">
        @forelse ($packages as $item)
            <div class="col-xs-12 col-md-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="ribbon ribbon-top-left text-danger">
                        @if ($item->name =='Enterprises')
                               <span  class="bg-success"> {{ $item->name }} </span>
                        @elseif($item->name =='Premium')
                               <span  class="bg-danger"> {{ $item->name }} </span>
                        @elseif($item->name =='Gold')
                               <span  class="bg-yellow"> {{ $item->name }} </span>
                        @elseif($item->name =='Silver')
                               <span  class="bg-info"> {{ $item->name }} </span>
                        @else
                               <span  class="bg-warning"> {{ $item->name }} </span>
                        @endif
                    </div>
                    <div class="panel-body text-center">
                        <p class="display-4 mb-0"><i class="fa fa-inr"></i> {{ $item->amount }} </p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><span class="font-weight-semibold"> Featured</span> Ad Posting</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> {{ $item->maxads}} </span> Featured Posts</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> {{ $item->maxdays}} </span> Days </li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> Custom </span> Reviews</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-primary pay_now" href="#" amt="{{ $item->amount }}" package="{{ $item->id }}">Purchase Now</a>
                    </div>
                </div>
            </div>
        @empty

        @endforelse

        </div>

    </div>
</div>
@endsection
@section('scripts')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $('body').on('click','.pay_now',function(e){
        e.preventDefault();
        var amount = $(this).attr('amt');
        var package = $(this).attr('package');
        var total_amount = amount * 100;
        var options = {
            // "key": "rzp_test_1t3Gb4gH9YfNak", // Enter the Key ID generated from the Dashboard
            "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": total_amount,
            "currency": "INR",
            "name": "{{ Auth::user()->name }}",
            "description": "Package Buy",
            "image": "{{ asset('logo.jpg') }}",
            "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "package_id": package,
            "callback_url": "{{  route('recruiter.payment.pay_now') }}",
            "handler": function (response){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{ route('recruiter.payment.pay_now') }}",
                    data:{razorpay_payment_id:response.razorpay_payment_id,amount:amount, pk_id:package},
                    success:function(data){
                        console.log(data);
                        if(data.code == 200) {
                            toastr.success(data.message);
                            location.reload();
                        }else{
                         console.log('error');
                         console.log(data);
                        }

                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            },
            // "prefill": {
            //     "name": "{{ Auth::user()->name }}",
            //     "email": "{{ Auth::user()->email }}",
            //     "contact":"{{ Auth::user()->mobile }}"
            // },
            "theme": {
                "color": "#1da0df"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        rzp1.on('payment.failed', function (response){
                alert(response.error.source);
        });
    });
</script>
@endsection
