<div class="col-span-2">
    <x-lean::console-log />
    <!-- <form wire:submit.prevent="save"> -->
        <!-- @csrf -->
        <!-- <select name="" class="mt-2" wire:change="changeEvent($event.target.value)"> -->
            <!-- <option value="">Select: </option> -->
            @foreach ($brokers as $broker)
                @if ($enquiry['user_id']==$broker->id)
                    <div class="mt-4 col-span-2"><span class="md:hidden font-bold">Broker: </span>{{$broker->name}} {{$broker->surname}}</div>
                @endif
                <!-- <option value="{{$broker->id}}" <?php if ($enquiry['user_id']==$broker->id) { ?>selected<?php } ?>>{{$broker->name}} {{$broker->surname}}</option></div> -->
            @endforeach
        <!-- </select> -->
    <!-- </form> -->
</div>
