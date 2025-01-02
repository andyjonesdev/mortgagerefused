<div>
    <x-lean::console-log />
    <form wire:submit.prevent="save">
        @csrf
        <select name="" class="mt-2" wire:change="changeEvent($event.target.value)">
            <option value="">Select: </option></div>
            @foreach ($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option></div>
            @endforeach
        </select>
    </form>
</div>


