<div>
    <div>
        <x-lean::console-log />
        <form wire:submit.prevent="save">
            @csrf
            <select name="" class="" wire:change="changeEvent($event.target.value)">
                <option value="">Select: </option>
                @foreach ($statuses as $status)
                    <option value="{{$status}}" <?php if ($enquiry['status']==$status) { ?>selected<?php } ?>>{{$status}}</option></div>
                @endforeach
            </select>
            <input class="w-full border-slate-200" type="hidden" name="enquiry_id" id="enquiry_id" value="{{$enquiry->id}}" />
            <div>
        </form>
    </div>
</div>