<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border>
        <tr>
            <td>Nama</td>
            @foreach ($projectList as $project)
                <td><b>{{ $project->project_title }}</b></td>
            @endforeach
            <td>Scoring</td>
        </tr>
        @php(
    $csvHeader = [
        'Student Name',
        'Certificate Date',
        'Teacher',
        'Course',
        'Level / Event',
        'Course Desc',
        'Duration',
        'Projects',
        'Course Date',
        'About student [Creative]',
        'About student [Active]',
        'About student [Focus]',
        'About student [Fast learner]',
        'About student [Well improved]',
        'About student [Responsible]',
        'About student [Cooperative]',
        'About student [Self-motivated]',
        'About student [Persistent]',
        'About student [Cheerful]',
        'Note from Teacher about Student (jangan gunakan singkatan misal : yg, dgn, dll. Gunakan bahasa Indo yang lengkap dan ramah.)',
        'Concepts Understanding Scratch [Algorithm design]',
        'Concepts Understanding Scratch [Sequential programming]',
        'Concepts Understanding Scratch [Position & coordinates]',
        'Concepts Understanding Scratch [Direction & movement]',
        'Concepts Understanding Scratch [Conditional statements]',
        'Concepts Understanding Scratch [Loops repetition]',
        'Concepts Understanding Scratch [Event handling]',
        'Concepts Understanding Scratch [Variables]',
        'Concepts Understanding Scratch [Value passing]',
        'Concepts Understanding Scratch [Function development]',
    ]
)       
        @php($fp = fopen('{{asset("person.csv")}}', 'w'))
        @php(fputcsv($fp, $csvHeader))

        @foreach ($studentList as $student)
            @php($totalStar = 0)
            @php($nilai = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1])
            @php($list = '')
            <tr>
                <td>{{ $student->name }}</td>
                @foreach ($projectList as $project)
                    @php($bintang = 0)
                    @php($milestoneNumber = count($student->progresses->whereIn('milestone_id', $project->milestones->pluck('id'))))
                    @if ($project->project_title == 'Starfish Jump')
                        @if ($milestoneNumber >= 8)
                            @php($bintang = 5)
                        @elseif($milestoneNumber == 7)
                            @php($bintang = 4)
                        @elseif($milestoneNumber == 6)
                            @php($bintang = 3)
                        @elseif($milestoneNumber == 4)
                            @php($bintang = 2)
                        @elseif($milestoneNumber < 4)
                            @php($bintang = 1)
                        @elseif($milestoneNumber < 2)
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 2 > $nilai[3])
                            @php($nilai[3] = $bintang - 2)
                        @endif
                    @endif

                    @if ($project->project_title == 'Ghost Hunter')
                        @if ($milestoneNumber >= 10)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 7)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 5)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber == 2)
                            @php($bintang = 1)
                        @elseif($milestoneNumber < 2)
                            @php($bintang = 0)
                        @endif
                    @endif


                    @if ($project->project_title == 'Virtual Pet')
                        @if ($milestoneNumber >= 5)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 4)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 1)
                            @php($bintang = 1)
                        @elseif($milestoneNumber < 1)
                            @php($bintang = 0)
                        @endif
                    @endif
                    @if ($project->project_title == 'Pac-Man')
                        @if ($milestoneNumber >= 9)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 7)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 5)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber == 2)
                            @php($bintang = 1)
                        @elseif($milestoneNumber < 2)
                            @php($bintang = 0)
                        @endif
                    @endif
                    @if ($project->project_title == 'Dino Jump')
                        @if ($milestoneNumber >= 11)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 9)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 6)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 4)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 1 > $nilai[2])
                            @php($nilai[2] = $bintang - 1)
                        @endif
                    @endif
                    @if ($project->project_title == 'Catch the Fruit!')
                        @if ($milestoneNumber >= 11)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 8)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 6)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 2 > $nilai[7])
                            @php($nilai[7] = $bintang - 2)
                        @endif
                        @if ($bintang - 2 > $nilai[4])
                            @php($nilai[4] = $bintang - 2)
                        @endif
                    @endif
                    @if ($project->project_title == 'Blockly - Maze' or $project->project_title == 'Blockly - Bird')
                        @if ($milestoneNumber >= 9)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 7)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 5)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 1)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                    @endif
                    @if ($project->project_title == 'Maze Runner')
                        @if ($milestoneNumber >= 11)
                            @php($bintang = 5)
                            @php($position = 'e')
                        @elseif($milestoneNumber >= 8)
                            @php($bintang = 4)
                            @php($position = 'vg')
                        @elseif($milestoneNumber >= 5)
                            @php($bintang = 3)
                            @php($position = 'g')
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 2 > $nilai[3])
                            @php($nilai[3] = $bintang - 2)
                        @endif
                        @if ($bintang - 1 > $nilai[2])
                            @php($nilai[2] = $bintang - 1)
                        @endif
                    @endif
                    @if ($project->project_title == 'Space War')
                        @if ($milestoneNumber >= 14)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 11)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 7)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 4)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 2 > $nilai[6])
                            @php($nilai[6] = $bintang - 2)
                        @endif
                        @if ($bintang - 2 > $nilai[5])
                            @php($nilai[5] = $bintang - 2)
                        @endif
                        @if ($bintang - 2 > $nilai[3])
                            @php($nilai[3] = $bintang - 2)
                        @endif
                        @if ($bintang - 2 > $nilai[4])
                            @php($nilai[4] = $bintang - 2)
                        @endif
                    @endif
                    @if ($project->project_title == 'Flappy Bird')
                        @if ($milestoneNumber >= 9)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 6)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 4)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                        @if ($bintang - 2 > $nilai[4])
                            @php($nilai[4] = $bintang - 2)
                        @endif
                        @if ($bintang - 2 > $nilai[7])
                            @php($nilai[7] = $bintang - 2)
                        @endif
                    @endif
                    @if ($project->project_title == 'Pong Game')
                        @if ($milestoneNumber >= 10)
                            @php($bintang = 5)
                        @elseif($milestoneNumber >= 7)
                            @php($bintang = 4)
                        @elseif($milestoneNumber >= 5)
                            @php($bintang = 3)
                        @elseif($milestoneNumber >= 3)
                            @php($bintang = 2)
                        @elseif($milestoneNumber >= 2)
                            @php($bintang = 1)
                        @else
                            @php($bintang = 0)
                        @endif
                    @endif
                    <td style="white-space: nowrap;
                    ">
                        @if ($bintang > 0)
                        @php($totalStar += $bintang)
                            {{ $project->project_title }}
                            {{ '★ ' . $bintang }}
                            @if($list == '')
                            @php($list = $list . $project->project_title . '★' . $bintang)
                            @else
                            @php($list = $list . ', ' . $project->project_title . '★' . $bintang)
                            @endif
                        @endif
                    </td>
                @endforeach
                <td>
                    {{$totalStar/59 * 100}}
                    @php($listNilai = '')
                    @foreach ($nilai as $n)
                        @if ($n == 1)
                            @php($nilai[$loop->index] = 'Fair')
                        @elseif($n == 2)
                            @php($nilai[$loop->index] = 'Good')
                        @elseif($n == 3)
                            @php($nilai[$loop->index] = 'Very Good')
                        @else
                            @php($nilai[$loop->index] = 'Excellent')
                        @endif
                    @endforeach
                </td>
                @if ($student->ClassMembers->first() != null)
                    @php($csv = [$student->name, '12/5/2022', $student->ClassMembers->first()->class->supervisor->name, 'Basic Block Coding', 'Block Coding Level 01', 'Development of computational thinking skills through game programming using the fundamental concepts of block programming with Scratch', '16 hours', $list, 'August - November 2022', '', '', '', '', '', '', '', '', '', '', '', $nilai[0], $nilai[1], $nilai[2], $nilai[3], $nilai[4], $nilai[5], $nilai[6], $nilai[7], $nilai[8], $nilai[9]])
                @endif
                @php(fputcsv($fp, $csv))
            </tr>
        @endforeach
        @php(fclose($fp))
    </table>
</body>

</html>
