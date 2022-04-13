<div class="col-12">
    <h3 class="mb-4 text-dark">Current Match?</h3>
    @error('stream_link')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="is_current" wire:model="is_current">
        <label class="custom-control-label" for="is_current">Show to Other Users' Newsfeed</label>
    </div>
</div>
