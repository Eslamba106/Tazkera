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
<x-alert type="success"/>
<x-alert type="info"/>
<x-alert type="fail"/>
<a href="{{ route('user.dashboard.create') }}" >
<button class="btn ml-5 mb-2 btn-dark" >اضافة تذكرة</button>
</a>

 <table class="table">

<thead>
	<tr>
		<th>الكود</th>
		<th>الموضوع</th>
		<th>الحالة</th>
		<th>النوع</th>
		<th>اضيف في</th>
		<th colspan="2">العمليات</th>
	</tr>
</thead>
<tbody>
	@forelse ($items as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->subject }}</td>
			<td>{{ $item->status }}</td>
			<td>{{ $item->type }}</td>
			<td>{{ $item->created_at }}</td>
			<td>
				<a href="{{ route('user.dashboard.edit', $item->id) }}"
					class="btn btn-sm btn-outline-success">تعديل</a>
			</td>
			<td>
				<a href="{{ route('user.dashboard.show', $item->id) }}"
					class="btn btn-sm btn-outline-info">عرض</a>
			</td>
			<td>
				<form action="{{ route('user.dashboard.delete', $item->id) }}" method="post">
					@csrf
					{{-- Form Method Spoofing --}}
					<button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
				</form>
			</td>
		</tr>
	@empty
		<tr>
			<td colspan="8">لا يوجد تذكرة</td>
		</tr>
	@endforelse

</tbody>
</table>

{{ $items->withQueryString()->appends(['search' => 1])->links() }}
</x-user.dashboard-layout>