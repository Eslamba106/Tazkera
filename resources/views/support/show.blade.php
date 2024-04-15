<x-support.dashboard-layout title="لوحة تحكم">
    <x-slot:breadcrumb>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الرئيسية</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active">الرئيسية</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    <x-alert type="success" />
    <x-alert type="info" />
    <x-alert type="fail" />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">بيانات التذكرة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="width30">الاسم</td>
                                <td>{{ $group->name }}</td>
                            </tr>
                            <tr>
                                <td class="width30">المستخدمين</td>
                                <td>@foreach ($users as $user)
                                    <a href="{{ route('chat_form' , $user->id) }}">{{ $user->name }}</a>
                                    
                                @endforeach</td>
                            </tr>


                            <tr>
                                <td class="width30">تاريخ اخر تحديث</td>
                                <td>
                                    {{ $group->created_at }}
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-support.dashboard-layout>
