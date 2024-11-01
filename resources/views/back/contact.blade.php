@extends('back.app')

@section('title', 'Dashboard - Page des contacts')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Contacts</h4>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}">
                                            {{ $contact->email }}
                                        </a>
                                    </td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        @php $time = $contact->created_at @endphp
                                        {{ $time->isoFormat('LL') }}
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                                    <form action="{{ route('contact.destroy', $contact) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-link" type="submit">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
