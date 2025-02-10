@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit Participants for {{ $class_name }}</h1>

<div class="col-lg-8">
    <form method="post" action="/dashboard/ryr/participants/{{$id_kelas}}" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div id="participants-container">
            <!-- Participant fields will be added here -->
        </div>

        <button type="button" id="add-participant-btn" class="btn btn-primary">Add Participant</button>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="/dashboard/ryr/participants/{{ $id_kelas }}/index" class="btn btn-danger">Cancel</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('participants-container');
    const addButton = document.getElementById('add-participant-btn');
    let participantCount = 0;

    addButton.addEventListener('click', function() {
      participantCount++;

      const newParticipantField = `

          <div class="mb-3">
            <label for="member_${participantCount}" class="form-label">Murid ${participantCount}</label>
            <select class="form-control" id ="member_${participantCount}" name="member_${participantCount}">
                @foreach ($members as $member)
                <option value="{{$member->id}}"> {{$member->nama_murid}}</option>
                @endforeach
            </select>
        </div>

      `;

      container.insertAdjacentHTML('beforeend', newParticipantField);
    });
  });
</script>

@endsection
