<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

<div class="form-group form-float">
    <div class="form-line">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name', $subcategory->name ?? null) }}" required>
    </div>
</div>
 <div class="form-group form-float">
    <div class="form-line">
        <label for="select-category"> Category <span class="text-danger">*</span></label>
        <select id="select-category" class="form-control show-tick" name="category">
            <option value="">-- Please select --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                 @isset($subcategory)
                      @if ($category->subCategories->contains('id', $subcategory->id) )
                        selected="selected"
                    @endif
                 @endisset
                    >{{ $category->name }} -> {{ $category->collection->name }}</option>
            @endforeach
        </select>
    </div>
</div> 

<div class="form-group form-float">
    <div class="form-line">
        <label for="description">Description <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description"
            value="{{ old('description', $subcategory->description ?? null) }}" required>
    </div>
</div>

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
