<div>

    <form wire:submit.prevent="save">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$enquiry['id']}}" />
        <div class="md:grid grid-cols-2 gap-8 text-sm md:text-lg">
            <div class="hidden md:block">
                <div class="py-4"><label for="client_fee_upfront">Client Fee Upfront:</label></div>
                <div class="py-4"><label for="client_fee_offer">Client Fee Offer:</label></div>
                <div class="py-4"><label for="mortgage_proc_fee">Mortgage Proc Fee:</label></div>
                <div class="py-4"><label for="insurance">Insurance:</label></div>
                <div class="py-4"><label for="solicitor">Solicitor:</label></div>
                <div class="py-4"><label for="secured_loan_hand_off">Secured Loan Hand Off:</label></div>
            </div>
            <div class="">
                <div class="py-2">
                    <span class="md:hidden"><label for="client_fee_upfront">Client Fee Upfront:</label><br></span>
                    £<input type="number" value="{{$enquiry['client_fee_upfront']}}" name="client_fee_upfront" wire:model.defer="enquiry.client_fee_upfront" />
                    <!-- <span class="text-red-600">@error('enquiry.client_fee_upfront'){{$message}}@enderror</span> -->
                </div>
                <div class="py-2">
                    <span class="md:hidden"><label for="client_fee_offer">Client Fee Offer:</label><br></span>
                    £<input type="number" value="{{$enquiry['client_fee_offer']}}" name="client_fee_offer" wire:model.defer="enquiry.client_fee_offer" />
                </div>
                <div class="py-2">
                    <span class="md:hidden"><label for="mortgage_proc_fee">Mortgage Proc Fee:</label><br></span>
                    £<input type="number" value="{{$enquiry['mortgage_proc_fee']}}" name="mortgage_proc_fee" wire:model.defer="enquiry.mortgage_proc_fee" />
                </div>
                <div class="py-2">
                    <span class="md:hidden"><label for="insurance">Insurance:</label><br></span>
                    £<input type="number" value="{{$enquiry['insurance']}}" name="insurance" wire:model.defer="enquiry.insurance" />
                </div>
                <div class="py-2">
                    <span class="md:hidden"><label for="solicitor">Solicitor:</label><br></span>
                    &nbsp;&nbsp;&nbsp;<input type="text" value="{{$enquiry['solicitor']}}" name="solicitor" wire:model.defer="enquiry.solicitor" />
                </div>
                <div class="py-2">
                    <span class="md:hidden"><label for="secured_loan_hand_off">Secured Loan Hand Off:</label><br></span>
                    &nbsp;&nbsp;&nbsp;<input type="text" value="{{$enquiry['secured_loan_hand_off']}}" name="secured_loan_hand_off" wire:model.defer="enquiry.secured_loan_hand_off" />
                </div>
                <div class="pt-2">
                    <span class="md:hidden"><label for="notes_message">Notes/Message:</label><br></span>
                    &nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>    

        <label for="secured_loan_hand_off">Notes/Message:</label>
        <textarea class="w-full h-48 border-slate-200" wire:model.defer="enquiry.notes_message" id="notes_message" rows="20">{{$enquiry['notes_message']}}</textarea>
  
        <div class="flex mt-6" x-data="{ submit: 'Save', preloader: false }">
                 
                 <div x-init="$watch('submit', value => console.log(value))">
                     <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md" 
                     x-show="submit" x-on:click="submit = !submit, preloader = ! preloader, setTimeout(() => {submit = !submit, preloader = ! preloader}, 1000)">Save</button>
                 </div>
                
                 <div x-show="preloader" class="">
                    <x-preloader /> Saving...
                 </div>
                 
                 <div>
                     <div class="p-2" x-data="{ title: '' }" @set-saved.window="title = $event.detail, submit=true">
                         <h1 x-text="title" x-init="setTimeout(() => {show = false;}, 4000)"></h1>
                     </div>
                 </div>
             </div>

        <!-- <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
            @if (session()->has('message'))
                <div class="p-3 text-green-700 bg-green-300 rounded">
                    {{ session('message') }}
                </div>
            @endif
        </div> -->

    </form>

</div>
