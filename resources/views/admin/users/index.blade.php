<x-dashboard.dashboard-layout title="العملاء">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">العملاء</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">العملاء</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    
    <x-alert type="success"/>
    <x-alert type="info"/>
    <x-alert type="fail"/>
<a href="{{ route('admin.users.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >اضافة عميل</button>
    {{-- <button class="btn ml-5 mb-2 btn-dark" >{{ __('dashboard/category/category.add_category') }}</button> --}}
</a>
{{-- <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
    <x-form.input name="name" placeholder="الاسم" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form> --}}
<table class="table">
    <thead>
        <tr>
            <th>الكود</th>
            <th>الاسم</th>
            <th>الايميل</th>
            <th>الهاتف</th>
            <th>العنوان</th>
            <th>المجموعة</th>
            <th>اضيف في</th>
            <th colspan="2">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->group->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $item->id) }}"
                    {{-- <a href="{{ route('admin.categories.edit', $item->id) }}" --}}
                        class="btn btn-sm btn-outline-success">تعديل</a>
                </td>
                <td>
                    {{-- <form action="{{ route('admin.categories.delete', $item->id) }}" method="post"> --}}
                    <form action="{{ route('admin.users.delete', $item->id) }}" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        {{-- @method('delete') --}}
                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                    </form>
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

{{ $users->withQueryString()->appends(['search' => 1])->links() }}
</x-back-office.dashboard-layout>