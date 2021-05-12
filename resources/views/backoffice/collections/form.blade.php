<!-- Basic Validation -->
<x-back.errors></x-back.errors>
<x-back.success></x-back.success>
<div class="form-group form-float">
    <div class="form-line">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$collection->name ?? null)}}" required>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="image1">Image 1 (dimensions : 438*438 px)<span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image1" name="image1" value="{{old('image1',$collection->image1 ?? null)}}">
    </div>
</div>
{{-- <div class="form-group form-float">
    <div class="form-line">
        <label for="image2">Image 2 (dimensions : 438*438 px)</label>
        <input type="file" class="form-control" id="image2" name="image2" value="{{old('image2',$collection->image2 ?? null)}}">
    </div>
</div> --}}
<div class="form-group form-float">
    <div class="form-line">
        <label for="description">Description <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description" value="{{old('description',$collection->description ?? null)}}" required>
    </div>
</div>

<div class="form-group">
    <input type="checkbox" id="confirm" name="confirm">
    <label for="confirm">I confirm all informations</label>
</div>



<!-- #END# Basic Validation -->
