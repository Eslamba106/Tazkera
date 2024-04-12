<x-user.dashboard-layout title="اضافة تذكرة">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">التذاكر</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">التذاكر</li>
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
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافة تذكرة</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('user.dashboard.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الموضوع</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الرسالة</label>
                                        <textarea name="message" class="form-control" id="validationCustom01" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">درجة الاهمية</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="important_degree">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">الحالة</label>
                                        <select name="status" class="form-control form-select">
                                            <option value="open">مفتوح</option>
                                            <option value="closed">مغلق</option>
                                            <option value="wating">في الانتظار</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">نوع التذكرة</label>
                                        <select name="type" class="form-control form-select">
                                            <option value="question">استفسار</option>
                                            <option value="problem">مشكلة</option>
                                            <option value="add">اضافة</option>
                                            <option value="edit">تعديل</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">مرفقات</label>
                                        <input class="form-control" id="validationCustom01" type="file" name="images[]" multiple>
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
</x-user.dashboard-layout>