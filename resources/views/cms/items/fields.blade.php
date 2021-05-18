<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">city</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="city" value="{{ isset($item) ? $item->city : old('city') }}">
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">slug</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="slug" value="{{ isset($item) ? $item->slug : old('slug') }}">
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">description</label>
    <div class="col-sm-12 col-md-7">
        <textarea name="description" class="summernote-simple">
            {{ isset($item->description) ? $item->description : old('description') }}
        </textarea>
    </div>
</div>
