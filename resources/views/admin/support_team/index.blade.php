<x-dashboard.dashboard-layout title="الدعم الفني">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">فريق الدعم</h1>
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
    

<a href="{{ route('admin.support_team.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >اضافة عضو</button>
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
            {{-- <th>{{ __('dashboard/category/category.main_category') }}</th>
            {{-- <th>Status</th> --}}
            <th>اضيف في</th>
            <th colspan="2">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($team as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                {{-- <td>{{ $item->parent_name ?? "Main" }}</td> --}}
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href=""
                    {{-- <a href="{{ route('admin.categories.edit', $item->id) }}" --}}
                        class="btn btn-sm btn-outline-success">تعديل</a>
                </td>
                <td>
                    {{-- <form action="{{ route('admin.categories.delete', $item->id) }}" method="post"> --}}
                    <form action="" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        @method('delete')
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

{{ $team->withQueryString()->appends(['search' => 1])->links() }}
</x-back-office.dashboard-layout>