<x-landinglayout>
  <!--hero section start-->

<section class="position-relative">
  <div id="particles-js"></div>
  <div class="container">
    <div class="row  text-center">
      <div class="col">
        <h1>Product Checkout</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a>
            </li>
            <li class="breadcrumb-item">Shop</li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Product Checkout</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end--> 


<!--body content start-->

<div class="page-content">

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12">
        <div class="checkout-form box-shadow white-bg">
          <form class="row">
            <h2 class="mb-3 pl-3 text-black">Billing Detail</h2>
            <div class="col-md-12">
              <div class="form-group">
                <label>Town/City</label>
                <input type="text" id="towncity" class="form-control" placeholder="Town or City">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>State/Province</label>
                <input type="text" id="statename" class="form-control" placeholder="State Province">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-md-0">
                <label>Zip/Postal Code</label>
                <input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 md-mt-5">
        <div class="row mb-5">
          <div class="col-md-12">
            <h3 class="mb-3 text-black">Coupon Code</h3>
            <div class="p-3 p-lg-5 border">
              <label class="text-black mb-3">Enter your coupon code if you have one</label>
              <div class="input-group">
                <input class="form-control" id="c-code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2" type="text">
                <div class="input-group-append">
                  <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 p-lg-5 border">
          <h3 class="mb-3">Your Order</h3>
          <ul class="list-unstyled">
            <li class="mb-3 border-bottom pb-3"><span> 1 x Product Name </span> $ 2404.00</li>
            <li class="mb-3 border-bottom pb-3"><span> 1 x Product Name </span> $ 498.00</li>
            <li class="mb-3 border-bottom pb-3"><span> Shipping </span> $ 0.00</li>
            <li class="mb-3 border-bottom pb-3"><span> Subtotal </span> $ 2830.00</li>
            <li><span><strong class="cart-total"> Total :</strong></span>  <strong class="cart-total">$ 2830.00 </strong>
            </li>
          </ul>
        </div>
        <button id="pay-button" class="btn btn-primary btn-block">Proceed to Payment</button>
      </div>
    </div>
  </div>
</section>
</div>

  <form id="payment-form" method="post" action="/proses">
    @csrf
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
  </form>
  
<x-slot name="script">
   <script type="text/javascript">
    
      $('#pay-button').click(function (event) {
        event.preventDefault();

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');
          function changeResult(type,dataResult){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(dataResult));
          }
          
          snap.pay('{{ $snapToken }}', {
            
            onSuccess: function(result){
              changeResult('success', result);
              $("#payment-form").submit();
            },
            onPending: function(result){
              changeResult('pending', result);
              $("#payment-form").submit();
            },
            onError: function(result){
              changeResult('error', result);
              $("#payment-form").submit();
            }
          });
          
      });
    </script>
</x-slot>

<!--body content end-->
</x-landinglayout>