@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit {{ $schedule->class_name }}, {{ $schedule->tanggal }}</h1>

<div class="col-lg-8">
  <form method="post" action="/dashboard/ryr/schedules/{{$schedule->id}}/participant" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div id="participants-container-1">
      <!-- Participant fields for first section will be added here -->
    </div>

    <button type="button" id="add-participant-btn-1" class="btn btn-primary mb-3">+</button>

    <hr class="solid">

    <h3>
        Tambah dari List:
    </h3>

    <div id="participants-container-2">
      <!-- Participant fields for second section will be added here -->
    </div>

    <button type="button" id="add-participant-btn-2" class="btn btn-primary">+</button>
    <div class="row">
      <button type="submit" class="btn btn-success mt-3">Save</button>
      <a href="/dashboard/ryr/schedules/{{ $schedule->id }}/detail" class="btn btn-danger mt-3 ml-3">Cancel</a>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let participantCount1 = 0;
    const container1 = document.getElementById('participants-container-1');
    const addButton1 = document.getElementById('add-participant-btn-1');

    addButton1.addEventListener('click', function() {
      participantCount1++;

      const newParticipantField1 = `
        <div class="mb-3" id="participant-${participantCount1}">
          <label for="nama_murid_${participantCount1}" class="form-label">Participant ${participantCount1}</label>
          <input type="text" class="form-control" id="nama_murid_${participantCount1}" name="guests[${participantCount1}][nama_member]" required placeholder="Enter participant's name">

          <button type="button" class="btn btn-danger mt-2" onclick="removeParticipant('participant-${participantCount1}')">-</button>
        </div>
      `;

      container1.insertAdjacentHTML('beforeend', newParticipantField1);
    });

    let participantCount2 = 0;
    const container2 = document.getElementById('participants-container-2');
    const addButton2 = document.getElementById('add-participant-btn-2');

    addButton2.addEventListener('click', function() {
      participantCount2++;

      const newParticipantField2 = `
        <div class="mb-3" id="participant-${participantCount2}">
          <label for="id_member_${participantCount2}" class="form-label">Murid ${participantCount2}</label>
          <select class="form-control" id="id_member_${participantCount2}" name="participants[${participantCount2}][id_member]" required>
            @foreach ($members as $member)
              <option value="{{$member->id}}">{{$member->nama_murid}}</option>
            @endforeach
          </select>
          <button type="button" class="btn btn-danger mt-2" onclick="removeParticipant('participant-${participantCount2}')">-</button>
        </div>
      `;

      container2.insertAdjacentHTML('beforeend', newParticipantField2);
    });

  });

  // Function to remove the participant field
  function removeParticipant(id) {
    const element = document.getElementById(id);
    if (element) {
      element.remove();
    }
  }
</script>

@endsection
