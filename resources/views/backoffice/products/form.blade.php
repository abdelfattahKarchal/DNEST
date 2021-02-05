<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

<div class="form-group form-float">
    <div class="form-line">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name', $product->name ?? null) }}" required>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="select-subcategory"> Sub Category <span class="text-danger">*</span></label>
        <select id="select-subcategory" class="form-control show-tick" name="subcategory" required>
            <option value="">-- Please select --</option>
            @foreach ($subcategories as $subcategory)
                @if ($subcategory->active == 1)
                    <option value="{{ $subcategory->id }}"
                    @isset($product->subCategory->category->id)
                        @if ($subcategory->id == $product->subCategory->id)
                            selected="selected"
                        @endif
                    @endisset
                        >{{ $subcategory->category->collection->name }} -> {{ $subcategory->category->name }} -> {{ $subcategory->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div> 
<div class="form-group form-float">
    <div class="form-line">
        <label for="unit_price">Price <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="unit_price" name="unit_price"
            value="{{ old('unit_price', $product->unit_price ?? null) }}" required>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="new_price">New price <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="new_price" name="new_price"
            value="{{ old('new_price', $product->new_price ?? null) }}" required>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="image1">Image 1 (438*438) <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image1" name="image1"
            value="{{ old('image1', $product->path_small_1 ?? null) }}">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="image2">Image 2 (438*438) <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image2" name="image2"
            value="{{ old('image2', $product->path_small_2 ?? null) }}">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="quantity">Quantity <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="quantity" name="quantity"
            value="{{ old('quantity', $product->quantity ?? null) }}" required>
    </div>
</div>




<div class="form-group form-float">
    <div class="form-line">
        <label for="description">Description <span class="text-danger">*</span></label>
        {{-- <input type="text" class="form-control" id="description" name="description"
            value="{{ old('description', $product->description ?? null) }}" required> --}}

            <textarea id="ckeditor" name="description">
                {{ old('description', $product->description ?? null) }}
            </textarea>
    </div>
</div>



<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
