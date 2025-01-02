<div>

    <!-- <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Le0OY8oAAAAAPijicwQ8G06KDgcsgp4vjTnh04G'
        });
      };
    </script> -->

    <form wire:submit.prevent="save">
        @csrf
        <div class="py-4">
            <label for="name">Your name:</label><br>
            <input class="w-1/2 border-slate-200" type="text" wire:model="name" name="name" id="name" placeholder="enter your name" value="" />
            <span class="text-red-600">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="py-4">
            <label for="email">Your email:</label><br>
            <input class="w-1/2 border-slate-200" type="text" wire:model="email" name="email" id="email" placeholder="enter your email" value="" />
            <span class="text-red-600">@error('email'){{$message}}@enderror</span>
        </div>
        <div class="py-4">
            <label for="message">Your message:</label><br>
            <textarea class="w-full h-20px border-slate-200" wire:model="message" id="message" name="message" rows="10"></textarea>
            <span class="text-red-600">@error('message'){{$message}}@enderror</span>
        </div>
        <div class="py-4">
            <label for="question">What comes first, E or K?:</label><br>
            <input class="w-1/2 border-slate-200" type="text" wire:model="question" name="question" id="question" placeholder="" value="" />
            <span class="text-red-600">@error('question'){{$message}}@enderror</span>
        </div>
        
        <!-- <div id="html_element"></div><br> -->
        <button type="submit" class="py-2 px-4 text-lg text-white bg-black rounded-md">Send</button>
    </form>
<!-- 
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script> -->
</div>
