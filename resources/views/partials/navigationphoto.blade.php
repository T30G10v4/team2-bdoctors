<div class="col">
    @if ($thereIsProfile)

        @if ($collectionDocProfile)

            @if ($docProfile[0]->photo)
                <img src="{{ asset('storage/' . $docProfile[0]->photo) }}"
                    alt="{{ 'Cover image di ' . $docProfile[0]->slug }}" class="rounded-circle img-fluid mt-3">
            @else
                <div class="w-100 bg-secondary mt-3 text-center">
                    No Image
                </div>
            @endif
        @else
            @if ($docProfile->photo)
                <img src="{{ asset('storage/' . $docProfile->photo) }}" alt="{{ 'Cover image di ' . $docProfile->slug }}"
                    class="rounded-circle img-fluid mt-3">
            @else
                <div class="w-100 bg-secondary mt-3 text-center">
                    No Image
                </div>
            @endif

        @endif
    @endif

</div>
