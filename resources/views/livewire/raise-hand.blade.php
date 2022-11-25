<div >
    <form wire:submit.prevent="toggleHand">
        <button type="submit">
            <div
                class="text-center  bg-white shadow-inner {{ $toggleUser->is_raised_hand == 0 ? "hover:bg-green-300 shadow-md" : 'bg-green-300' }} rounded-md p-2">
                <img class="h-12 w-12 mx-auto" src="https://img.icons8.com/emoji/344/raised-hand-emoji.png">
                @if ($toggleUser->is_raised_hand == 0)
                    <span>Raise Hand</span>
                @else
                    <span>Lower Hand</span>
                @endif
            </div>
        </button>
    </form>
</div>
