@extends('front.app')

@section('title', 'Page de contact')

@section('main_section')
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">
            Contactez nous !
        </h4>
    </div>
    <div class="bg-white border border-top-0 p-4 mb-3">
        <div class="mb-4">
            <h6 class="text-uppercase font-weight-bold">Nos contacts</h6>

            <div class="mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-map-marker-alt text-info mr-2"></i>
                    <h6 class="font-weight-bold mb-0">Notre siege</h6>
                </div>
                <p class="m-0">{{ $global_settings->address }}</p>
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-envelope-open text-info mr-2"></i>
                    <h6 class="font-weight-bold mb-0">Envoyez nous un email</h6>
                </div>
                <p class="m-0">{{ $global_settings->email }}</p>
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-phone-alt text-info mr-2"></i>
                    <h6 class="font-weight-bold mb-0">Appelez-nous</h6>
                </div>
                <p class="m-0">{{ $global_settings->phone }}</p>
            </div>
        </div>
        <h6 class="text-uppercase font-weight-bold mb-3">
            Contactez-nous
        </h6>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="name"
                            class="form-control p-4"
                            placeholder="Votre nom"
                            required="required"
                        />
                        @error('name')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="email"
                            name="email"
                            class="form-control p-4"
                            placeholder="Votre email"
                            required="required"
                        />
                        @error('email')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="subject"
                    class="form-control p-4"
                    placeholder="Sujet"
                    required="required"
                />
                @error('subject')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                  <textarea
                      class="form-control"
                      rows="4"
                      placeholder="Message"
                      required="required"
                      name="message"
                  ></textarea>
                @error('message')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button
                    class="btn btn-info font-weight-semi-bold px-4"
                    style="height: 50px"
                    type="submit"
                >
                    Envoyer un message
                </button>
            </div>
        </form>
    </div>
@endsection
