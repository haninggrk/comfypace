<div>
    @foreach($studentList as $student)
    <tr class="bg-white">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$student->name}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$student->studentDetail->school->school}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$student->email}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm ">
            See Detail
        </td>
    </tr>
@endforeach
<div class="mb-5">
{{ $studentList->links() }}
</div>

</div>
