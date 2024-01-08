@extends('app.partials._layout')

@section('content')
    <div class="page-top">
        <h1 class="page-title">{{ $title }}</h1>
    </div>
    @include('app.partials._breadcrumb')
    <div class="page-content">
        @if (count($data) > 0)
            <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-table-tab" data-bs-toggle="tab" data-bs-target="#nav-table" type="button"
                    role="tab" aria-controls="nav-table" aria-selected="true">
                    Table
                </button>
                <button class="nav-link" id="nav-charts-tab" data-bs-toggle="tab" data-bs-target="#nav-charts"
                    type="button" role="tab" aria-controls="nav-charts" aria-selected="true">
                    Charts
                </button>
            </nav>
            <div class="tab-content">
                <div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab" tabindex="0">
                    <table class="c-table">
                        <thead>
                            <tr class="c-table-row">
                                <th>№</th>
                                <th>ИМЯ</th>
                                <th>НОМЕР ТЕЛ.</th>
                                <th>Услуга</th>
                                <th>АКТИВНЫЙ</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $object)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $object['full_name'] }}</td>
                                    <td>{{ $object['phone_number'] }}</td>
                                    <td>{{ $object['service']['name'][$locale] }}</td>
                                    <td>
                                        <div class="c-center">
                                            @if ($object['is_active'] == true)
                                                <span class="table-text">АКТИВНЫЙ</span>
                                            @else
                                                <span class="table-text not-active">НЕ АКТИВНЫЙ</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="events-td">
                                            {{-- <a href="{{ route('applications.edit', ['id' => $object['id']]) }}"
                                        class="event-btn edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a> --}}
                                            <a href="{{ route('applications.destroy', ['id' => $object['id']]) }}"
                                                class="event-btn delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-charts" role="tabpanel" aria-labelledby="nav-charts-tab" tabindex="0">
                    <div class="canvas">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>
        @else
            @include('app.partials._empty')
        @endif
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chart');

        const applications = {!! json_encode($data) !!}.data
        const dbservices = {!! json_encode($services) !!}

        let services = [];
        let labels = [];
        let counts = [];

        for (let i = 0; i < dbservices.length; i++) {
            count = 0;
            for (let j = 0; j < applications.length; j++) {
                if (dbservices[i].id === applications[j].service.id) count++
            }
            dbservices[i]['applications_count'] = count;
            services = dbservices;
        }

        services.forEach(service => {
            labels.push(service.name.{{ $locale }})
            counts.push(service.applications_count);
        });

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: '# заявок',
                    data: counts,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
