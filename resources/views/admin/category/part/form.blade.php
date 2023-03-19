@csrf
<div class="form-group mt-2">
    <input type="text" class="form-control" name="name" placeholder="Name"
           required maxlength="100" value="{{ old('name') ?? $category->name ?? '' }}">
</div>
<div class="form-group mt-2">
    <input type="text" class="form-control" name="title" placeholder="Slug"
           required maxlength="100" value="{{ old('slug') ?? $category->slug ?? '' }}">
</div>
<div class="form-group mt-2">
    <select name="parent_id" class="form-control" title="Родитель">
        <option value="0">Without parent</option>
        @if (count($parents))
            @include('admin.category.part.parents', ['items' => $parents, 'level' => -1])
        @endif
    </select>
</div>
<div class="form-group mt-2">
            <textarea class="form-control" name="content" placeholder="Description"
                      maxlength="200" rows="3">{{ old('content') ?? $category->content ?? '' }}</textarea>
</div>
<div class="form-group mt-2">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($category->image)
    <div class="form-group mt-2 form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">Remove image</label>
    </div>
@endisset
<div class="form-group mt-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
