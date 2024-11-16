@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb', 'Admin Dashboard')
@section('breadcrumb-info', 'Admin Dashboard')
@section('content')
<!--begin::Content-->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl pb-4">
            <h2>Hi <span class="text-warning">Admin</span>, Welcome to Dashboard</h2>
            <!-- begin::modal -->
                <div class="adminStockModal modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog min-w-1000px" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('backend.dashboard.product_list') }}</h5>
                                <button type="button" class="adminCloseStockModal btn btn-icon btn-active-light-secondary btn btn-secondary w-30px h-30px">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="adminAddProductList modal-body h-300px scroll-y">
                                
                            </div>
                            <div class="modal-footer max-w-100px justify-content-start">
                                <div class="row w-100">
                                    <div id="stockWarning"></div>
                                    <div class="col-md-8">
                                        <input type="number" placeholder="{{ __('backend.dashboard.enter_refill_quantity') }}" name="product_quantity" id="product-quantity" class="form-control">
                                    </div>
                                   <div class="col-md-4 text-end">
                                        <button type="button" class="adminApplyProduct btn btn-primary">{{ __('backend.dashboard.apply_all_product') }}</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- begin::modal -->
            <!-- begin::modal -->
            <div class="adminQuantityModal modal" tabindex="-1" role="dialog">
                <div class="modal-dialog min-w-1000px" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('backend.dashboard.product_list') }}</h5>
                            <button type="button" class="adminCloseQuantityModal btn btn-icon btn-active-light-secondary btn btn-secondary w-30px h-30px">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                        <div class="adminProductList modal-body h-300px scroll-y">
                            
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row gy-5 g-xl-8" id="analyticCard">

                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 24 24">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">1</div>
                                <div class="fw-bold text-gray-400">Active User Last 7 Days</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card hoverable card-xl-stretch mb-xl-8" style="background-color:#009EF7">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 24 24">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">1</div>
                                <div class="fw-bold text-gray-100">Visitor Right Now</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card hoverable card-xl-stretch mb-xl-8" style="background-color:#009EF7">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 24 24">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">2</div>
                                <div class="fw-bold text-white">Page Views Last 7 Days</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card hoverable card-xl-stretch mb-5 mb-xl-8" style="background-color:#212121">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 24 24">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                    20:00
                                </div>
                                <div class="fw-bold text-white">Average Browsing Time</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>

            </div>

            <div class="row gy-5 g-xl-8">
                <div class="col-xl-3">
                    <div class="row g-4 g-xl-8" id="totalVisitorsCard">
                        <div class="col-xl-12">
                            <!--begin::Statistics Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-success">
                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 24 24">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span class="text-dark fw-bolder fs-2">23</span>
                                            <span class="text-muted fw-bold mt-1">Total Visitors</span>
                                        </div>
                                    </div>
                                    <div class="statistics-totalVisitor" data-kt-chart-color="primary" style="height: 150px;"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 4-->
                        </div>
                    </div>
                    <div class="row g-5 g-xl-8" id="totalPageView">
                        <div class="col-xl-12">
                            <!--begin::Statistics Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span class="text-dark fw-bolder fs-2">2</span>
                                            <span class="text-muted fw-bold mt-1">Total Page Views</span>
                                        </div>
                                    </div>
                                    <div class="statistics-pageview-year card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 4-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Sale This Month</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-toolbar px-6">
                            <ul class="nav" id="kt_chart_widget_11_tabs">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test1 px-4 me-1" data-bs-toggle="tab" id="sale_tab_1" href="#kt_chart_widget_11_tab_content_1">Year</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test2 px-4 me-1 active" data-bs-toggle="tab" id="sale_tab_2" href="#kt_chart_widget_11_tab_content_2">Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test3 px-4 me-1" data-bs-toggle="tab" id="sale_tab_3" href="#kt_chart_widget_11_tab_content_3">Week</a>
                                </li>
                            </ul>
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Chart-->
                            <div class="tab-content">
                                    <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                                    <!--begin::Statistics-->
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <div id="sale_chart_1" class="ms-n5 me-n3 min-h-auto w-100" style="height: 400px"></div>
                                    <!--end::Chart-->
                                </div> 
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                                    <!--begin::Chart-->
                                    <div id="sale_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 400px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                                    <!--begin::Chart-->
                                    <div id="sale_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 400px"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Tab pane-->
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    
                </div>
                <div class="col-xl-3" id="visitedDevicesChart">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Devices used to access the site</span>
                                {{-- <span class="text-muted fw-bold mt-1">322 Total Visitors</span> --}}
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1"  >
                                <div id="device_category" data-kt-chart-color="success" style="height: 200px"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            {{-- <x-backend.overall-this-month /> <!-- This month section -->
            
            <x-backend.order-dashboard />  <!-- latest order -->

            <x-backend.top-best-seller-dashboard />  <!-- popular products -->

            <x-backend.popular-search-coupon />  <!-- popular search and coupon --> --}}
                
        </div>
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
<script src="{{ asset('backend/js/admin-dashboard.js') }}"></script>
<script>


    $(document).ready(function(){

        getAnalyticHtml('#analyticCard','analytic');
        getAnalyticHtml('#totalVisitorsCard','totalVisitors');
        getAnalyticHtml('#totalPageView','totalPageView');
        // getAnalyticHtml('#visitedDevicesChart','visitedDevices');
        
        function getAnalyticHtml(idName,type){
            $.ajax({
                url     : '/admin/get-analytic-html',
                type    : 'GET',
                dataType: 'json',
                data: {
                    type: type,
                },
                success : function (resp) {
                    $(idName).html(resp.html);
                },
                error: function(resp) {
                    console.log(resp)
                }
            });
        }

       
    });


    $(document).ready(function(){
        var e = document.querySelectorAll(".statistics-totalVisitor");
        [].slice.call(e).map((function(e) {
            var t=parseInt(KTUtil.css(e,"height"));
            if(e) {
                var a=e.getAttribute("data-kt-chart-color"),
                o=KTUtil.getCssVariableValue("--bs-gray-800"),
                s=KTUtil.getCssVariableValue("--bs-"+a),
                r=KTUtil.getCssVariableValue("--bs-light-"+a);

                new ApexCharts(e, {
                    series:[{
                        name:"Visitors",
                        data:20
                    }],
                    chart:{
                        fontFamily:"inherit",
                        type:"area",
                        height:t,
                        toolbar:{show:!1},
                        zoom:{enabled:!1},
                        sparkline:{enabled:!0}
                    },
                    plotOptions:{},
                    legend:{show:!1},
                    dataLabels:{enabled:!1},
                    fill:{type:"solid",opacity:.3},
                    stroke:{
                        curve:"smooth",show:!0,width:3,colors:[s]
                    },
                    xaxis:{
                        categories:20,
                        axisBorder:{show:!1},
                        axisTicks:{show:!1},
                        labels:{show:!1,style:{colors:o,fontSize:"12px"}},
                        crosshairs:{show:!1,position:"front",
                        stroke:{color:"#E4E6EF",width:1,dashArray:3}},
                        tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}
                    },
                    yaxis:{
                        min:0,max:60,labels:{show:!1,style:{colors:o,fontSize:"12px"}}
                    },
                    states:{
                        normal:{filter:{type:"none",value:0}
                        },
                        hover:{
                            filter:{type:"none",value:0}
                        },
                        active:{
                            allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}
                        }
                    },
                    tooltip:{
                        style:{fontSize:"12px"},
                        y:{formatter:function(e){return e}}
                    },
                    colors:[s],markers:{colors:[s],strokeColor:[r],strokeWidth:3}
                }).render()
            }
        }));
    });


    $(document).ready(function(){
        var e=document.querySelectorAll(".statistics-pageview-year");
        [].slice.call(e).map((function(e){
            var t=parseInt(KTUtil.css(e,"height"));
            if(e) {
                var a=e.getAttribute("data-kt-chart-color"),
                o=KTUtil.getCssVariableValue("--bs-gray-800"),
                s=KTUtil.getCssVariableValue("--bs-"+a),
                r=KTUtil.getCssVariableValue("--bs-light-"+a);
                new ApexCharts(e,
                    {
                series:[{
                    name:"PageViews",
                    data:20
                }],
                chart:{
                    fontFamily:"inherit",
                    type:"area",
                    height:t,
                    toolbar:{show:!1},
                    zoom:{enabled:!1},
                    sparkline:{enabled:!0}
                },
                plotOptions:{},
                legend:{show:!1},
                dataLabels:{enabled:!1},
                fill:{type:"solid",opacity:.3},
                stroke:{
                    curve:"smooth",show:!0,width:3,colors:[s]
                },
                xaxis:{
                    categories:20,
                    axisBorder:{show:!1},
                    axisTicks:{show:!1},
                    labels:{show:!1,style:{colors:o,fontSize:"12px"}},
                    crosshairs:{show:!1,position:"front",
                    stroke:{color:"#E4E6EF",width:1,dashArray:3}},
                    tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}
                },
                yaxis:{
                    min:0,max:100,labels:{show:!1,style:{colors:o,fontSize:"12px"}}
                },
                states:{
                    normal:{filter:{type:"none",value:0}
                    },
                    hover:{
                        filter:{type:"none",value:0}
                    },
                    active:{
                        allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}
                    }
                },
                tooltip:{
                    style:{fontSize:"12px"},
                    y:{formatter:function(e){return e}}
                },
                colors:[s],markers:{colors:[s],strokeColor:[r],strokeWidth:3}}).render()
            }
        }));
    });
    
   

