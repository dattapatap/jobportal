<div class="col-md-12">   
    <div class="col-md-12 row">
        <div class="form-group">
            <label class="form-label">Options</label>
            <a href="javascript:void(0)" class="btn btn-info btn-sm float-right" wire:click="increment"><i class="fa fa-plus"></i> Add More</a>
        </div>
    </div>  

    <div class="col-md-12 row">
        <div class="col-md-5">
            <div class="form-group">
                <input type="text" class="form-control" name="opt[]" placeholder="{{ 'option' }}">
            </div>        
        </div>            
        <div class="col-md-5">
            <div class="form-group">
                <input type="number" class="form-control" value="0" name="marks[]" placeholder="{{ 'marks'}}">
            </div>
        </div>
    </div> 
   
   @foreach($options  as $opts)        
        <div class="col-md-12 row" wire:key="{{ $opts}}">
            <div class="col-md-5">
                <div class="form-group">
                    <input type="text" class="form-control" name="opt[]"  placeholder="{{ 'option' }}">
                </div>        
            </div>            
            <div class="col-md-5">
                <div class="form-group">
                    <input type="number" class="form-control" value="0" name="marks[]" placeholder="{{ 'marks' }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm mt-1" wire:click="delete({{ $opts }})"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>    
    @endforeach
</div>
