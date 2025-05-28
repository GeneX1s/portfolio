@extends('dashboard.layouts.main')

@section('container')


@use('App\Models\RYR\ryrParticipants')
@stack('scripts')

<div class="col-lg-8">
    <h1 class="h2">Edit {{ $schedule->class_name }}, {{ $schedule->tanggal }}</h1>

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
                    <input type="string" class="form-control" id="nama" name="nama" value="{{ request('nama') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
            </div>
        </div>
    </form>
    <form method="post" action="/dashboard/ryr/schedules/{{$schedule->id}}/participant" class="mb-5"
        enctype="multipart/form-data">
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Tipe</th>
                                <th>Peserta Dari</th>
                                <th>Ikut Kelas?</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Tipe</th>
                                <th>Peserta Dari</th>
                                <th>Ikut Kelas?</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->nama_murid }}</td>
                                <td>{{ $member->tipe }}</td>
                                @php
                                $groups = ryrParticipants::where('id_member', $member->id)
                                ->where('grup', 'Template')
                                ->get();
                                @endphp
                                <td>
                                    @foreach ($groups as $group)
                                    {{ $group->nama_kelas }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </td>
                                <td>
                                    <input type="checkbox" name="participants[]" value="{{ $member->id }}" {{
                                        in_array($member->id, old('participants', $checkedParticipants ?? [])) ?
                                    'checked' :
                                    '' }}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>

    <hr class="solid">

    <h2>
        Murid Baru:
    </h2>

    <form method="post" action="/dashboard/ryr/schedules/{{$schedule->id}}/participant" class="mb-5"
        enctype="multipart/form-data">
        @csrf

        <div id="participants-container-1">
            <!-- Participant fields for first section will be added here -->
        </div>

        <button type="button" id="add-participant-btn-1" class="btn btn-primary mb-3">+</button>

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
