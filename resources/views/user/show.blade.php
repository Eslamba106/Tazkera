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
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات الضبط العام</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <td class="width30">الموضوع</td>
                    <td>{{ $item->subject }}</td>
                </tr>
                <tr>
                    <td class="width30">الرسالة</td>
                    <td>{{ $item->message }}</td>
                </tr>
                <tr>
                    <td class="width30">حالة التذكرة</td>
                    <td>@if ($item->status == 'open') مفتوح @elseif ($item->status == 'closed') مغلق  @else في الانتظار @endif</td>
                </tr>
                <tr>
                    <td class="width30">نوع التذكرة</td>
                    <td>@if ($item->type == 'question') استفسار @elseif ($item->type == 'problem') مشكلة @elseif ($item->type == 'add') اضافة @else تعديل @endif</td>
                </tr>
                <tr>
                    <td class="width30">درجة الاهمية</td>
                    <td>{{ $item->important_degree }}</td>
                </tr>
                {{-- <tr>
                    <td class="width30"></td>
                    <td>ss</td>
                </tr> --}}

                <tr>
                    <td class="width30">المرفقات</td>
                    <td>
                        @foreach ($attachments as $attachment)

                        <div class="image">
                            <img src="{{ asset('Attachments/'.$attachment->path) }}" alt="لوجو الشركة" class="custom_img">
                        </div>
                        @endforeach

                    </td>
                </tr>
                <tr>
                    <td class="width30">تاريخ اخر تحديث</td>
                    <td>
						sssd
                        {{-- @if ($data->updated_by > 0 and $data->updated_by != null)
                            @php
                                $data_time = new DateTime($data->updated_at);
                                $date = $data_time->format('Y-m-d');
                                $time = $data_time->format('H:i');
                                $newDate = date('A' , strtotime($time));
                                $newDateType = (($newDate == 'AM' ? "صباحا" : "مساء"));
                            @endphp
                            {{ $date  }}
                            {{ $time }}
                            {{ $newDateType }}
                            {{ $data->updated_by_admin }}
                        @else 
                        لا يوجد تحديث
                        @endif --}}
                    </td>
                </tr>
                </thead>

              </table>


        </div>
      </div>
    </div>
</div>


</x-user.dashboard-layout>