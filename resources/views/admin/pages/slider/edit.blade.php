<x-layout bodyClass="g-sidenav-show  bg-gray-200">


    <x-navbars.sidebar activePage="slider"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Add Slider"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                                <h6 class="text-white mx-3">
                                    Add Slider
                                </h6>
                            </div>
                        </div>

                        <button class="btn btn-secondary m-3 col-md-1" id="backButton">Back</button>
                        <script>
                            // JavaScript
                            const backButton = document.getElementById('backButton');

                            backButton.addEventListener('click', goBack);

                            function goBack() {
                                history.back();
                            }
                        </script>


                        <div class="card-body p-3 w-100 w-sm-75 w-md-50 mx-auto">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">
                                        {{ Session::get('status') }}
                                    </span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form method='POST' action='{{ route('slider.update', $slider->id) }}'
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!------------- First Row -------------->
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <input type="text" name="text" placeholder="Text"
                                            class="form-control border border-2 p-2" value="{{ $slider->text }}">
                                        @error('text')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <!------------- First Row -------------->

                                    <!------------- Second Row ------------->
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                            <input class="form-check-input" type="checkbox" name="switchValue"
                                                value="1" {{ $slider->status == 0 ? 'checked' : '' }}
                                                id="flexSwitchCheckDefault">
                                        </div>
                                        @error('switchValue')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <!------------- Second Row ------------->

                                    <!------------- Third Row -------------->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Slider Image</label>
                                        <img style="width:150px; height:70px;" class="img"
                                            src="{{ asset('uploads/slider/' . $slider->photo) }}" alt="">
                                        <input class="form-control border border-2 p-2" type="file" name="photo"
                                            id="" accept="image/jpeg, image/png, image/jpg">
                                        @error('photo')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <!------------- Third Row -------------->

                                    <!------------- Forth Row -------------->
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="link" placeholder="Link"
                                            class="form-control border border-2 p-2" value="{{ $slider->link }}">
                                        @error('link')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <!------------- Forth Row -------------->

                                    <!------------- Fifth Row -------------->
                                    <div class="mb-3">
                                        <label class="form-label">Sub Heading</label>
                                        <input type="text" name="subheading" placeholder="Sub Heading"
                                            class="form-control border border-2 p-2" value="{{ $slider->subheading }}">
                                        @error('subheading')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <!------------- Fifth Row -------------->

                                </div>
                                <button type="submit" class="btn bg-gradient-dark">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
