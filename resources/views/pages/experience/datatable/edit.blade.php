<a class='editExperienceButton bs-tooltip text-success m-auto' data-toggle='modal' data-target='#editexperience'
    data-experience="{{ $query }}" data-date="{{ $query->date->format('Y-m-d') }}"
    data-href="{{ route('admin.experience.update', $query->id) }}"><i class='fa-solid fa-pen fa-xl'></i></a>
