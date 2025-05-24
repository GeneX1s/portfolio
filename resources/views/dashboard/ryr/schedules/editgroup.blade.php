@extends('dashboard.layouts.main')

@section('container')


@use('App\Models\RYR\ryrParticipants')

<div class="col-lg-8">
    <h1 class="h2">Edit {{ $schedule->class_name }}, {{ $schedule->tanggal }}</h1>
    <form method="post" action="/dashboard/ryr/schedules/{{$schedule->id}}/participant" class="mb-5"
        enctype="multipart/form-data">
        @csrf

        <div id="participants-container-1">
            <!-- Participant fields for first section will be added here -->
        </div>

        <button type="button" id="add-participant-btn-1" class="btn btn-primary mb-3">+</button>

        <hr class="solid">

        <h2>
            Tambah dari List:
        </h2>
        <form action="{{ route('schedule.detailGroup', ['id' => $schedule->id]) }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Murid</label>
                        <input type="string" class="form-control" id="nama" name="nama">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
                </div>
            </div>
        </form>
        <div id="participants-container-2">
            <table class="table table-striped table-sm">
                <thead class="thead">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Murid</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Peserta Dari</th>
                        <th scope="col">Ikut Kelas?</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <td>{{$loop->iteration}}</td>

                        <td>{{$member->nama_murid}}</td>
                        <td>{{$member->tipe}}</td>

                        @php

                        $total_attendance = ryrParticipants::where('id_member',
                        $member->id)->where('grup','Schedule')->count();

                        $groups = ryrParticipants::where('id_member', $member->id)
                        ->where('grup', 'Template')
                        ->get();
                        @endphp

                        <td>
                            @foreach ($groups as $group)
                            {{$group->nama_kelas}}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </td>

                        <td>
                            <input type="checkbox" name="participants[]" value="{{ $member->id }}" {{
                                in_array($member->id,
                            ($preselectedParticipants ?? collect())->toArray()) ? 'checked' : '' }}>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-success mt-3">Save</button>
            <a href="/dashboard/ryr/schedules/{{ $schedule->id }}/detail" class="btn btn-danger mt-3 ml-3">Cancel</a>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let participantCount1 = 0;
    const container1 = document.getElementById('participants-container-1');
    const addButton1 = document.getElementById('add-participant-btn-1');

    addButton1.addEventListener('click', function () {
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

    let participantCount2 = {{ count($preselectedParticipants)
  }};
  const container2 = document.getElementById('participants-container-2');
  const addButton2 = document.getElementById('add-participant-btn-2');

  addButton2.addEventListener('click', function () {
    participantCount2++;

    const newParticipantField2 = `
      <table class="table table-striped table-sm">
        <thead class="thead">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Murid</th>
                <th scope="col">Tipe</th>
                <th scope="col">Join Date</th>
                <th scope="col">Total Attendance</th>
                <th scope="col">Tanggal Lahir</th>
                {{-- <th scope="col">Gender</th> --}}
                <th scope="col">Peserta Dari</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{$loop->iteration}}</td>

                <td>{{$member->nama_murid}}</td>
                <td>{{$member->tipe}}</td>
                <td>{{$member->join_date}}</td>

                @php
                $total_attendance = $participant->where('id_member', $member->id)->where('grup','Schedule')->count();

                $groups = $participant->where('id_member', $member->id)
                ->where('grup', 'Template');
                @endphp

                <td>{{$total_attendance}}</td>
                <td>{{$member->dob}}</td>
                {{-- <td>{{$member->jenis_kelamin}}</td> --}}

                <td>
                    @foreach ($groups as $group)
                    {{$group->nama_kelas}}{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </td>
                <td>
                    <form action="/dashboard/ryr/members/{{$member->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-regular fa-trash"></i>
                        </button>
                    </form>

                    <form action="/dashboard/ryr/members/{{ $member->id }}/edit" class="d-inline">
                        @csrf
                        @method('POST')
                        <!-- Not strictly necessary with `POST` method -->
                        <button class="badge bg-warning border-0" type="submit">
                            <i class="fas fa-regular fa-pen-nib"></i>
                        </button>
                    </form>

                    <form action="/dashboard/ryr/members/{{ $member->id }}" class="d-inline">
                        @csrf
                        @method('POST')
                        <!-- Not strictly necessary with `POST` method -->
                        <button class="badge bg-primary border-0" type="submit">
                            <i class="fas fa-regular fa-list"></i>
                        </button>
                    </form>

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
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

container2.insertAdjacentHTML('beforeend', newParticipantField2);

// Function to remove the participant field
function removeParticipant(id) {
    const element = document.getElementById(id);
    if (element) {
        element.remove();
    }
}
</script>

@endsection
