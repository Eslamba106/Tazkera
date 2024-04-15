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
<x-alert type="success"/>
<x-alert type="info"/>
<x-alert type="fail"/>


 <table class="table">

<thead>
	<tr>
		<th>الكود</th>
		<th>الاسم</th>
		{{-- <th>الايميل</th>
		<th>تواصل</th> --}}
		<th>اضيف في</th>
		<th >العمليات</th>
	</tr>
</thead>
<tbody>
	@for($i =0 ; $i<count($groups) ; $i++)
	@forelse ($groups[$i] as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->name }}</td>
			{{-- <td>{{ $item->email }}</td>
			<td>{{ $item->email }}</td> --}}
			<td>{{ $item->created_at }}</td>

			<td>
				<a href="{{ route('support_team.dashboard.show', $item->id) }}"
					class="btn btn-sm btn-outline-info">عرض</a>
			</td>

		</tr>
	@empty
		<tr>
			<td colspan="6">لا يوجد مجموعات</td>
		</tr>
	@endforelse
	@endfor
</tbody>
</table>

{{-- {{ $items->withQueryString()->appends(['search' => 1])->links() }} --}}
</x-support.dashboard-layout>