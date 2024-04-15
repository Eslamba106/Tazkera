<x-user.dashboard-layout title="لوحة تحكم">
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

    <table class="table">
        <thead>
            <tr>
                <th>الكود</th>
                <th>الاسم</th>
                <th>الايميل</th>
                {{-- <th>المجموعات التابعة</th> --}}
                {{-- <th>Status</th> --}}
                <th>اضيف في</th>
                <th colspan="2">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>
                        @foreach ($groups as $group)
                            {{ $group }} 
                        @endforeach
                    </td> --}}
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('chat_form', $item->id) }}" {{-- <a href="{{ route('admin.categories.edit', $item->id) }}" --}}
                            class="btn btn-sm btn-outline-success">تواصل</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="8">لا يوجد اعضاء</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>


</x-user.dashboard-layout>
