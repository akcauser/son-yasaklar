<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">id:</h5>
        <small>integer</small>
    </div>
    <p class="mb-1">{{ $item->id }}</p>
</a><a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">city:</h5>
        <small>string</small>
    </div>
    <p class="mb-1">{{ $item->city }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">slug:</h5>
        <small>string</small>
    </div>
    <p class="mb-1">{{ $item->slug }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">description:</h5>
        <small>text</small>
    </div>
    <p class="mb-1">{{ $item->description }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">created at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $item->created_at }}</p>
</a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">updated at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $item->updated_at }}</p>
</a>