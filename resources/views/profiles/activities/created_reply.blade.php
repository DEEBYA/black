@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} replied to
        <a href="{{ $activity->subject->book->path() }}">" {{ $activity->subject->book->title }}"</a>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent 