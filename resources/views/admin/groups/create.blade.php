<x-dashboard.dashboard-layout title="اضافة مجموعة">
    <x-slot:breadcrumb>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المجموعات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active">المجموعات</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row product adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافة مجموعة</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                {!! Form::open(['route' => 'admin.groups.store', 'method' => 'POST']) !!}

                                {{-- <form action="{{ route('admin.groups.store') }}" method="POST"
                                    enctype="multipart/form-data"> --}}
                                {{-- @csrf --}}
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">الاسم</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">عضو الدعم المسؤول</label>
                                    @foreach ($team as $value)
                                    <label
                                        style="font-size: 16px;">{{ Form::checkbox('support_team_id[]', $value->id, false, ['class' => 'name']) }}
                                        {{ $value->name }}</label>
                                @endforeach
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" style="background-color: #602D8D ; color:white"
                                        type="submit">حفظ</button>
                                </div>


                                {{-- </form> --}}
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- @push('styles')
        <link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('scripts')
        <script src="{{ asset('js/dist/tagify.js') }}"></script>
        <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
        <script>
            var input = document.querySelector('input[name=tags-disabled-user-input]');
            // var team =  JSON.parse('{{ json_encode($team ) }}');
            var app = @json($team);
            // var team = {{ $team }};
            console.log(typeof(app));
            new Tagify(input, {
                whitelist:  app,
                userInput: false
            })
        </script>
    @endpush --}}

    </x-back-office.dashboard-layout>
