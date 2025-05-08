@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit {{ $member->class_name }} groups</h1>

<div class="col-lg-8">
    <form method="post" action="/dashboard/ryr/members/{{$member->id}}/groups" class="mb-5"
        enctype="multipart/form-data">
        @csrf

        <div id="classes-container">
            <!-- Participant fields for second section will be added here -->
        </div>

        <button type="button" id="add-participant-btn" class="btn btn-primary">+</button>
        <div class="row">
            <button type="submit" class="btn btn-success mt-3">Save</button>
            <a href="/dashboard/ryr/members" class="btn btn-danger mt-3 ml-3">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

    let groupCount = 0;
    const container = document.getElementById('classes-container');
    const addButton = document.getElementById('add-participant-btn');

    addButton.addEventListener('click', function() {
      groupCount++;

      const newParticipantField = `
        <div class="mb-3" id="participant-${groupCount}">
          <label for="id_class_${groupCount}" class="form-label">Grup Kelas ${groupCount}</label>
          <select class="form-control" id="id_class_${groupCount}" name="classes[${groupCount}][id_class]" required>
            @foreach ($classes as $class)
              <option value="{{$class->id}}">{{$class->nama_kelas}}</option>
            @endforeach
          </select>
          <button type="button" class="btn btn-danger mt-" onclick="removeParticipant('participant-${groupCount}')">-</button>
        </div>
      `;

      container.insertAdjacentHTML('beforeend', newParticipantField);
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
