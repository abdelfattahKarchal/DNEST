<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

@isset($product_id)
<input type="hidden" class="form-control" id="product_id" name="product_id"
value="{{ $product_id }}">
@endisset
<div class="form-group form-float">
    <div class="form-line">
        <label for="image1">Image 1 (438*438) <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image1" name="image1"
            value="{{ old('image1', $product->path_large ?? null) }}">
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="image2">Image 2 (1000*1000) <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image1" name="image2"
            value="{{ old('image2', $image->path_small ?? null) }}">
    </div>
</div>

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
