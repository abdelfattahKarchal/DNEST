<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

<div class="form-group form-float">
    <div class="form-line">
        <label for="shipping_address">Shipping address <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="shipping_adress" name="shipping_address"
            value="{{ old('shipping_address', $order->shipping_address ?? null) }}" required>
    </div>
</div>


<div class="form-group form-float">
    <div class="form-line">
        <label for="total_price">Total price <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="total_price" name="total_price"
            value="{{ old('total_price', $order->total_price ?? null) }}" required>
    </div>
</div>

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
