<x-dashboard.dashboard-layout title="Admin Dashboard">
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
				<!-- row -->
				<div class="row row-sm m-5">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 mr-5">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-red">فريق الدعم</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-red">عدد فريق الدعم</h4>
											{{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
											<img src="{{ asset('images/support_team.png') }}" width="60" height="60" alt="">
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-red"></i>
											<span class="text-red op-7">{{ App\Models\Support_Team::count() ?? 0 }}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1"></span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-green">المجموعات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-green">عدد المجموعات</h4>
											<img src="{{ asset('images/admin.png') }}" width="60" height="60" alt="">
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-green"></i>
											<span class="text-green op-7"> {{ App\Models\Group::count() ?? 0 }}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1"></span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-blue	">المستخدمين</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-blue">عدد المستخدمين</h4>
											<img src="{{ asset('images/user.png') }}" width="60" height="60" alt="">
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-blue"></i>
											<span class="text-blue op-7"> {{ App\Models\User::count() ?? 0 }}</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1"></span>
						</div>
					</div>

				</div>
				<!-- row closed -->





		<!-- Container closed -->
</x-dashboard.dashboard-layout>