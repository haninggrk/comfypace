<div>
    @if ($status)
        <form wire:submit.prevent="destroy" {{-- method="POST" action="{{route('studentprogress.destroy',$student->progresses->where('milestone_id','=',$milestone->id)->first()->id)}}" --}}>
            <button type="submit"
                class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                ✓ </span></button>
        </form>
    @else
        <form wire:submit.prevent="store">

            <button type="submit"
                class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                X </span></button>
            </a>
        </form>
    @endif

</div>
