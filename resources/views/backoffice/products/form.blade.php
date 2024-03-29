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
        <label for="select-material-type"> Material type <span class="text-danger">*</span></label>
        <select id="select-material-type" class="form-control show-tick" name="material_type" required>
            <option value="">-- Please select --</option>
            
            @foreach ($materialsType as $materialType)
                <option value="{{ $materialType }}" 
                @if ($materialType== $product->material_type)
                            selected="selected"
                        @endif
                >{{ $materialType }} </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="select-subcategory"> Sub Category <span class="text-danger">*</span></label>
        <select id="select-subcategory" class="form-control show-tick" name="subcategory" required>
            <option value="">-- Please select --</option>
            @foreach ($subcategories as $subcategory)

                <option value="{{ $subcategory->id }}" @isset($product->subCategory->category->id)
                        @if ($subcategory->id == $product->subCategory->id)
                            selected="selected"
                        @endif
                    @endisset
                    >{{ $subcategory->category->collection->name }} -> {{ $subcategory->category->name }} ->
                    {{ $subcategory->name }}
                </option>

            @endforeach
        </select>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="price">Old Price gold <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="price" name="price"
            value="{{ old('price', $product->price ?? null) }}" required>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="new_price">New price gold<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="new_price" name="new_price"
            value="{{ old('new_price', $product->new_price ?? null) }}" required>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="price_silver">Old price silver<span class="text-danger"></span></label>
        <input type="text" class="form-control" id="price_silver" name="price_silver"
            value="{{ old('price_silver', $product->price_silver ?? null) }}">
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="new_price_silver">New price silver<span class="text-danger"></span></label>
        <input type="text" class="form-control" id="new_price_silver" name="new_price_silver"
            value="{{ old('new_price_silver', $product->new_price_silver ?? null) }}">
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <label for="image1">Image gold (438*438) <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image1" name="image1"
            value="{{ old('image1', $product->path_small_1 ?? null) }}">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="image2">Image silver (438*438) <span class="text-danger"></span></label>
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

<div class="form-group">
    <input type="checkbox" id="size" name="size"
        {{ isset($product->has_size) && $product->has_size ? 'checked' : null }}>
    <label for="size">Has size</label>
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
