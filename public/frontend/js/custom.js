//$(document).ready(function () {
//
//    loadcart();
//
//    $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//    });
//
//    function loadcart()
//    {
//        $.ajax({
//            method: "GET",
//            url: "/load-cart-data",
//            success: function (response){
//                $('.cart-count').html('');
//                $('.cart-count').html(response.count);
//            }
//        });
//    }
//});

// $('.addToCartBtn').click(function (e) {

//     e.preventDefault();
//     var product_id = $(this).closest('.product_data').find('.prod_id').val();
//     var product_qty = $(this).closest('.product_data').find('.qty-input').val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         method: "POST",
//         url: "/add_to_cart",
//         data: {
//             'product_id': product_id,
//             'product_qty': product_qty,
//         },

//         success: function (respone) {
//             alert(respone.status);
//         }

//     });
// });


// $('.featured-carousel').owlCarousel({
//     loop: true,
//     margin: 10,
//     nav: true,
//     dots: false,
//     responsive: {
//         0: {
//             items: 1
//         },
//         600: {
//             items: 3
//         },
//         1000: {
//             items: 4
//         }
//     }
// });

// $(document).ready(function () {
//     $('.increment-btn').click(function (e) {
//         e.preventDefault();


//         var inc_value = $(this).closest('.product_data').find('.qty-input').val();
//         var value = parseInt(inc_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if (value < 10) {
//             value++;
//             $(this).closest('.product_data').find('.qty-input').val(value);
//         }
//     });

//     $('.decrement-btn').click(function (e) {
//         e.preventDefault();


//         var dec_value = $(this).closest('.product_data').find('.qty-input').val();
//         var value = parseInt(dec_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if (value > 1) {
//             value--;
//             $(this).closest('.product_data').find('.qty-input').val(value);
//         }
//     });
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('.delete-cart-item').click(function (e) {
//         e.preventDefault();

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         var prod_id = $(this).closest('.product_data').find('.prod_id').val(value);

//         $.ajax({
//             method: 'post',
//             url: 'delete-cart-item',
//             data: {
//                 'prod_id': prod_id,
//             },
//             success: function (respone) {
//                 window.location.reload();
//                 swal("", respone.status, "sucess");
//             }
//         })
//     });
// });

// $('gc.changeQuantity').click(function (e) {
//     e.preventDefault();
//     var prod_id = $(this).closest('.product_data').find('.prod_id').val();
//     var qty = $(this).closest('.product_data').find('.qty-input').val();
//     data = {
//         'prod_id': prod_id,
//         'prod_qty': qty,
//     }

//     $.ajax({
//         method: "POST",
//         url: "updateCart",
//         data: data,

//         success: function (respone) {
//             window.location.reload();

//         }

//     });
// })
