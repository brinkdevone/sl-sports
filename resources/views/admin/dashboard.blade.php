@extends('layouts.master')

@section('title')
    Dashboard SLS
@stop

@section('content')

    <div class="row">

        <div class="col-lg-6 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
                </div class="table-full-width">
                <div class="card-body">
                    <div>
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th class="text-center">Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dakota Rice</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                    <td class="text-center">$36,738</td>
                                </tr>
                                <tr>
                                    <td>Minerva Hooper</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                    <td class="text-center">$23,789</td>
                                </tr>
                                <tr>
                                    <td>Sage Rodriguez</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                    <td class="text-center">$56,142</td>
                                </tr>
                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-center">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-center">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-center">$78,615</td>
                                </tr>
                                <tr>
                                    <td>Jon Porter</td>
                                    <td>Portugal</td>
                                    <td>Gloucester</td>
                                    <td class="text-center">$98,615</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card card-deshtask">
                <div class="card-header ">
                    <h6 class="title d-inline">Tasks</h6>
                    {{--  <form action="" method="POST">
                          <input type="search">
                          <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                      </form>--}}
                </div>
                <div class="card-body ">
                    <div class="table-full-width">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="title">test</h4>
                                    <p class="text-muted">test</p>
                                </td>
                                <td class="td-actions text-right">
                                    <a href="#" type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Shipments</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Daily Sales</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Tasks</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop
