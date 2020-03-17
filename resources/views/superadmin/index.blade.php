@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <style>
    .table-container {
        height: 55rem;
        overflow:auto;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-12">
                        <h4 class="page-title breadcrumb">Գլխավոր</h4>
                    </div>
                </div>
                <div class="row">
                    <p id="errorMessageUserDelete"></p>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="container">
                            <div class="col-md-6">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-6 table-container">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span>Ամսաթիվ</span> </th>
                                            <th scope="col"><span>Անուն</span> </th>
                                            <th scope="col"><span>Հասցե</span> </th>
                                            <th scope="col"><span>էլ հասցե</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
{{--                                        @foreach($companies as $company)--}}
{{--                                            <tr>--}}
{{--                                                <th scope="row">{{$company->date}}</th>--}}
{{--                                                <td>{{$company->name}}</td>--}}
{{--                                                <td>{{$company->address}}</td>--}}
{{--                                                <td>{{$company->email}}</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['ss'],
                            datasets: [{
                                label: '# of Votes',
                                data: [1, 1, 1, 1, 1, 2,1, 1, 1, 1, 1, 2],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop