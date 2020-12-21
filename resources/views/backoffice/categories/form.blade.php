<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>

<div class="form-group form-float">
    <div class="form-line">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name', $category->name ?? null) }}" required>
    </div>
</div>
 <div class="form-group form-float">
    <div class="form-line">
        <label for="select-collection"> Collection <span class="text-danger">*</span></label>
        <select class="form-control show-tick" name="collection">
            <option value="">-- Please select --</option>
            @foreach ($collections as $collection)
                <option value="{{ $collection->id }}"
                 @isset($category)
                      @if ($collection->id == $category->collection->id)
                        selected="selected"
                    @endif
                 @endisset
                    >{{ $collection->name }}</option>
            @endforeach
        </select>
    </div>
</div> 

<div class="form-group form-float">
    <div class="form-line">
        <label for="description">Description <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description"
            value="{{ old('description', $category->description ?? null) }}" required>
    </div>
</div>

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
