@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit {{ $schedule->class_name }}, {{ $schedule->tanggal }}</h1>

<div class="col-lg-8">
  <form method="post" action="/dashboard/schedules/{{$schedule->id}}/editgroup" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div id="participants-container">
      <!-- Participant fields will be added here -->
    </div>

    <button type="button" id="add-participant-btn" class="btn btn-primary">Add Participant</button>
    <button type="submit" class="btn btn-success">Save Participants for Yoga Class</button>
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
          <label for="nama_member_${participantCount}" class="form-label">Participant ${participantCount}</label>
          <input type="text" class="form-control" id="nama_member_${participantCount}" name="participants[${participantCount}][nama_member]" required placeholder="Enter participant's name">


          <input type="text" class="form-control mt-2" id="id_member_${participantCount}" name="participants[${participantCount}][id_member]" placeholder="Enter participant's ID">
        </div>
      `;

      container.insertAdjacentHTML('beforeend', newParticipantField);
    });
  });
</script>

@endsection
