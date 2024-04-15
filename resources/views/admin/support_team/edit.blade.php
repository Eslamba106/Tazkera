<x-dashboard.dashboard-layout title="تعديل العضو : {{ $member->name }}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">تعديل عضو</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">فريق الدعم</li>
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
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل عضو</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.support_team.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الاسم</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name" value="{{ old('name', $member->name )}}">
                                        <input class="form-control" id="validationCustom01" type="hidden" name="id" value="{{ old('id', $member->id )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">البريد الالكتروني</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="email"
                                            value="{{ old('email', $member->email )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">كلمة السر</label>
                                        <input class="form-control" id="validationCustom01" type="password" name="password"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">المجموعات التابعة</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="groups"
                                            value="{{ old('groups', $groups )}}"
                                            >
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">حفظ</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('styles')
    <link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('scripts')
    <script src="{{ asset('js/dist/tagify.js') }}"></script>
    <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
    <script>
        var inputElm = document.querySelector('[name=groups]');
        tagify = new Tagify (inputElm);
    </script>
    @endpush
</x-back-office.dashboard-layout>