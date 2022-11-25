<div wire:poll.5000ms >
        <form wire:submit.prevent="destroyHand">
            @if($is_raised_hand==1)
       <button type="submit">
        <div class=" rounded-md py-4 hover:bg-gray-200">
        <img class="h-6 w-6 mx-auto" src="https://img.icons8.com/emoji/344/raised-hand-emoji.png">
            </div>
   
       </button>
       @endif
    </form>
    
</div>
