@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

<div class="py-3 mb-4 shadow-md bg-secondary border-top">
        <div class="container mb-4 text-white">
            <h3 class="mb-0" style="color:Tomato;">
                <a href="{{ url('/') }}"> Home </a> /

                <a href="{{ url('checkout') }}"> Checkout </a>/
            </h3>        
        </div>
</div>

<form action="{{ url('placeOrder') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="row m-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><b>Basic Details</b></h4>
                </div>

                <div class="card-body">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname">First Name</label>
                                <input type="text" name="fname" required class=
                                "form-control fname" value="{{Auth::user()->name }}" 
                                placeholder="Enter your First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lname" required class=
                                "form-control lname" value="{{Auth::user()->lname }}" 
                                placeholder="Enter your Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" required class=
                                "form-control email" value="{{Auth::user()->email }}" 
                                placeholder="Enter your email">
                                <span id="email_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="number">Phone Number</label>
                                <input type="number" name="phone" required class=
                                "form-control phone" value="{{Auth::user()->phone }}" 
                                placeholder="Enter your Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Address">Address 1</label>
                                <input type="text" name="address1" required class=
                                "form-control  address1" value="{{Auth::user()->address1 }}" 
                                placeholder="Enter your Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Address2">Address 2</label>
                                <input type="text" name="address2" required class=
                                "form-control address2" value="{{Auth::user()->address2 }}" 
                                placeholder="Enter your Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city">City</label>
                                <input type="text" name="city" required class="form-control city" value="{{Auth::user()->city }}" placeholder="Enter your city">
                                <span id="city_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="State">State</label>
                                <input type="text" name="state" required class="form-control state" value="{{Auth::user()->state }}" placeholder="Enter your State">
                                <span id="state_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Country">Country</label>
                                <input type="text" name="country" required class="form-control country" value="{{Auth::user()->country }}" placeholder="Enter your Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="pincode">Pincode</label>
                                <input type="number" name="pincode" required class="form-control pincode" value="{{Auth::user()->pincode }}" placeholder="Enter your pincode">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4><b>Order Details</b></h4>
                        <hr>
                        @if($cartitems->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($cartitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>RS. {{ $item->products->selling_price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @php $total += $item->products->selling_price * $item->prod_qty; @endphp 
                            <h3 class="px-2"><b>
                                Grand Total <span class="float-end"> Rs. {{ $total }} </span> </b>
                            </h3>
                            <hr>
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" class="btn btn-primary w-100 "><h5>Place Order | COD</h5></button>
                            <button type="button" class="btn btn-danger w-100 mt-3 razorpay-btn"><h5>Pay with Razorpay</h5></button> 
                            <div id="paypal-button-container" class="w-100 mt-3"></div>
                        @else
                            <h4 class="text-center">No Products in Cart </h4>
                        @endif
                    </div>
                </div>
            </div>
    </div>
</form>

@endsection

@section('scripts')

<!-- link Razorpay -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script> 
<!-- link PayPAl -->
<script src="https://www.paypal.com/sdk/js?client-id=AeDcxprOZQuaoQTUze6jWWZvqnqMZ6Ifn8vGGTHl105EtCUk9PFffRWBYZ44Bo3LlfBV6uI3MDzaNBp5&components=buttons"></script>


<script>
    // razorpay
    $(document).ready(function(){
        $('.razorpay-btn').click(function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var fname = $('.fname').val();
            var lname = $('.lname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country = $('.country').val();
            var pincode = $('.pincode').val();


            if(!fname){
                fname_error =  'Please enter your first name';
                $('#fname_error').html('');
                $('#fname_error').html(fname_error);
            }
            else{
                fname_error =  '';
                $('#lname_error').html('');
            }

            if(!lname){
                lname_error =  'Please enter your last name';
                $('#lname_error').html('');
                $('#lname_error').html(lname_error);
            }
            else{
                lname_error =  '';
                $('#lname_error').html('');
            }

            if(!email){
                email_error =  'Please enter your email';
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }
            else{
                email_error =  '';
                $('#email_error').html('');
            }

            if(!phone){
                phone_error =  'Please enter your phone number';
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }
            else{
                phone_error =  '';
                $('#phone_error').html('');
            }

            if(!address1){
                address1_error =  'Please enter your address line 1';
                $('#address1_error').html('');
                $('#address1_error').html(address1_error);
            }
            else{
                address1_error =  '';
                $('#address1_error').html('');
            }

            if(!address2){
                address2_error =  'Please enter your address line 2';
                $('#address2_error').html('');
                $('#address2_error').html(address2_error);
            }
            else{
                address2_error =  '';
                $('#address2_error').html('');
            }

            if(!city){
                city_error =  'Please enter your city';
                $('#city_error').html('');
                $('#city_error').html(city_error);
            }
            else{
                city_error =  '';
                $('#city_error').html('');
            }

            if(!state){
                state_error =  'Please enter your State';
                $('#state_error').html('');
                $('#state_error').html(state_error);
            }
            else{
                state_error =  '';
                $('#state_error').html('');
            }

            if(!country){
                country_error =  'Please enter your Country';
                $('#country_error').html('');
                $('#country_error').html(country_error);
            }
            else{
                country_error =  '';
                $('#country_error').html('');
            }

            if(!pincode){
                pincode_error =  'Please enter your Pincode';
                $('#pincode_error').html('');
                $('#pincode_error').html(pincode_error);
            }
            else{
                pincode_error =  '';
                $('#pincode_error').html('');
            }

            if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != ''|| pincode_error != '') {
                return false;
            }
            else{

                var data = {
                     'fname': fname,
                     'lname' :  lname,
                     'email' :  email,
                     'phone' :  phone,
                     'address1' :  address1,
                     'address2' :  address2,
                     'city' :  city,
                     'state' :  state,
                     'country' :  country,
                     'pincode' :  pincode
                }

                $.ajax({
                    method: "POST",
                    url: "/procced-to-pay",
                    data: data,
                    success: function (response) {
                        //alert(respone.total_price);

                        var options = {
                            "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                            "amount": "1*100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": response.fname + ' ' + response.lname, //your business name
                            "description": "Thank you for Choosing Us",
                            "image": "https://example.com/your_logo",
                            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the id obtained in the response of Step 1
                            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                            "handler" : function(responsea){
                                alert("hii");
                                // alert(responsea.razorpay_payment_id);
                                $.ajax({
                                    method: "POST",
                                    url: "/place-order",
                                    data: {
                                        'fname': response.fname,
                                        'lname': response.lname,
                                        'email': response.email,
                                        'phone': response.phone,
                                        'address1': response.address1,
                                        'address2': response.address2,
                                        'city': response.city,
                                        'state': response.state,
                                        'country': response.country,
                                        'pincode': response.pincode,
                                        'payment_mode' : "Paid By RazorPay",
                                        'payment_id' : responsea.razorpay_payment_id,
                                    },
                                    success: function (responseb) {
                                    //    alert(responseb.status);
                                        swal(responseb.status);
                                        window.location.href="/my-orders";
                                    }
                                });
                            },
                            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                                "name": response.fname + ' ' + response.lname, //your customer's name
                                "email": response.email,
                                "contact": response.phone //Provide the customer's phone number for better conversion rates 
                            },
                            "notes": {
                                "address": "Razorpay Corporate Office"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };

                        var rzp1 = new Razorpay(options);
                            rzp1.open();
                    }

                }); 

            }
        });
    });

    // Paypal
     paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            // method: "POST",
            // headers: {
            //   "Content-Type": "application/json",
            // },
            purchase_units: [{
              amount: {
                value: '{{ $total }}'
              }
            }]
          });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details){
                // alert("Payment has been made successfully! by" + details.payer.name.given_name);

                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var pincode = $('.pincode').val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $.ajax({
                      method: "POST",
                      url: "/placeOrder",
                      data: {
                          'fname': fname,
                          'lname': lname,
                          'email': email,
                          'phone': phone,
                          'address1': address1,
                          'address2': address2,
                          'city': city,
                          'state': state,
                          'country': country,
                          'pincode': pincode,
                          'payment_mode' : "Paid By Paypal",
                          'payment_id' : details.id,
                      },
                      
                      success: function (response) {
                          //    alert(responseb.status);
                          swal(response.status);
                          //alert("Payment has been made successfully! by" + details.payer.name.given_name);
                          window.location.href="/my-orders";
                      }
                  });
            });
        }
    }).render('#paypal-button-container');

      
</script>

@endsection