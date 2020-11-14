<x-admin-master>
    @section('title')
    <title>Sadakun - Dashboard</title>
    @endsection
    @section('styles')
    
    @endsection
    @section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-4 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-1 px-sm-4 mt-2 mb-2 rounded-circle" style="width: 12rem; height: 9rem;" src="{{auth()->user()->avatar}}" alt="">
                        </div>
                        <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a> -->
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <span>User Information</span>
                            <hr>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><b>Username :</b></small></p> 
                            <p><small>{{auth()->user()->username}}</small></p> 
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><b>Role :</b></small></p> 
                            <p><small>{{$role}}</small></p> 
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><b>Email :</b></small></p> 
                            <p><small>{{auth()->user()->email}}</small></p> 
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><b>Fullname :</b></small></p> 
                            <p><small>{{Str::ucfirst(auth()->user()->name)}} {{Str::ucfirst(auth()->user()->last_name)}}</small></p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="row">
                    <!-- User Registered -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                        <a href="{{route('users.index')}}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </a>
                        </div>
                    </div>

                    <!-- All Post -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="{{route('post.index')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Posts</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$posts->count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <!-- Disabled Comments -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                        <a href="{{route('comments.index')}}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Disabled Comments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comments->where("isActive", 0)->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </a>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Visitors</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comments->where("isActive", 0)->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Posts This Month</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalCurrentPost}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Comments This Month</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalCurrentComment}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Trending Post</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar" id="trending_post_chart"></div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="/vendor/highcharts/code/highcharts.js"></script>
    <script>
        Highcharts.chart('trending_post_chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Trending Posts'
            },
            subtitle: {
                text: 'data based on total posts created'
            },
            xAxis: {
                categories: {!!json_encode($chartMonths)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Posts'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} articles</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Posts',
                data: {!!json_encode($chartPostCount)!!}

            }]
        });
    </script>
    @endsection
</x-admin-master>