</script>
<script>
    $(document).ready(function(){
   var KTChartsWidget11 = function () {
       // Private methods
       var initChart = function(tabSelector, chartSelector, data, chatDate,initByDefault) {
           var element = document.querySelector(chartSelector);
           var height = parseInt(KTUtil.css(element, 'height'));
           if (!element) {
               return;
           }        
           var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
           var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
           var baseColor = KTUtil.getCssVariableValue('--bs-success');
           var lightColor = KTUtil.getCssVariableValue('--bs-success');
   
           var options = {
               series: [{
                   name: 'Sales',
                   data: data
               }],            
               chart: {
                   fontFamily: 'inherit',
                   type: 'area',
                   height: height,
                   toolbar: {
                       show: false
                   }
               },
               plotOptions: {
   
               },
               legend: {
                   show: false
               },
               dataLabels: {
                   enabled: true
               },
               fill: {
                   type: "gradient",
                   gradient: {
                   shadeIntensity: 1,
                   opacityFrom: 0.3,
                   opacityTo: 0.7,
                   stops: [0, 90, 100]
                   }
               },
               stroke: {
                   curve: 'smooth',
                   show: true,
                   width: 3,
                   colors: [baseColor]
               },
               xaxis: {
                   categories: chatDate,
                   axisBorder: {
                       show: false,
                   },
                   axisTicks: {
                       show: false
                   },
                   tickAmount: 12,
                   labels: {
                       rotate: 0,
                       rotateAlways: true,
                       style: {
                           colors: labelColor,
                           fontSize: '13px'
                       }
                   },
                   crosshairs: {
                       position: 'front',
                       stroke: {
                           color: baseColor,
                           width: 1,
                           dashArray: 3
                       }
                   },
                   tooltip: {
                       enabled: true,
                       formatter: undefined,
                       offsetY: 0,
                       style: {
                           fontSize: '13px'
                       }
                   }
               },
               yaxis: {
                   tickAmount: 5,
                   // max: 50,
                   min: 0,
                   labels: {
                       style: {
                           colors: labelColor,
                           fontSize: '13px'
                       }                     
                   }
               },
               states: {
                   normal: {
                       filter: {
                           type: 'none',
                           value: 0
                       }
                   },
                   hover: {
                       filter: {
                           type: 'none',
                           value: 0
                       }
                   },
                   active: {
                       allowMultipleDataPointsSelection: false,
                       filter: {
                           type: 'none',
                           value: 0
                       }
                   }
               },
               tooltip: {
                   style: {
                       fontSize: '12px'
                   },
                   y: {
                       formatter: function (val) {
                           return + val  
                       }
                   }
               },
               colors: [lightColor],
               grid: {
                   borderColor: borderColor,
                   strokeDashArray: 4,
                   yaxis: {
                       lines: {
                           show: true
                       }
                   }
               },
               markers: {
                   strokeColor: baseColor,
                   strokeWidth: 3
               }
           };
   
           var chart = new ApexCharts(element, options);
           var init = false;
           var tab = document.querySelector(tabSelector);
           if (initByDefault === true) {
               chart.render();
               init = true;
           }        
   
           tab.addEventListener('shown.bs.tab', function (event) {
               if (init == false) {
                   chart.render();
                   init = true;
               }
           })   
       }
   
       // Public methods
       return {
           init: function () { 
               initChart('#sale_tab_1', '#sale_chart_1', {!! json_encode($orderYearSale) !!},{!! json_encode($orderYear)!!}, false);
               initChart('#sale_tab_2', '#sale_chart_2', {!! json_encode($orderMonthSale) !!},{!! json_encode($orderMonth)!!}, true); 
               initChart('#sale_tab_3', '#sale_chart_3', {!! json_encode($orderWeekSale) !!},{!! json_encode($orderWeek)!!}, false); 
           }   
       }
   }();
   
   // Webpack support
   if (typeof module !== 'undefined') {
       module.exports = KTChartsWidget11;
   }
   
   // On document ready
   KTUtil.onDOMContentLoaded(function() {
       KTChartsWidget11.init();
   });
})
</script>
<script>
    $(document).ready(function(){
    var e=document.getElementById("device_category");
    var t=parseInt(KTUtil.css(e,"height"));
    if(e) {
        var a=e.getAttribute("data-kt-chart-color"),
        o=KTUtil.getCssVariableValue("--bs-"+a),
        s=KTUtil.getCssVariableValue("--bs-light-"+a),
        r=KTUtil.getCssVariableValue("--bs-gray-700");
        var options = {
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                            },
                            value: {
                                show: true,
                            },
                            total:{
                                show:true,
                            }
                        }
                    }
                }
            },
            chart: {
                height: 380,
                width: "100%",
                type: "donut",
            },
            series: {!! json_encode($userCount) !!},
            labels: {!! json_encode($deviceName) !!},
            legend: {
                show: true,
                position: 'bottom', // Position the legend at the bottom
                horizontalAlign: 'center', // Center-align the legend items
                markers: {
                    // Customize the legend colors if needed
                }
            },
            tooltip: {
                enabled: true,
                fillSeriesColor: true
            },
            colors: {!! json_encode($colourCode) !!} //Add this line
        };
    };
   var chart = new ApexCharts(e, options);
   chart.render();
});

</script>
@endpush