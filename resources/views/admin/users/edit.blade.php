<x-dashboard.dashboard-layout title="تعديل العضو : {{ $user->name }}">
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
                                <form action="{{ route('admin.users.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الاسم</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name" value="{{ old('name', $user->name )}}">
                                        <input class="form-control" id="validationCustom01" type="hidden" name="id" value="{{ old('id', $user->id )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">البريد الالكتروني</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="email"
                                        value="{{ old('email', $user->email )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">كلمة السر</label>
                                        <input class="form-control" id="validationCustom01" type="password" name="password"
                                        {{-- value="{{ old('password', $user->password )}}" --}}
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الهاتف</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="phone"
                                        value="{{ old('phone', $user->phone )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">العنوان</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="location"
                                        value="{{ old('location', $user->location )}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">المجموعة</label>
                                        <select name="group_id" class="form-control form-select">
                                            <option value=""></option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}" @selected(old('group_id' , $group->id) == $user->group_id)>{{ $group->name }}</option>
                                            @endforeach
                                        </select>
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
</x-back-office.dashboard-layout>