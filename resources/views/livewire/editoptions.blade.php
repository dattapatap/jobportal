<div class="col-md-12">   
    <div class="col-md-12 row">
        <div class="form-group">
            <label class="form-label">Options</label>
            <a href="javascript:void(0)" class="btn btn-info btn-sm float-right" wire:click="increment"><i class="fa fa-plus"></i> Add More</a>
        </div>
    </div>     
   @foreach($opt as $opts)        
        <div class="col-md-12 row" wire:key="delete({{ $loop->index }})">
            <div class="col-md-5">
                <div class="form-group">
                    <input type="text" class="form-control" name="opt[]" 
                    @if( isset($opts["options"]))
                        value="{{ $opts['options']}}"
                    @else
                        value=""
                    @endif
                    placeholder="{!! 'option' !!}">
                </div>        
            </div>            
            <div class="col-md-5">
                <div class="form-group">
                    <input type="number" class="form-control"
                      @if( isset($opts["marks"]))
                        value="{{ $opts["marks"] }}"
                      @else
                        value="0"
                      @endif
                       name="marks[]"
                       placeholder="{!! 'marks' !!}">
                </div>
            </div>
            <input type="hidden" class="form-control" name="optionsId[]"
                      @if( isset($opts["id"]))
                        value="{{ $opts["id"] }}"
                      @else
                        value="-1"
                      @endif
                      >

            <div class="col-md-2">
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm mt-1" wire:click="delete({{ $loop->index }})"
                    ><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>    
    @endforeach
</div>
