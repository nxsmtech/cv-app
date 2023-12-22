<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h1 class="text-xl font-bold">{{ Arr::get($cv, 'title') }}</h1>
            <p>{{ Arr::get($cv['personal_detail'], 'first_name') }} {{ Arr::get($cv['personal_detail'], 'last_name') }}</p>
            <p>{{ Arr::get($cv['personal_detail'], 'email') }}</p>
            <p>{{ Arr::get($cv['personal_detail'], 'phone') }}</p>
            <p>{{ Arr::get($cv['personal_detail'], 'address') }}</p>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-bold">Education</h2>
            @foreach($cv['education'] as $education)
                @php
                    $startYear = \Illuminate\Support\Carbon::parse($education['start_date'])->format('Y');

                    $endYear = null;
                    if ($education['end_date']) {
                        $endYear = \Illuminate\Support\Carbon::parse($education['end_date'])->format('Y');
                    }
                @endphp
                <p class="mt-2"><strong>{{ Arr::get(\App\Enums\Education\Grades::asOptions(), $education['grade']) }}</strong>
                    - {{ $education['institution'] }}
                    - {{ $education['specialization'] }}
                    - {{ Arr::get(\App\Enums\Education\Statuses::asOptions(), $education['status']) }},
                    {{ $startYear }}
                    - {{ $endYear ?? 'Still present' }}
                </p>
            @endforeach
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-bold">Work Experience</h2>
            @foreach($cv['work_experience'] as $workExperience)
                @php
                    $startYear = \Illuminate\Support\Carbon::parse($workExperience['start_date'])->format('Y');

                    $endYear = null;
                    if ($workExperience['end_date']) {
                        $endYear = \Illuminate\Support\Carbon::parse($workExperience['end_date'])->format('Y');
                    }
                @endphp
                <p class="mt-2"><strong>{{ Arr::get(\App\Enums\Education\Grades::asOptions(), $workExperience['position']) }}</strong>
                    - {{ $workExperience['company_name'] }}
                    {{ $startYear }}
                    - {{ $endYear ?? 'Still present' }}
                </p>
                <p class="mt-2">
                    {{ $workExperience['description'] }}
                </p>
            @endforeach
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-bold">Skills</h2>
            @foreach($cv['skill'] as $skill)
                <p>
                    {{ Arr::get($skill, 'name') }} - <strong>{{ Arr::get(\App\Enums\Skill\Levels::asOptions(), $skill['level']) }}</strong>
                </p>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
