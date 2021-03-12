<div class="col-md-12">
    <div class="col-md-12 row">
        <div class="form-group">
            <label class="form-label">Options</label>
            <a href="javascript:void(0)" class="btn btn-info btn-sm float-right" wire:click="increment"><i class="fa fa-plus"></i> Add More</a>
        </div>
    </div>
    <div class="col-md-12 row">
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" name="opt[]" placeholder="{{ 'option' }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="checkbox" class="radio iscorrect" value="1" name="marks[]">
            </div>
            <input type="hidden" class="form-control" name="uniqueId[]" value="-1">
        </div>
   </div>
   @foreach($options  as $opts)
        <div class="col-md-12 row" wire:key="{{ $opts}}">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="opt[]"  placeholder="{{ 'option' }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="checkbox" class="radio iscorrect"  value="1" name="marks[]">
                </div>
            </div>
            <input type="hidden" class="form-control" name="uniqueId[]" value="-1">
            <div class="col-md-2">
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm mt-1" wire:click="delete({{ $opts }})"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
