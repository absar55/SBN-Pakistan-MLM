
<?php
$tid = filter_input(INPUT_POST, 'tid');
$wallet = filter_input(INPUT_POST, 'wallet');
$account_number = filter_input(INPUT_POST, 'account_number');
$amount = filter_input(INPUT_POST, 'amount');



  session_start(); 

    
  if(!isset($_SESSION['color'])){
    header('location:../login.php');
  }

  

$email1= $_SESSION['email'];
$host = "serverxyz";
$dbusername = "sbn";
$dbpassword = "passwordxyz";
$dbname = "xyzabc";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error())
    {
      die('Connect Error ('. mysqli_connect_errno() .') '
     . mysqli_connect_error());
    }
    else
    {








        

      $query = "SELECT * FROM accounts WHERE email = '$email1'";
      $run_query = mysqli_query($conn, $query);
      
        $row = mysqli_fetch_assoc($run_query);
   

        $name=$row["username"];
        $balance=$row["balance"];
        $deposit_fee=$row["deposit_fee"];

        $role=$row["role"];


        if ($role=="admin")
        {
          header('location:../Admin/Admin.php');
        
        }
        
        

        $paid=$row["paid"];

        if ($paid==1)
        {
              header('location:index.php');



        }




        if ((!empty($tid)) && (!empty($wallet)) && (!empty($account_number)) && (!empty($amount))) 
        {


              $sql = "INSERT INTO deposit (email, tid, wallet, account_number, amount)
              values ('$email1','$tid', '$wallet', '$account_number', '$amount')";
              $conn->query($sql);


              $key=1;

            


        }



  





    }




  
   

?>



















<!DOCTYPE html>
<html lang="en" class="" style="--vh: 6px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Award Clicks - Affliate Dashboard v1</title>
    <link rel="icon" type="image/png" href="./files/favicon.png">

    <link rel="stylesheet" href="./files/app.css">

    <script src="./files/app.js.download" defer=""></script>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="./files/css2" rel="stylesheet">
    <script>
      /**
       * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
       */
      localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>
  <style id="apexcharts-css">@keyframes opaque {
  0% {
      opacity: 0
  }

  to {
      opacity: 1
  }
}

@keyframes resizeanim {
  0%,to {
      opacity: 0
  }
}

.apexcharts-canvas {
  position: relative;
  user-select: none
}

.apexcharts-canvas ::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 6px
}

.apexcharts-canvas ::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0,0,0,.5);
  box-shadow: 0 0 1px rgba(255,255,255,.5);
  -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5)
}

.apexcharts-inner {
  position: relative
}

.apexcharts-text tspan {
  font-family: inherit
}

.legend-mouseover-inactive {
  transition: .15s ease all;
  opacity: .2
}

.apexcharts-legend-text {
  padding-left: 15px;
  margin-left: -15px;
}

.apexcharts-series-collapsed {
  opacity: 0
}

.apexcharts-tooltip {
  border-radius: 5px;
  box-shadow: 2px 2px 6px -4px #999;
  cursor: default;
  font-size: 14px;
  left: 62px;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  top: 20px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  white-space: nowrap;
  z-index: 12;
  transition: .15s ease all
}

.apexcharts-tooltip.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-tooltip.apexcharts-theme-light {
  border: 1px solid #e3e3e3;
  background: rgba(255,255,255,.96)
}

.apexcharts-tooltip.apexcharts-theme-dark {
  color: #fff;
  background: rgba(30,30,30,.8)
}

.apexcharts-tooltip * {
  font-family: inherit
}

.apexcharts-tooltip-title {
  padding: 6px;
  font-size: 15px;
  margin-bottom: 4px
}

.apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
  background: #eceff1;
  border-bottom: 1px solid #ddd
}

.apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
  background: rgba(0,0,0,.7);
  border-bottom: 1px solid #333
}

.apexcharts-tooltip-text-goals-value,.apexcharts-tooltip-text-y-value,.apexcharts-tooltip-text-z-value {
  display: inline-block;
  margin-left: 5px;
  font-weight: 600
}

.apexcharts-tooltip-text-goals-label:empty,.apexcharts-tooltip-text-goals-value:empty,.apexcharts-tooltip-text-y-label:empty,.apexcharts-tooltip-text-y-value:empty,.apexcharts-tooltip-text-z-value:empty,.apexcharts-tooltip-title:empty {
  display: none
}

.apexcharts-tooltip-text-goals-label,.apexcharts-tooltip-text-goals-value {
  padding: 6px 0 5px
}

.apexcharts-tooltip-goals-group,.apexcharts-tooltip-text-goals-label,.apexcharts-tooltip-text-goals-value {
  display: flex
}

.apexcharts-tooltip-text-goals-label:not(:empty),.apexcharts-tooltip-text-goals-value:not(:empty) {
  margin-top: -6px
}

.apexcharts-tooltip-marker {
  width: 12px;
  height: 12px;
  position: relative;
  top: 0;
  margin-right: 10px;
  border-radius: 50%
}

.apexcharts-tooltip-series-group {
  padding: 0 10px;
  display: none;
  text-align: left;
  justify-content: left;
  align-items: center
}

.apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
  opacity: 1
}

.apexcharts-tooltip-series-group.apexcharts-active,.apexcharts-tooltip-series-group:last-child {
  padding-bottom: 4px
}

.apexcharts-tooltip-series-group-hidden {
  opacity: 0;
  height: 0;
  line-height: 0;
  padding: 0!important
}

.apexcharts-tooltip-y-group {
  padding: 6px 0 5px
}

.apexcharts-custom-tooltip,.apexcharts-tooltip-box {
  padding: 4px 8px
}

.apexcharts-tooltip-boxPlot {
  display: flex;
  flex-direction: column-reverse
}

.apexcharts-tooltip-box>div {
  margin: 4px 0
}

.apexcharts-tooltip-box span.value {
  font-weight: 700
}

.apexcharts-tooltip-rangebar {
  padding: 5px 8px
}

.apexcharts-tooltip-rangebar .category {
  font-weight: 600;
  color: #777
}

.apexcharts-tooltip-rangebar .series-name {
  font-weight: 700;
  display: block;
  margin-bottom: 5px
}

.apexcharts-xaxistooltip,.apexcharts-yaxistooltip {
  opacity: 0;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #eceff1;
  border: 1px solid #90a4ae
}

.apexcharts-xaxistooltip {
  padding: 9px 10px;
  transition: .15s ease all
}

.apexcharts-xaxistooltip.apexcharts-theme-dark {
  background: rgba(0,0,0,.7);
  border: 1px solid rgba(0,0,0,.5);
  color: #fff
}

.apexcharts-xaxistooltip:after,.apexcharts-xaxistooltip:before {
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none
}

.apexcharts-xaxistooltip:after {
  border-color: transparent;
  border-width: 6px;
  margin-left: -6px
}

.apexcharts-xaxistooltip:before {
  border-color: transparent;
  border-width: 7px;
  margin-left: -7px
}

.apexcharts-xaxistooltip-bottom:after,.apexcharts-xaxistooltip-bottom:before {
  bottom: 100%
}

.apexcharts-xaxistooltip-top:after,.apexcharts-xaxistooltip-top:before {
  top: 100%
}

.apexcharts-xaxistooltip-bottom:after {
  border-bottom-color: #eceff1
}

.apexcharts-xaxistooltip-bottom:before {
  border-bottom-color: #90a4ae
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
  border-bottom-color: rgba(0,0,0,.5)
}

.apexcharts-xaxistooltip-top:after {
  border-top-color: #eceff1
}

.apexcharts-xaxistooltip-top:before {
  border-top-color: #90a4ae
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,.apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
  border-top-color: rgba(0,0,0,.5)
}

.apexcharts-xaxistooltip.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-yaxistooltip {
  padding: 4px 10px
}

.apexcharts-yaxistooltip.apexcharts-theme-dark {
  background: rgba(0,0,0,.7);
  border: 1px solid rgba(0,0,0,.5);
  color: #fff
}

.apexcharts-yaxistooltip:after,.apexcharts-yaxistooltip:before {
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none
}

.apexcharts-yaxistooltip:after {
  border-color: transparent;
  border-width: 6px;
  margin-top: -6px
}

.apexcharts-yaxistooltip:before {
  border-color: transparent;
  border-width: 7px;
  margin-top: -7px
}

.apexcharts-yaxistooltip-left:after,.apexcharts-yaxistooltip-left:before {
  left: 100%
}

.apexcharts-yaxistooltip-right:after,.apexcharts-yaxistooltip-right:before {
  right: 100%
}

.apexcharts-yaxistooltip-left:after {
  border-left-color: #eceff1
}

.apexcharts-yaxistooltip-left:before {
  border-left-color: #90a4ae
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,.apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
  border-left-color: rgba(0,0,0,.5)
}

.apexcharts-yaxistooltip-right:after {
  border-right-color: #eceff1
}

.apexcharts-yaxistooltip-right:before {
  border-right-color: #90a4ae
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,.apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
  border-right-color: rgba(0,0,0,.5)
}

.apexcharts-yaxistooltip.apexcharts-active {
  opacity: 1
}

.apexcharts-yaxistooltip-hidden {
  display: none
}

.apexcharts-xcrosshairs,.apexcharts-ycrosshairs {
  pointer-events: none;
  opacity: 0;
  transition: .15s ease all
}

.apexcharts-xcrosshairs.apexcharts-active,.apexcharts-ycrosshairs.apexcharts-active {
  opacity: 1;
  transition: .15s ease all
}

.apexcharts-ycrosshairs-hidden {
  opacity: 0
}

.apexcharts-selection-rect {
  cursor: move
}

.svg_select_boundingRect,.svg_select_points_rot {
  pointer-events: none;
  opacity: 0;
  visibility: hidden
}

.apexcharts-selection-rect+g .svg_select_boundingRect,.apexcharts-selection-rect+g .svg_select_points_rot {
  opacity: 0;
  visibility: hidden
}

.apexcharts-selection-rect+g .svg_select_points_l,.apexcharts-selection-rect+g .svg_select_points_r {
  cursor: ew-resize;
  opacity: 1;
  visibility: visible
}

.svg_select_points {
  fill: #efefef;
  stroke: #333;
  rx: 2
}

.apexcharts-svg.apexcharts-zoomable.hovering-zoom {
  cursor: crosshair
}

.apexcharts-svg.apexcharts-zoomable.hovering-pan {
  cursor: move
}

.apexcharts-menu-icon,.apexcharts-pan-icon,.apexcharts-reset-icon,.apexcharts-selection-icon,.apexcharts-toolbar-custom-icon,.apexcharts-zoom-icon,.apexcharts-zoomin-icon,.apexcharts-zoomout-icon {
  cursor: pointer;
  width: 20px;
  height: 20px;
  line-height: 24px;
  color: #6e8192;
  text-align: center
}

.apexcharts-menu-icon svg,.apexcharts-reset-icon svg,.apexcharts-zoom-icon svg,.apexcharts-zoomin-icon svg,.apexcharts-zoomout-icon svg {
  fill: #6e8192
}

.apexcharts-selection-icon svg {
  fill: #444;
  transform: scale(.76)
}

.apexcharts-theme-dark .apexcharts-menu-icon svg,.apexcharts-theme-dark .apexcharts-pan-icon svg,.apexcharts-theme-dark .apexcharts-reset-icon svg,.apexcharts-theme-dark .apexcharts-selection-icon svg,.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,.apexcharts-theme-dark .apexcharts-zoom-icon svg,.apexcharts-theme-dark .apexcharts-zoomin-icon svg,.apexcharts-theme-dark .apexcharts-zoomout-icon svg {
  fill: #f3f4f5
}

.apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
  fill: #008ffb
}

.apexcharts-theme-light .apexcharts-menu-icon:hover svg,.apexcharts-theme-light .apexcharts-reset-icon:hover svg,.apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,.apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,.apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,.apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
  fill: #333
}

.apexcharts-menu-icon,.apexcharts-selection-icon {
  position: relative
}

.apexcharts-reset-icon {
  margin-left: 5px
}

.apexcharts-menu-icon,.apexcharts-reset-icon,.apexcharts-zoom-icon {
  transform: scale(.85)
}

.apexcharts-zoomin-icon,.apexcharts-zoomout-icon {
  transform: scale(.7)
}

.apexcharts-zoomout-icon {
  margin-right: 3px
}

.apexcharts-pan-icon {
  transform: scale(.62);
  position: relative;
  left: 1px;
  top: 0
}

.apexcharts-pan-icon svg {
  fill: #fff;
  stroke: #6e8192;
  stroke-width: 2
}

.apexcharts-pan-icon.apexcharts-selected svg {
  stroke: #008ffb
}

.apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
  stroke: #333
}

.apexcharts-toolbar {
  position: absolute;
  z-index: 11;
  max-width: 176px;
  text-align: right;
  border-radius: 3px;
  padding: 0 6px 2px;
  display: flex;
  justify-content: space-between;
  align-items: center
}

.apexcharts-menu {
  background: #fff;
  position: absolute;
  top: 100%;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 3px;
  right: 10px;
  opacity: 0;
  min-width: 110px;
  transition: .15s ease all;
  pointer-events: none
}

.apexcharts-menu.apexcharts-menu-open {
  opacity: 1;
  pointer-events: all;
  transition: .15s ease all
}

.apexcharts-menu-item {
  padding: 6px 7px;
  font-size: 12px;
  cursor: pointer
}

.apexcharts-theme-light .apexcharts-menu-item:hover {
  background: #eee
}

.apexcharts-theme-dark .apexcharts-menu {
  background: rgba(0,0,0,.7);
  color: #fff
}

@media screen and (min-width:768px) {
  .apexcharts-canvas:hover .apexcharts-toolbar {
      opacity: 1
  }
}

.apexcharts-canvas .apexcharts-element-hidden,.apexcharts-datalabel.apexcharts-element-hidden,.apexcharts-hide .apexcharts-series-points {
  opacity: 0
}

.apexcharts-datalabel,.apexcharts-datalabel-label,.apexcharts-datalabel-value,.apexcharts-datalabels,.apexcharts-pie-label {
  cursor: default;
  pointer-events: none
}

.apexcharts-pie-label-delay {
  opacity: 0;
  animation-name: opaque;
  animation-duration: .3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease
}

.apexcharts-annotation-rect,.apexcharts-area-series .apexcharts-area,.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,.apexcharts-gridline,.apexcharts-line,.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,.apexcharts-point-annotation-label,.apexcharts-radar-series path,.apexcharts-radar-series polygon,.apexcharts-toolbar svg,.apexcharts-tooltip .apexcharts-marker,.apexcharts-xaxis-annotation-label,.apexcharts-yaxis-annotation-label,.apexcharts-zoom-rect {
  pointer-events: none
}

.apexcharts-marker {
  transition: .15s ease all
}

.resize-triggers {
  animation: 1ms resizeanim;
  visibility: hidden;
  opacity: 0;
  height: 100%;
  width: 100%;
  overflow: hidden
}

.contract-trigger:before,.resize-triggers,.resize-triggers>div {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0
}

.resize-triggers>div {
  height: 100%;
  width: 100%;
  background: #eee;
  overflow: auto
}

.contract-trigger:before {
  overflow: hidden;
  width: 200%;
  height: 200%
}
</style></head>

  <body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
      <!-- Sidebar -->
      <div class="sidebar print:hidden">
        <!-- Main Sidebar -->
        <div class="main-sidebar">
          <div class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
            <!-- Application Logo -->
            <div class="flex pt-4">
              <a href="#">
                <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]" src="./files/app-logo.svg" alt="logo">
              </a>
            </div>

            <!-- Main Sections Links -->
            <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
              <!-- Dashobards -->
              <a href="index.php" class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" x-tooltip.placement.right="&#39;Dashboard&#39;">
              <img src = "../svg/house.png" alt="" width="22px" height="22px"/>

              </a>

              <!-- Apps -->
              <a href="Refer.php" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="&#39;Refer&#39;">
              <img src = "../svg/users.png" alt="" width="22px" height="22px"/>

              </a>

              <!-- Withdrawal -->
              <a href="withdrawal.php" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="&#39;Withdrawal &#39;">
              <img src = "../svg/bank.png" alt="" width="22px" height="22px"/>
              </a>

              <!-- Forms -->
              

              <!-- Components -->
             

              <!-- Elements -->
              
            </div>

            <!-- Bottom Links -->
            <div class="flex flex-col items-center space-y-3 py-3">
              <!-- Settings -->
              <a href="#" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
              <img src = "../svg/settings.png" alt="" width="22px" height="22px"/>

              </a>

              <!-- Profile -->
              <div x-data="usePopper({placement:&#39;right-end&#39;,offset:12})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="flex">
                <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                  <img class="rounded-full" src="./files/avatar-12.jpg" alt="avatar">
                  <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                </button>

                <div :class="isShowPopper &amp;&amp; &#39;show&#39;" class="popper-root fixed" x-ref="popperRoot" style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(76px, -12px);" data-popper-placement="right-end">
                  <div class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                    <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                      <div class="avatar h-14 w-14">
                        <img class="rounded-full" src="./files/avatar-12.jpg" alt="avatar">
                      </div>
                      <div>
                        <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                          Travis Fuller
                        </a>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                          Product Designer
                        </p>
                      </div>
                    </div>
                    <div class="flex flex-col pt-2 pb-5">
                      <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Profile
                          </h2>
                          <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Your profile setting
                          </div>
                        </div>
                      </a>
                      <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Messages
                          </h2>
                          <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Your messages and tasks
                          </div>
                        </div>
                      </a>
                      <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Team
                          </h2>
                          <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Your team activity
                          </div>
                        </div>
                      </a>
                      <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Activity
                          </h2>
                          <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Your activity and events
                          </div>
                        </div>
                      </a>
                      <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Settings
                          </h2>
                          <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Webapp settings
                          </div>
                        </div>
                      </a>
                      <div class="mt-3 px-4">
                        <button class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                          </svg>
                          <span onclick="window.location.href='../logout.php';">Logout</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

   
        </div>
      <!-- App Header Wrapper-->
      <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
        <!-- App Header  -->
        <div class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden">
          <!-- Header Items -->
          <div class="flex w-full items-center justify-between">
            <!-- Left: Sidebar Toggle Button -->
            <div class="h-7 w-7">
            <button class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80" :class="$store.global.isSidebarExpanded &amp;&amp; &#39;active&#39;" @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>

            <!-- Right: Header buttons -->
            <div class="-mr-1.5 flex items-center space-x-2">
              <!-- Mobile Search Toggle -->
             

              <!-- Main Searchbar -->
              <template x-if="$store.breakpoints.smAndUp"></template><div class="flex" x-data="usePopper({placement:&#39;bottom-end&#39;,offset:12})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)">
                  <div class="relative mr-4 flex h-8">

                  <button
                  class="btn rounded-full bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" onclick="window.location.href='../logout.php';">
                
                  Log Out
                </button>


                <div style="display: none;">
 
<?php
if ($key==1)
{

?>
                  <button
                    id="rightTopButton"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                    @click="$notification({text:'Your Request Bas Been Successfully Submitted',variant:'info',position:'right-top'})"
                  >
                    Right Top
                  </button>
                  </div>


<script>
  // Simulate button click on page load
  window.onload = function() {
    document.getElementById('rightTopButton').click();
  }
</script>
<?php

}
?>

<script>
  // Simulate button click on page load
  window.onload = function() {
    document.getElementById('rightTopButton').click();
  }
</script>

                    <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                    </div>
                  </div>
                  <div :class="isShowPopper &amp;&amp; &#39;show&#39;" class="popper-root" x-ref="popperRoot" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-234px, 58px);" data-popper-placement="bottom-end">
                    <div class="popper-box flex max-h-[calc(100vh-6rem)] w-80 flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark">
                      <div x-data="{activeTab:&#39;tabAll&#39;}" class="is-scrollbar-hidden flex shrink-0 overflow-x-auto rounded-t-lg bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                        <button @click="activeTab = &#39;tabAll&#39;" :class="activeTab === &#39;tabAll&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-primary dark:border-accent text-primary dark:text-accent-light">
                          All
                        </button>
                        <button @click="activeTab = &#39;tabFiles&#39;" :class="activeTab === &#39;tabFiles&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          Files
                        </button>
                        <button @click="activeTab = &#39;tabChats&#39;" :class="activeTab === &#39;tabChats&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          Chats
                        </button>
                        <button @click="activeTab = &#39;tabEmails&#39;" :class="activeTab === &#39;tabEmails&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          Emails
                        </button>
                        <button @click="activeTab = &#39;tabProjects&#39;" :class="activeTab === &#39;tabProjects&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          Projects
                        </button>
                        <button @click="activeTab = &#39;tabTasks&#39;" :class="activeTab === &#39;tabTasks&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          Tasks
                        </button>
                      </div>

                      <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                        <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                          <a href="#/apps-kanban.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-success text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Kanban
                            </p>
                          </a>
                          <a href="#/dashboards-crm-analytics.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Analytics
                            </p>
                          </a>
                          <a href="#/apps-chat.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Chat
                            </p>
                          </a>
                          <a href="#/apps-filemanager.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-error text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Files
                            </p>
                          </a>
                          <a href="#/dashboards-crypto-1.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Crypto
                            </p>
                          </a>
                          <a href="#/dashboards-banking-1.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Banking
                            </p>
                          </a>
                          <a href="#/apps-todo.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Todo
                            </p>
                          </a>
                          <a href="#/dashboards-crm-analytics.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Analytics
                            </p>
                          </a>
                          <a href="#/dashboards-orders.html" class="w-14 text-center">
                            <div class="avatar h-12 w-12">
                              <div class="is-initial rounded-full bg-warning text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                              </div>
                            </div>
                            <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                              Orders
                            </p>
                          </a>
                        </div>

                        <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                          <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Recent
                          </p>
                          <a href="#" class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                            View All
                          </a>
                        </div>

                        <div class="mt-1 font-inter font-medium">
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-chat.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <span>Chat App</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-filemanager.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                            <span>File Manager App</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-mail.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Email App</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-kanban.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                            </svg>
                            <span>Kanban Board</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-todo.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span>Todo App</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-crypto-2.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>

                            <span>Crypto Dashboard</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-banking-2.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>

                            <span>Banking Dashboard</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-crm-analytics.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>

                            <span>Analytics Dashboard</span>
                          </a>
                          <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-influencer.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>

                            <span>Influencer Dashboard</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <!-- Dark Mode Toggle -->
              <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg x-show="$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24" style="display: none;">
                  <path d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <!-- Monochrome Mode Toggle -->
              <button @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <i class="fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text text-lg font-semibold text-transparent"></i>
              </button>

              <!-- Notification-->
              <div x-effect="if($store.global.isSearchbarActive) isShowPopper = false" x-data="usePopper({placement:&#39;bottom-end&#39;,offset:12})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="flex">
                <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="btn relative h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500 dark:text-navy-100" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z"></path>
                  </svg>

                  <span class="absolute -top-px -right-px flex h-3 w-3 items-center justify-center">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"></span>
                    <span class="inline-flex h-2 w-2 rounded-full bg-secondary"></span>
                  </span>
                </button>
                <div :class="isShowPopper &amp;&amp; &#39;show&#39;" class="popper-root" x-ref="popperRoot" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-98px, 58px);" data-popper-placement="bottom-end">
                  <div x-data="{activeTab:&#39;tabAll&#39;}" class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
                    <div class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                      <div class="flex items-center justify-between px-4 pt-2">
                        <div class="flex items-center space-x-2">
                          <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            Notifications
                          </h3>
                          <div class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                            26
                          </div>
                        </div>

                        <button class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                          </svg>
                        </button>
                      </div>

                      <div class="is-scrollbar-hidden flex shrink-0 overflow-x-auto px-3">
                        <button @click="activeTab = &#39;tabAll&#39;" :class="activeTab === &#39;tabAll&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-primary dark:border-accent text-primary dark:text-accent-light">
                          <span>All</span>
                        </button>
                        <button @click="activeTab = &#39;tabAlerts&#39;" :class="activeTab === &#39;tabAlerts&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          <span>Alerts</span>
                        </button>
                        <button @click="activeTab = &#39;tabEvents&#39;" :class="activeTab === &#39;tabEvents&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          <span>Events</span>
                        </button>
                        <button @click="activeTab = &#39;tabLogs&#39;" :class="activeTab === &#39;tabLogs&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
                          <span>Logs</span>
                        </button>
                      </div>
                    </div>

                    <div class="tab-content flex flex-col overflow-hidden">
                      <div x-show="activeTab === &#39;tabAll&#39;" x-transition:enter="transition-all duration-300 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                            <i class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              User Photo Changed
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              John Doe changed his avatar photo
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Mon, June 14, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">08:00 - 09:00</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                              <span class="line-clamp-1">Frontend Conf</span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                            <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Images Added
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Mores Clarke added new image gallery
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                            <i class="fa fa-leaf text-success"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Design Completed
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Robert Nolan completed the design of the CRM
                              application
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Wed, June 21, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">16:00 - 20:00</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                              <span class="line-clamp-1">UI/UX Conf</span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                            <i class="fa fa-project-diagram text-warning"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              ER Diagram
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Team completed the ER diagram app
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              THU, May 11, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">10:00 - 11:30</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                              <span class="line-clamp-1">Interview, Konnor Guzman
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                            <i class="fa fa-history text-error"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Weekly Report
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              The weekly report was uploaded
                            </div>
                          </div>
                        </div>
                      </div>
                      <div x-show="activeTab === &#39;tabAlerts&#39;" x-transition:enter="transition-all duration-300 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4" style="display: none;">
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                            <i class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              User Photo Changed
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              John Doe changed his avatar photo
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                            <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Images Added
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Mores Clarke added new image gallery
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                            <i class="fa fa-leaf text-success"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Design Completed
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Robert Nolan completed the design of the CRM
                              application
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                            <i class="fa fa-project-diagram text-warning"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              ER Diagram
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              Team completed the ER diagram app
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                            <i class="fa fa-history text-error"></i>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Weekly Report
                            </p>
                            <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                              The weekly report was uploaded
                            </div>
                          </div>
                        </div>
                      </div>
                      <div x-show="activeTab === &#39;tabEvents&#39;" x-transition:enter="transition-all duration-300 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4" style="display: none;">
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Mon, June 14, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">08:00 - 09:00</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                              <span class="line-clamp-1">Frontend Conf</span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Wed, June 21, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">16:00 - 20:00</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                              <span class="line-clamp-1">UI/UX Conf</span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              THU, May 11, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">10:00 - 11:30</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                              <span class="line-clamp-1">Interview, Konnor Guzman
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Mon, Jul 16, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">06:00 - 16:00</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                              <span class="line-clamp-1">Laravel Conf</span>
                            </div>
                          </div>
                        </div>
                        <div class="flex items-center space-x-3">
                          <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                          </div>
                          <div>
                            <p class="font-medium text-slate-600 dark:text-navy-100">
                              Wed, Jun 16, 2021
                            </p>
                            <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                              <span class="shrink-0">15:30 - 11:30</span>
                              <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                              <span class="line-clamp-1">Interview, Jonh Doe
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div x-show="activeTab === &#39;tabLogs&#39;" x-transition:enter="transition-all duration-300 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden overflow-y-auto px-4" style="display: none;">
                        <div class="mt-8 pb-8 text-center">
                          <img class="mx-auto w-36" src="./files/empty-girl-box.svg" alt="image">
                          <div class="mt-5">
                            <p class="text-base font-semibold text-slate-700 dark:text-navy-100">
                              No any logs
                            </p>
                            <p class="text-slate-400 dark:text-navy-300">
                              There are no unread logs yet
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Right Sidebar Toggle -->
              <button @click="$store.global.isRightSidebarExpanded = true" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-slate-500 dark:text-navy-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </nav>

      <!-- Mobile Searchbar -->
      <div x-show="$store.breakpoints.isXs &amp;&amp; $store.global.isSearchbarActive" x-transition:enter="easy-out transition-all" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in transition-all" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden" style="display: none;">
        

        <div x-data="{activeTab:&#39;tabAll&#39;}" class="is-scrollbar-hidden flex shrink-0 overflow-x-auto bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
          <button @click="activeTab = &#39;tabAll&#39;" :class="activeTab === &#39;tabAll&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-primary dark:border-accent text-primary dark:text-accent-light">
            All
          </button>
          <button @click="activeTab = &#39;tabFiles&#39;" :class="activeTab === &#39;tabFiles&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
            Files
          </button>
          <button @click="activeTab = &#39;tabChats&#39;" :class="activeTab === &#39;tabChats&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
            Chats
          </button>
          <button @click="activeTab = &#39;tabEmails&#39;" :class="activeTab === &#39;tabEmails&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
            Emails
          </button>
          <button @click="activeTab = &#39;tabProjects&#39;" :class="activeTab === &#39;tabProjects&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
            Projects
          </button>
          <button @click="activeTab = &#39;tabTasks&#39;" :class="activeTab === &#39;tabTasks&#39; ? &#39;border-primary dark:border-accent text-primary dark:text-accent-light&#39; : &#39;border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100&#39;" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5 border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">
            Tasks
          </button>
        </div>

        <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
          <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
            <a href="#/apps-kanban.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-success text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Kanban
              </p>
            </a>
            <a href="#/dashboards-crm-analytics.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-secondary text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Analytics
              </p>
            </a>
            <a href="#/apps-chat.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-info text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Chat
              </p>
            </a>
            <a href="#/apps-filemanager.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-error text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Files
              </p>
            </a>
            <a href="#/dashboards-crypto-1.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-secondary text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Crypto
              </p>
            </a>
            <a href="#/dashboards-banking-1.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Banking
              </p>
            </a>
            <a href="#/apps-todo.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-info text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Todo
              </p>
            </a>

            <a href="#/dashboards-orders.html" class="w-14 text-center">
              <div class="avatar h-12 w-12">
                <div class="is-initial rounded-full bg-warning text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  </svg>
                </div>
              </div>
              <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                Orders
              </p>
            </a>
          </div>

          <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
            <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
              Recent
            </p>
            <a href="#" class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
              View All
            </a>
          </div>

          <div class="mt-1 font-inter font-medium">
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-chat.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
              <span>Chat App</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-filemanager.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
              </svg>
              <span>File Manager App</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-mail.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
              <span>Email App</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-kanban.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
              </svg>
              <span>Kanban Board</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/apps-todo.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
              <span>Todo App</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-crypto-2.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>

              <span>Crypto Dashboard</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-banking-2.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
              </svg>

              <span>Banking Dashboard</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-crm-analytics.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
              </svg>

              <span>Analytics Dashboard</span>
            </a>
            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#/dashboards-influencer.html">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>

              <span>Influencer Dashboard</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Right Sidebar -->
      <div x-show="$store.global.isRightSidebarExpanded" @keydown.window.escape="$store.global.isRightSidebarExpanded = false" style="display: none;">
        <div class="fixed inset-0 z-[150] bg-slate-900/60 transition-opacity duration-200" @click="$store.global.isRightSidebarExpanded = false" x-show="$store.global.isRightSidebarExpanded" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;"></div>
        <div class="fixed right-0 top-0 z-[151] h-full w-full sm:w-80">
          <div x-data="{activeTab:&#39;tabHome&#39;}" class="relative flex h-full w-full transform-gpu flex-col bg-white transition-transform duration-200 dark:bg-navy-750" x-show="$store.global.isRightSidebarExpanded" x-transition:enter="ease-out" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="ease-in" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" style="display: none;">
            <div class="flex items-center justify-between py-2 px-4">
              <p x-show="activeTab === &#39;tabHome&#39;" class="flex shrink-0 items-center space-x-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-xs">25 May, 2022</span>
              </p>
              <p x-show="activeTab === &#39;tabProjects&#39;" class="flex shrink-0 items-center space-x-1.5" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                </svg>
                <span class="text-xs">Projects</span>
              </p>
              <p x-show="activeTab === &#39;tabActivity&#39;" class="flex shrink-0 items-center space-x-1.5" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-xs">Activity</span>
              </p>

              <button @click="$store.global.isRightSidebarExpanded=false" class="btn -mr-1 h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>

            <div x-show="activeTab === &#39;tabHome&#39;" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden overflow-y-auto overscroll-contain pt-1">
            
              <div class="mt-3">
                <h2 class="px-3 text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Banking cards
                </h2>
                <div class="swiper mt-3 px-3 swiper-initialized swiper-horizontal" x-init="$nextTick(()=&gt;new Swiper($el,{  slidesPerView: &#39;auto&#39;, spaceBetween: 16}))">
                  <div class="swiper-wrapper" style="transition-duration: 0ms;" id="swiper-wrapper-105fa4c7110321f4f8" aria-live="polite">
                    <div class="swiper-slide relative flex h-28 w-48 flex-col overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-3">
                      <div class="grow">
                        <img class="h-3" src="./files/cc-visa-white.svg" alt="image">
                      </div>
                      <div class="text-white">
                        <p class="text-lg font-semibold tracking-wide">
                          $2,139.22
                        </p>
                        <p class="mt-1 text-xs font-medium">
                          **** **** **** 8945
                        </p>
                      </div>
                      <div class="mask is-reuleaux-triangle absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
                    </div>
                    <div class="swiper-slide relative flex h-28 w-48 flex-col overflow-hidden rounded-xl bg-gradient-to-br from-pink-500 to-rose-500 p-3">
                      <div class="grow">
                        <img class="h-3" src="./files/cc-visa-white.svg" alt="image">
                      </div>
                      <div class="text-white">
                        <p class="text-lg font-semibold tracking-wide">
                          $2,139.22
                        </p>
                        <p class="mt-1 text-xs font-medium">
                          **** **** **** 8945
                        </p>
                      </div>
                      <div class="mask is-diamond absolute bottom-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
                    </div>
                    <div class="swiper-slide relative flex h-28 w-48 flex-col overflow-hidden rounded-xl bg-gradient-to-br from-info to-info-focus p-3">
                      <div class="grow">
                        <img class="h-3" src="./files/cc-visa-white.svg" alt="image">
                      </div>
                      <div class="text-white">
                        <p class="text-lg font-semibold tracking-wide">
                          $2,139.22
                        </p>
                        <p class="mt-1 text-xs font-medium">
                          **** **** **** 8945
                        </p>
                      </div>
                      <div class="mask is-hexagon-2 absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"></div>
                    </div>
                  </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
              </div>

              <div class="mt-4 px-3">
                <h2 class="text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Pinned Apps
                </h2>
                <div class="mt-3 flex space-x-3">
                  <a href="#/apps-kanban.html" class="w-12 text-center">
                    <div class="avatar h-10 w-10">
                      <div class="is-initial mask is-squircle bg-success text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                        </svg>
                      </div>
                    </div>
                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                      Kanban
                    </p>
                  </a>
                  <a href="#/dashboards-crm-analytics.html" class="w-12 text-center">
                    <div class="avatar h-10 w-10">
                      <div class="is-initial mask is-squircle bg-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                      </div>
                    </div>
                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                      Analytics
                    </p>
                  </a>
                  <a href="#/apps-chat.html" class="w-12 text-center">
                    <div class="avatar h-10 w-10">
                      <div class="is-initial mask is-squircle bg-info text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                      </div>
                    </div>
                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                      Chat
                    </p>
                  </a>
                  <a href="#/apps-filemanager.html" class="w-12 text-center">
                    <div class="avatar h-10 w-10">
                      <div class="is-initial mask is-squircle bg-error text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                      </div>
                    </div>
                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                      Files
                    </p>
                  </a>
                  <a href="#/dashboards-banking-1.html" class="w-12 text-center">
                    <div class="avatar h-10 w-10">
                      <div class="is-initial mask is-squircle bg-secondary text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                      </div>
                    </div>
                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                      Banking
                    </p>
                  </a>
                </div>
              </div>

              <div class="mt-4">
                <div class="grid grid-cols-2 gap-3 px-3">
                  <div class="rounded-lg bg-slate-150 px-2.5 py-2 dark:bg-navy-600">
                    <div class="flex items-center justify-between space-x-1">
                      <p>
                        <span class="text-lg font-medium text-slate-700 dark:text-navy-100">11.3</span>
                        <span class="text-xs">hr</span>
                      </p>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-secondary dark:text-secondary-light" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                      </svg>
                    </div>

                    <p class="mt-0.5 text-tiny+ uppercase">Working Hours</p>

                    <div class="progress mt-3 h-1.5 bg-secondary/15 dark:bg-secondary-light/25">
                      <div class="is-active relative w-8/12 overflow-hidden rounded-full bg-secondary dark:bg-secondary-light"></div>
                    </div>

                    <div class="mt-1.5 flex items-center justify-between text-xs text-slate-400 dark:text-navy-300">
                      <button class="btn -ml-1 h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                      </button>
                      <span> 71%</span>
                    </div>
                  </div>
                  <div class="rounded-lg bg-slate-150 px-2.5 py-2 dark:bg-navy-600">
                    <div class="flex items-center justify-between space-x-1">
                      <p>
                        <span class="text-lg font-medium text-slate-700 dark:text-navy-100">13</span>
                        <span class="text-xs">/22</span>
                      </p>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-success" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                      </svg>
                    </div>

                    <p class="mt-0.5 text-tiny+ uppercase">Completed tasks</p>

                    <div class="progress mt-3 h-1.5 bg-success/15 dark:bg-success/25">
                      <div class="relative w-6/12 overflow-hidden rounded-full bg-success"></div>
                    </div>

                    <div class="mt-1.5 flex items-center justify-between text-xs text-slate-400 dark:text-navy-300">
                      <button class="btn -ml-1 h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                      </button>
                      <span> 49%</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <h2 class="px-3 text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Stock Market
                </h2>
                <div class="mt-3 grid grid-cols-2 gap-3 px-3">
                  <div class="rounded-lg bg-slate-100 p-2.5 dark:bg-navy-600">
                    <div class="flex items-center space-x-2">
                      <img class="h-10 w-10" src="./files/bitcoin.svg" alt="image">
                      <div>
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                          BTC
                        </h2>
                        <p class="text-xs">Bitcoin</p>
                      </div>
                    </div>

                    <div class="ax-transparent-gridline">
                      <div x-init="$nextTick(() =&gt; { $el._x_chart = new ApexCharts($el,pages.charts.stockMarket1); $el._x_chart.render() });" style="min-height: 100px;"><div id="apexchartsl2hfwn4e" class="apexcharts-canvas apexchartsl2hfwn4e" style="width: 0px; height: 100px;"><svg id="SvgjsSvg2556" width="0" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="0" height="100"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignobject><g id="SvgjsG2558" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs2557"></defs></g></svg></div></div>
                    </div>

                    <div class="mt-2 flex items-center justify-between">
                      <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        60.33$
                      </p>
                      <p class="text-xs font-medium tracking-wide text-success">
                        +3.3%
                      </p>
                    </div>
                  </div>

                  <div class="rounded-lg bg-slate-100 p-2.5 dark:bg-navy-600">
                    <div class="flex items-center space-x-2">
                      <img class="h-10 w-10" src="./files/solana.svg" alt="image">
                      <div>
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                          SOL
                        </h2>
                        <p class="text-xs">Solana</p>
                      </div>
                    </div>

                    <div class="ax-transparent-gridline">
                      <div x-init="$nextTick(() =&gt; { $el._x_chart = new ApexCharts($el,pages.charts.stockMarket2); $el._x_chart.render() });" style="min-height: 100px;"><div id="apexchartsse76us7q" class="apexcharts-canvas apexchartsse76us7q" style="width: 0px; height: 100px;"><svg id="SvgjsSvg2559" width="0" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="0" height="100"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignobject><g id="SvgjsG2561" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs2560"></defs></g></svg></div></div>
                    </div>

                    <div class="mt-2 flex items-center justify-between">
                      <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        20.56$
                      </p>
                      <p class="text-xs font-medium tracking-wide text-success">
                        +4.11%
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <h2 class="px-3 text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Latest News
                </h2>
                <div class="mt-3 space-y-3 px-2">
                  <div class="flex justify-between space-x-2 rounded-lg bg-slate-100 p-2.5 dark:bg-navy-700">
                    <div class="flex flex-1 flex-col justify-between">
                      <div class="line-clamp-2">
                        <a href="#" class="font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">What is Tailwind CSS?</a>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                          <div class="avatar h-7 w-7">
                            <img class="rounded-full" src="./files/avatar-20.jpg" alt="avatar">
                          </div>
                          <div>
                            <p class="text-xs font-medium line-clamp-1">
                              John D.
                            </p>
                            <p class="text-tiny+ text-slate-400 line-clamp-1 dark:text-navy-300">
                              2 min read
                            </p>
                          </div>
                        </div>
                        <div class="flex">
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                          </button>
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                    <img src="./files/object-18.jpg" class="h-20 w-20 rounded-lg object-cover object-center" alt="image">
                  </div>

                  <div class="flex justify-between space-x-2 rounded-lg bg-slate-100 p-2.5 dark:bg-navy-700">
                    <div class="flex flex-1 flex-col justify-between">
                      <div class="line-clamp-2">
                        <a href="#" class="font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">Tailwind CSS Card Example</a>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                          <div class="avatar h-7 w-7">
                            <img class="rounded-full" src="./files/avatar-19.jpg" alt="avatar">
                          </div>
                          <div>
                            <p class="text-xs font-medium line-clamp-1">
                              Travis F.
                            </p>
                            <p class="text-tiny+ text-slate-400 line-clamp-1 dark:text-navy-300">
                              5 min read
                            </p>
                          </div>
                        </div>
                        <div class="flex">
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                          </button>
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                    <img src="./files/object-2.jpg" class="h-20 w-20 rounded-lg object-cover object-center" alt="image">
                  </div>

                  <div class="flex justify-between space-x-2 rounded-lg bg-slate-100 p-2.5 dark:bg-navy-700">
                    <div class="flex flex-1 flex-col justify-between">
                      <div class="line-clamp-2">
                        <a href="#" class="font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">10 Tips for Making a Good Camera Even Better</a>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                          <div class="avatar h-7 w-7">
                            <img class="rounded-full" src="./files/avatar-18.jpg" alt="avatar">
                          </div>
                          <div>
                            <p class="text-xs font-medium line-clamp-1">
                              Alfredo E .
                            </p>
                            <p class="text-tiny+ text-slate-400 line-clamp-1 dark:text-navy-300">
                              4 min read
                            </p>
                          </div>
                        </div>
                        <div class="flex">
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                          </button>
                          <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                    <img src="./files/object-1.jpg" class="h-20 w-20 rounded-lg object-cover object-center" alt="image">
                  </div>
                </div>
              </div>

              <div class="mt-3 px-3">
                <h2 class="text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Settings
                </h2>
                <div class="mt-2 flex flex-col space-y-2">
                  <label class="inline-flex items-center space-x-2">
                    <input x-model="$store.global.isDarkModeEnabled" class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:bg-slate-500 checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-navy-400 dark:checked:before:bg-white" type="checkbox">
                    <span>Dark Mode</span>
                  </label>
                  <label class="inline-flex items-center space-x-2">
                    <input x-model="$store.global.isMonochromeModeEnabled" class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:bg-slate-500 checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-navy-400 dark:checked:before:bg-white" type="checkbox">
                    <span>Monochrome Mode</span>
                  </label>
                </div>
              </div>

              <div class="mt-3 px-3">
                <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                  <div class="flex items-center justify-between">
                    <p>
                      <span class="font-medium text-slate-600 dark:text-navy-100">35GB</span>
                      of 1TB
                    </p>
                    <a href="#" class="text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">Upgrade</a>
                  </div>

                  <div class="progress mt-2 h-2 bg-slate-150 dark:bg-navy-500">
                    <div class="w-7/12 rounded-full bg-info"></div>
                  </div>
                </div>
              </div>
              <div class="h-18"></div>
            </div>

            <div x-show="activeTab === &#39;tabProjects&#39;" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden overflow-y-auto overscroll-contain px-3 pt-1" style="display: none;">
              <div class="grid grid-cols-2 gap-3">
                <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                  <div class="flex justify-between space-x-1">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                      14
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="h-5 w-5 text-primary dark:text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  <p class="mt-1 text-xs+">Pending</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                  <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                      36
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                  </div>
                  <p class="mt-1 text-xs+">Completed</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                  <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                      143
                    </p>

                    <i class="fa fa-spinner text-base text-warning"></i>
                  </div>
                  <p class="mt-1 text-xs+">In Progress</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                  <div class="flex justify-between">
                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                      279
                    </p>

                    <i class="fa-solid fa-list-check text-base text-info"></i>
                  </div>
                  <p class="mt-1 text-xs+">Total</p>
                </div>
              </div>

              <div class="mt-4 rounded-lg border border-slate-150 p-3 dark:border-navy-600">
                <div class="flex items-center space-x-3">
                  <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/lms-ui.svg" alt="image">
                  <div>
                    <p class="font-medium leading-snug text-slate-700 dark:text-navy-100">
                      LMS App Design
                    </p>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Updated at 7 Sep
                    </p>
                  </div>
                </div>

                <div class="mt-4">
                  <div class="progress h-1.5 bg-slate-150 dark:bg-navy-500">
                    <div class="w-4/12 rounded-full bg-primary dark:bg-accent"></div>
                  </div>
                  <p class="mt-2 text-right text-xs+ font-medium text-primary dark:text-accent-light">
                    25%
                  </p>
                </div>

                <div class="mt-3 flex items-center justify-between space-x-2">
                  <div class="flex -space-x-3">
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-16.jpg" alt="avatar">
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                        jd
                      </div>
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-20.jpg" alt="avatar">
                    </div>
                  </div>
                  <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-4 rounded-lg border border-slate-150 p-3 dark:border-navy-600">
                <div class="flex items-center space-x-3">
                  <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/store-ui.svg" alt="image">
                  <div>
                    <p class="font-medium leading-snug text-slate-700 dark:text-navy-100">
                      Store Dashboard
                    </p>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Updated at 11 Sep
                    </p>
                  </div>
                </div>

                <div class="mt-4">
                  <div class="progress h-1.5 bg-slate-150 dark:bg-navy-500">
                    <div class="w-6/12 rounded-full bg-primary dark:bg-accent"></div>
                  </div>
                  <p class="mt-2 text-right text-xs+ font-medium text-primary dark:text-accent-light">
                    49%
                  </p>
                </div>

                <div class="mt-3 flex items-center justify-between space-x-2">
                  <div class="flex -space-x-3">
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-17.jpg" alt="avatar">
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <div class="is-initial rounded-full bg-warning text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                        dv
                      </div>
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-19.jpg" alt="avatar">
                    </div>
                  </div>
                  <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-4 rounded-lg border border-slate-150 p-3 dark:border-navy-600">
                <div class="flex items-center space-x-3">
                  <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/chat-ui.svg" alt="image">
                  <div>
                    <p class="font-medium leading-snug text-slate-700 dark:text-navy-100">
                      Chat Mobile App
                    </p>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Updated at 19 Sep
                    </p>
                  </div>
                </div>

                <div class="mt-4">
                  <div class="progress h-1.5 bg-slate-150 dark:bg-navy-500">
                    <div class="w-2/12 rounded-full bg-primary dark:bg-accent"></div>
                  </div>
                  <p class="mt-2 text-right text-xs+ font-medium text-primary dark:text-accent-light">
                    13%
                  </p>
                </div>

                <div class="mt-3 flex items-center justify-between space-x-2">
                  <div class="flex -space-x-3">
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-5.jpg" alt="avatar">
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <div class="is-initial rounded-full bg-error text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                        gt
                      </div>
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-11.jpg" alt="avatar">
                    </div>
                  </div>
                  <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-4 rounded-lg border border-slate-150 p-3 dark:border-navy-600">
                <div class="flex items-center space-x-3">
                  <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/nft.svg" alt="image">
                  <div>
                    <p class="font-medium leading-snug text-slate-700 dark:text-navy-100">
                      NFT Marketplace App
                    </p>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Updated at 5 Sep
                    </p>
                  </div>
                </div>

                <div class="mt-4">
                  <div class="progress h-1.5 bg-slate-150 dark:bg-navy-500">
                    <div class="w-9/12 rounded-full bg-primary dark:bg-accent"></div>
                  </div>
                  <p class="mt-2 text-right text-xs+ font-medium text-primary dark:text-accent-light">
                    78%
                  </p>
                </div>

                <div class="mt-3 flex items-center justify-between space-x-2">
                  <div class="flex -space-x-3">
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-8.jpg" alt="avatar">
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <div class="is-initial rounded-full bg-success text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                        jd
                      </div>
                    </div>
                    <div class="avatar h-7 w-7 hover:z-10">
                      <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-12.jpg" alt="avatar">
                    </div>
                  </div>
                  <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="h-18"></div>
            </div>

            <div x-show="activeTab === &#39;tabActivity&#39;" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="is-scrollbar-hidden overflow-y-auto overscroll-contain pt-1" style="display: none;">
              <div class="mx-3 flex flex-col items-center rounded-lg bg-slate-100 py-3 px-8 dark:bg-navy-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary dark:text-secondary-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>

                <p class="mt-2 text-xs">Today</p>

                <p class="text-lg font-medium text-slate-700 dark:text-navy-100">
                  6hr 22m
                </p>

                <div class="progress mt-3 h-2 bg-secondary/15 dark:bg-secondary-light/25">
                  <div class="is-active relative w-8/12 overflow-hidden rounded-full bg-secondary dark:bg-secondary-light"></div>
                </div>

                <button class="btn mt-5 space-x-2 rounded-full border border-slate-300 px-3 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                  </svg>
                  <span> Download Report</span>
                </button>
              </div>

              <ol class="timeline line-space mt-5 px-4 [--size:1.5rem]">
                <li class="timeline-item">
                  <div class="timeline-item-point rounded-full border border-current bg-white text-secondary dark:bg-navy-700 dark:text-secondary-light">
                    <i class="fa fa-user-edit text-tiny"></i>
                  </div>
                  <div class="timeline-item-content flex-1 pl-4">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                      <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                        User Photo Changed
                      </p>
                      <span class="text-xs text-slate-400 dark:text-navy-300">12 minute ago</span>
                    </div>
                    <p class="py-1">John Doe changed his avatar photo</p>
                    <div class="avatar mt-2 h-20 w-20">
                      <img class="mask is-squircle" src="./files/avatar-19.jpg" alt="avatar">
                    </div>
                  </div>
                </li>
                <li class="timeline-item">
                  <div class="timeline-item-point rounded-full border border-current bg-white text-primary dark:bg-navy-700 dark:text-accent">
                    <i class="fa-solid fa-image text-tiny"></i>
                  </div>
                  <div class="timeline-item-content flex-1 pl-4">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                      <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                        Images Added
                      </p>
                      <span class="text-xs text-slate-400 dark:text-navy-300">1 hour ago</span>
                    </div>
                    <p class="py-1">Mores Clarke added new image gallery</p>
                    <div class="mt-4 grid grid-cols-3 gap-3">
                      <img class="rounded-lg" src="./files/object-1.jpg" alt="image">
                      <img class="rounded-lg" src="./files/object-2.jpg" alt="image">
                      <img class="rounded-lg" src="./files/object-3.jpg" alt="image">
                      <img class="rounded-lg" src="./files/object-4.jpg" alt="image">
                      <img class="rounded-lg" src="./files/object-5.jpg" alt="image">
                      <img class="rounded-lg" src="./files/object-6.jpg" alt="image">
                    </div>
                    <div class="mt-4">
                      <span class="font-medium text-slate-600 dark:text-navy-100">
                        Category:
                      </span>

                      <a href="#" class="text-xs text-primary hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">
                        #Tag
                      </a>

                      <a href="#" class="text-xs text-primary hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">
                        #Category
                      </a>
                    </div>
                  </div>
                </li>
                <li class="timeline-item">
                  <div class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700">
                    <i class="fa fa-leaf text-tiny"></i>
                  </div>
                  <div class="timeline-item-content flex-1 pl-4">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                      <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                        Design Completed
                      </p>
                      <span class="text-xs text-slate-400 dark:text-navy-300">3 hours ago</span>
                    </div>
                    <p class="py-1">
                      Robert Nolan completed the design of the CRM application
                    </p>
                    <a href="#" class="inline-flex items-center space-x-1 pt-2 text-slate-600 transition-colors hover:text-primary dark:text-navy-100 dark:hover:text-accent">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                      </svg>
                      <span>File_final.fig</span>
                    </a>
                    <div class="pt-2">
                      <a href="#" class="tag rounded-full border border-secondary/30 bg-secondary/10 text-secondary hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:border-secondary-light/30 dark:bg-secondary-light/10 dark:text-secondary-light dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25">
                        UI/UX
                      </a>

                      <a href="#" class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                        CRM
                      </a>

                      <a href="#" class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                        Dashboard
                      </a>
                    </div>
                  </div>
                </li>
                <li class="timeline-item">
                  <div class="timeline-item-point rounded-full border border-current bg-white text-warning dark:bg-navy-700">
                    <i class="fa fa-project-diagram text-tiny"></i>
                  </div>
                  <div class="timeline-item-content flex-1 pl-4">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                      <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                        ER Diagram
                      </p>
                      <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                    </div>
                    <p class="py-1">Team completed the ER diagram app</p>
                    <div>
                      <p class="text-xs text-slate-400 dark:text-navy-300">
                        Members:
                      </p>
                      <div class="mt-2 flex justify-between">
                        <div class="flex flex-wrap -space-x-2">
                          <div class="avatar h-7 w-7 hover:z-10">
                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-16.jpg" alt="avatar">
                          </div>

                          <div class="avatar h-7 w-7 hover:z-10">
                            <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                              jd
                            </div>
                          </div>

                          <div class="avatar h-7 w-7 hover:z-10">
                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-20.jpg" alt="avatar">
                          </div>

                          <div class="avatar h-7 w-7 hover:z-10">
                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-8.jpg" alt="avatar">
                          </div>

                          <div class="avatar h-7 w-7 hover:z-10">
                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="./files/avatar-5.jpg" alt="avatar">
                          </div>
                        </div>
                        <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="timeline-item">
                  <div class="timeline-item-point rounded-full border border-current bg-white text-error dark:bg-navy-700">
                    <i class="fa fa-history text-tiny"></i>
                  </div>
                  <div class="timeline-item-content flex-1 pl-4">
                    <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                      <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                        Weekly Report
                      </p>
                      <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                    </div>
                    <p class="py-1">The weekly report was uploaded</p>
                  </div>
                </li>
              </ol>
              <div class="h-18"></div>
            </div>

            <div class="pointer-events-none absolute bottom-4 flex w-full justify-center">
              <div class="pointer-events-auto mx-auto flex space-x-1 rounded-full border border-slate-150 bg-white px-4 py-0.5 shadow-lg dark:border-navy-700 dark:bg-navy-900">
                <button @click="activeTab = &#39;tabHome&#39;" :class="activeTab === &#39;tabHome&#39; &amp;&amp; &#39;text-primary dark:text-accent&#39;" class="btn h-9 rounded-full py-0 px-4 hover:bg-slate-300/20 hover:text-primary focus:bg-slate-300/20 focus:text-primary active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:hover:text-accent dark:focus:bg-navy-300/20 dark:focus:text-accent dark:active:bg-navy-300/25 text-primary dark:text-accent">
                  <svg x-show="activeTab === &#39;tabHome&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                  </svg>
                  <svg x-show="activeTab !== &#39;tabHome&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                  </svg>
                </button>
                <button @click="activeTab = &#39;tabProjects&#39;" :class="activeTab === &#39;tabProjects&#39; &amp;&amp; &#39;text-primary dark:text-accent&#39;" class="btn h-9 rounded-full py-0 px-4 hover:bg-slate-300/20 hover:text-primary focus:bg-slate-300/20 focus:text-primary active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:hover:text-accent dark:focus:bg-navy-300/20 dark:focus:text-accent dark:active:bg-navy-300/25">
                  <svg x-show="activeTab === &#39;tabProjects&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                  </svg>

                  <svg x-show="activeTab !== &#39;tabProjects&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                  </svg>
                </button>
                <button @click="activeTab = &#39;tabActivity&#39;" :class="activeTab === &#39;tabActivity&#39; &amp;&amp; &#39;text-primary dark:text-accent&#39;" class="btn h-9 rounded-full py-0 px-4 hover:bg-slate-300/20 hover:text-primary focus:bg-slate-300/20 focus:text-primary active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:hover:text-accent dark:focus:bg-navy-300/20 dark:focus:text-accent dark:active:bg-navy-300/25">
                  <svg x-show="activeTab ===  &#39;tabActivity&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                  </svg>
                  <svg x-show="activeTab !==  &#39;tabActivity&#39;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content Wrapper -->
      <main class="main-content w-full px-[var(--margin-x)] pb-8">
          


      <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Deposit
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Form</a>
             
            </li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 grid lg:col-span-4 lg:place-items-center">
            <div>
              <ol class="steps is-vertical line-space [--size:2.75rem] [--line:.5rem">
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                  <div class="step-header mask is-hexagon bg-primary text-white dark:bg-accent">
                    <i class="fa-solid fa-layer-group text-base"></i>
                  </div>
                  <div class="text-left">
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Step 1
                    </p>
                    <h3 class="text-base font-medium text-primary dark:text-accent-light">
                      Submit Request
                    </h3>
                  </div>
                </li>

                
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                  <div class="step-header mask is-hexagon bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100">
                    <i class="fa-solid fa-list text-base"></i>
                  </div>
                  <div class="text-left">
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      Step 2
                    </p>
                    <h3 class="text-base font-medium">Approvel</h3>
                  </div>
                </li>


              </ol>
            </div>
          </div>
          <div class="col-span-12 grid lg:col-span-8">
            <div class="card">
              <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                <div class="flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                    <i class="fa-solid fa-layer-group"></i>
                  </div>
                  <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                    Form
                  </h4>
                  <form method="POST" enctype="multipart/form-data" action="Deposit.php">

                </div>
              </div>
              <div class="space-y-4 p-4 sm:p-5">
                <label class="block">
                  <span>Transaction ID</span>

                  <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter TID" type="text" name="tid" required autocomplete="tid" class="form-control">
                </label>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <label class="block">
                <span>Select Digital Wallet</span>
                <select
                  class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" name="wallet" required autocomplete="wallet">


                  <option value="" disabled selected hidden>Select Wallet</option>
                  <option value="PayPal">Paypal</option>
                  <option value="Payoneer">Payoneer</option>
                  <option value="Wise">Wise</option>
                </select>
              </label>


                  <div class="grid grid-cols-2 gap-4">
                    <label class="block">
                      <span>Account Number</span>
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter Account" type="text" name="account_number" required autocomplete="account_number">
                    </label>

                    <label class="block">
                      <span>Amount</span>
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Amount" type="number" min="<?php echo $deposit_fee;?>" name="amount" required autocomplete="amount">
                    </label>
                  </div>
                </div>

                <div class="flex justify-center space-x-2 pt-4">

                  <button class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"  type="submit" name="submit">
                    <span>Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>



               


               
                        

<!--

                    <div x-init="$nextTick(() =&gt; { $el._x_chart = new ApexCharts($el,pages.charts.earningWhite); $el._x_chart.render() });" style="min-height: 60px;"><div id="apexchartsw92t3apy" class="apexcharts-canvas apexchartsw92t3apy apexcharts-theme-light" style="width: 97px; height: 60px;"><svg id="SvgjsSvg2563" width="97" height="60" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="97" height="60"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 30px;"></div></foreignobject><rect id="SvgjsRect2567" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG2596" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG2565" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 2)"><defs id="SvgjsDefs2564"><clippath id="gridRectMaskw92t3apy"><rect id="SvgjsRect2569" width="104" height="46" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskw92t3apy"></clippath><clippath id="nonForecastMaskw92t3apy"></clippath><clippath id="gridRectMarkerMaskw92t3apy"><rect id="SvgjsRect2570" width="101" height="47" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><line id="SvgjsLine2568" x1="0" y1="0" x2="0" y2="43" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="43" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG2576" class="apexcharts-grid"><g id="SvgjsG2577" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine2581" x1="0" y1="8.6" x2="97" y2="8.6" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2582" x1="0" y1="17.2" x2="97" y2="17.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2583" x1="0" y1="25.799999999999997" x2="97" y2="25.799999999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2584" x1="0" y1="34.4" x2="97" y2="34.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG2578" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine2587" x1="0" y1="43" x2="97" y2="43" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine2586" x1="0" y1="1" x2="0" y2="43" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG2571" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG2572" class="apexcharts-series" seriesName="Earning" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath2575" d="M 0 43C 11.316666666666665 43 21.016666666666666 25.8 32.33333333333333 25.8C 43.64999999999999 25.8 53.349999999999994 0 64.66666666666666 0C 75.98333333333332 0 85.68333333333334 34.4 97 34.4" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskw92t3apy)" pathTo="M 0 43C 11.316666666666665 43 21.016666666666666 25.8 32.33333333333333 25.8C 43.64999999999999 25.8 53.349999999999994 0 64.66666666666666 0C 75.98333333333332 0 85.68333333333334 34.4 97 34.4" pathFrom="M -1 43 L -1 43 L 32.33333333333333 43 L 64.66666666666666 43 L 97 43" fill-rule="evenodd"></path><g id="SvgjsG2573" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle2600" r="0" cx="0" cy="0" class="apexcharts-marker wudenw9v8 no-pointer-events" stroke="#ffffff" fill="#ffffff" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG2574" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG2579" class="apexcharts-grid-borders"><line id="SvgjsLine2580" x1="0" y1="0" x2="97" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2585" x1="0" y1="43" x2="97" y2="43" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine2588" x1="0" y1="0" x2="97" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2589" x1="0" y1="0" x2="97" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2590" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2591" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG2597" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2598" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2599" class="apexcharts-point-annotations"></g><rect id="SvgjsRect2601" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect2602" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
-->                  
                  
                  
                  
                  
            
             
          


          

<!--
                <div class="card p-3">
                  <div class="flex items-center space-x-3">
                    <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/store-ui.svg" alt="image">
                    <div class="flex-1">
                      <div class="flex justify-between">
                        <p class="font-medium text-slate-700 dark:text-navy-100">
                          Store Dashboard
                        </p>
                      </div>
                      <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                        <p>Updated a hour ago</p>
                        <div class="mx-2 my-1 hidden w-px bg-slate-200 dark:bg-navy-500 sm:flex"></div>

                        <p class="hidden sm:flex"></p>
                      </div>
                    </div>
                  </div>
                  <p class="-mt-3 text-right text-xs font-medium text-secondary dark:text-secondary-light">
                    56%
                  </p>

                  <div class="progress mt-2 h-1.5 bg-secondary/15 dark:bg-secondary-light/25">
                    <div class="w-6/12 rounded-full bg-secondary"></div>
                  </div>
                </div>



                
                <div class="card p-3">
                  <div class="flex items-center space-x-3">
                    <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/chat-ui.svg" alt="image">
                    <div class="flex-1">
                      <div class="flex justify-between">
                        <p class="font-medium text-slate-700 dark:text-navy-100">
                          Chat Mobile App
                        </p>
                      </div>
                      <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                        <p>Updated 3 days ago</p>
                        <div class="mx-2 my-1 hidden w-px bg-slate-200 dark:bg-navy-500 sm:flex"></div>

                        <p class="hidden sm:flex"></p>
                      </div>
                    </div>
                  </div>
                  <p class="-mt-3 text-right text-xs font-medium text-warning">
                    64%
                  </p>

                  <div class="progress mt-2 h-1.5 bg-warning/15 dark:bg-warning/25">
                    <div class="w-7/12 rounded-full bg-warning"></div>
                  </div>
                </div>



                <div class="card p-3">
                  <div class="flex items-center space-x-3">
                    <img class="h-10 w-10 rounded-lg object-cover object-center" src="./files/nft.svg" alt="image">
                    <div class="flex-1">
                      <div class="flex justify-between">
                        <p class="font-medium text-slate-700 dark:text-navy-100">
                          NFT Marketplace App
                        </p>
                      </div>
                      <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                        <p>Updated a week ago</p>
                        <div class="mx-2 my-1 hidden w-px bg-slate-200 dark:bg-navy-500 sm:flex"></div>

                        <p class="hidden sm:flex"></p>
                      </div>
                    </div>
                  </div>
                  <p class="-mt-3 text-right text-xs font-medium text-info">
                    14%
                  </p>

                  <div class="progress mt-2 h-1.5 bg-info/15 dark:bg-info/25">
                    <div class="w-2/12 rounded-full bg-info"></div>
                  </div>
                </div>


                    -->
      














<!--

              <div class="card">
                <div class="mt-3 flex h-8 items-center justify-between px-4 sm:px-5">
                  <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Income
                  </h2>

                  <div x-data="usePopper({placement:&#39;bottom-end&#39;,offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                      </svg>
                    </button>

                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; &#39;show&#39;" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-78px, 436px);" data-popper-placement="bottom-end">
                      <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                          <li>
                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                          </li>
                          <li>
                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                          </li>
                          <li>
                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                          </li>
                        </ul>
                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                        <ul>
                          <li>
                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ax-transparent-gridline pr-2">
                  <div x-init="$nextTick(() =&gt; { $el._x_chart = new ApexCharts($el,pages.charts.incomePersonal); $el._x_chart.render() });" style="min-height: 250px;"><div id="apexcharts5sghwlix" class="apexcharts-canvas apexcharts5sghwlix apexcharts-theme-light" style="width: 356px; height: 250px;"><svg id="SvgjsSvg2603" width="356" height="250" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="356" height="250"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 125px;"></div></foreignobject><g id="SvgjsG2706" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)"><g id="SvgjsG2707" class="apexcharts-yaxis-texts-g"></g></g><g id="SvgjsG2605" class="apexcharts-inner apexcharts-graphical" transform="translate(22, 43.27)"><defs id="SvgjsDefs2604"><lineargradient id="SvgjsLinearGradient2607" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2608" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop2609" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop2610" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></lineargradient><clippath id="gridRectMask5sghwlix"><rect id="SvgjsRect2612" width="328" height="180.73" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMask5sghwlix"></clippath><clippath id="nonForecastMask5sghwlix"></clippath><clippath id="gridRectMarkerMask5sghwlix"><rect id="SvgjsRect2613" width="328" height="184.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><rect id="SvgjsRect2611" width="22.275" height="180.73" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient2607)" class="apexcharts-xcrosshairs" y2="180.73" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG2666" class="apexcharts-grid"><g id="SvgjsG2667" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine2671" x1="0" y1="36.146" x2="324" y2="36.146" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2672" x1="0" y1="72.292" x2="324" y2="72.292" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2673" x1="0" y1="108.438" x2="324" y2="108.438" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2674" x1="0" y1="144.584" x2="324" y2="144.584" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2675" x1="0" y1="180.73000000000002" x2="324" y2="180.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG2668" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine2677" x1="0" y1="180.73" x2="324" y2="180.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine2676" x1="0" y1="1" x2="0" y2="180.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG2614" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG2615" class="apexcharts-series" rel="1" seriesName="Income" data:realIndex="0"><path id="SvgjsPath2619" d="M 9.1125 170.731 L 9.1125 126.93331 C 9.1125 121.93331 14.1125 116.93331 19.1125 116.93331 L 21.3875 116.93331 C 26.3875 116.93331 31.3875 121.93331 31.3875 126.93331 L 31.3875 170.731 C 31.3875 175.731 26.3875 180.731 21.3875 180.731 L 19.1125 180.731 C 14.1125 180.731 9.1125 175.731 9.1125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 9.1125 170.731 L 9.1125 126.93331 C 9.1125 121.93331 14.1125 116.93331 19.1125 116.93331 L 21.3875 116.93331 C 26.3875 116.93331 31.3875 121.93331 31.3875 126.93331 L 31.3875 170.731 C 31.3875 175.731 26.3875 180.731 21.3875 180.731 L 19.1125 180.731 C 14.1125 180.731 9.1125 175.731 9.1125 170.731 Z " pathFrom="M 9.1125 180.731 L 9.1125 180.731 L 31.3875 180.731 L 31.3875 180.731 L 31.3875 180.731 L 31.3875 180.731 L 31.3875 180.731 L 9.1125 180.731 Z" cy="116.93231" cx="49.6125" j="0" val="1765" barHeight="63.797689999999996" barWidth="22.275"></path><path id="SvgjsPath2625" d="M 49.6125 170.731 L 49.6125 105.53487799999999 C 49.6125 100.53487799999999 54.6125 95.53487799999999 59.6125 95.53487799999999 L 61.88749999999999 95.53487799999999 C 66.88749999999999 95.53487799999999 71.88749999999999 100.53487799999999 71.88749999999999 105.53487799999999 L 71.88749999999999 170.731 C 71.88749999999999 175.731 66.88749999999999 180.731 61.88749999999999 180.731 L 59.6125 180.731 C 54.6125 180.731 49.6125 175.731 49.6125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 49.6125 170.731 L 49.6125 105.53487799999999 C 49.6125 100.53487799999999 54.6125 95.53487799999999 59.6125 95.53487799999999 L 61.88749999999999 95.53487799999999 C 66.88749999999999 95.53487799999999 71.88749999999999 100.53487799999999 71.88749999999999 105.53487799999999 L 71.88749999999999 170.731 C 71.88749999999999 175.731 66.88749999999999 180.731 61.88749999999999 180.731 L 59.6125 180.731 C 54.6125 180.731 49.6125 175.731 49.6125 170.731 Z " pathFrom="M 49.6125 180.731 L 49.6125 180.731 L 71.88749999999999 180.731 L 71.88749999999999 180.731 L 71.88749999999999 180.731 L 71.88749999999999 180.731 L 71.88749999999999 180.731 L 49.6125 180.731 Z" cy="95.53387799999999" cx="90.1125" j="1" val="2357" barHeight="85.196122" barWidth="22.275"></path><path id="SvgjsPath2631" d="M 90.1125 170.731 L 90.1125 38.375609999999995 C 90.1125 33.375609999999995 95.1125 28.37560999999999 100.1125 28.37560999999999 L 102.38749999999999 28.37560999999999 C 107.38749999999999 28.37560999999999 112.38749999999999 33.375609999999995 112.38749999999999 38.375609999999995 L 112.38749999999999 170.731 C 112.38749999999999 175.731 107.38749999999999 180.731 102.38749999999999 180.731 L 100.1125 180.731 C 95.1125 180.731 90.1125 175.731 90.1125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 90.1125 170.731 L 90.1125 38.375609999999995 C 90.1125 33.375609999999995 95.1125 28.37560999999999 100.1125 28.37560999999999 L 102.38749999999999 28.37560999999999 C 107.38749999999999 28.37560999999999 112.38749999999999 33.375609999999995 112.38749999999999 38.375609999999995 L 112.38749999999999 170.731 C 112.38749999999999 175.731 107.38749999999999 180.731 102.38749999999999 180.731 L 100.1125 180.731 C 95.1125 180.731 90.1125 175.731 90.1125 170.731 Z " pathFrom="M 90.1125 180.731 L 90.1125 180.731 L 112.38749999999999 180.731 L 112.38749999999999 180.731 L 112.38749999999999 180.731 L 112.38749999999999 180.731 L 112.38749999999999 180.731 L 90.1125 180.731 Z" cy="28.37460999999999" cx="130.6125" j="2" val="4215" barHeight="152.35539" barWidth="22.275"></path><path id="SvgjsPath2637" d="M 130.6125 170.731 L 130.6125 47.19523399999999 C 130.6125 42.19523399999999 135.6125 37.19523399999999 140.6125 37.19523399999999 L 142.88750000000002 37.19523399999999 C 147.88750000000002 37.19523399999999 152.88750000000002 42.19523399999999 152.88750000000002 47.19523399999999 L 152.88750000000002 170.731 C 152.88750000000002 175.731 147.88750000000002 180.731 142.88750000000002 180.731 L 140.6125 180.731 C 135.6125 180.731 130.6125 175.731 130.6125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 130.6125 170.731 L 130.6125 47.19523399999999 C 130.6125 42.19523399999999 135.6125 37.19523399999999 140.6125 37.19523399999999 L 142.88750000000002 37.19523399999999 C 147.88750000000002 37.19523399999999 152.88750000000002 42.19523399999999 152.88750000000002 47.19523399999999 L 152.88750000000002 170.731 C 152.88750000000002 175.731 147.88750000000002 180.731 142.88750000000002 180.731 L 140.6125 180.731 C 135.6125 180.731 130.6125 175.731 130.6125 170.731 Z " pathFrom="M 130.6125 180.731 L 130.6125 180.731 L 152.88750000000002 180.731 L 152.88750000000002 180.731 L 152.88750000000002 180.731 L 152.88750000000002 180.731 L 152.88750000000002 180.731 L 130.6125 180.731 Z" cy="37.194233999999994" cx="171.1125" j="3" val="3971" barHeight="143.535766" barWidth="22.275"></path><path id="SvgjsPath2643" d="M 171.1125 170.731 L 171.1125 51.894214 C 171.1125 46.894214 176.1125 41.894214 181.1125 41.894214 L 183.38750000000002 41.894214 C 188.38750000000002 41.894214 193.38750000000002 46.894214 193.38750000000002 51.894214 L 193.38750000000002 170.731 C 193.38750000000002 175.731 188.38750000000002 180.731 183.38750000000002 180.731 L 181.1125 180.731 C 176.1125 180.731 171.1125 175.731 171.1125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 171.1125 170.731 L 171.1125 51.894214 C 171.1125 46.894214 176.1125 41.894214 181.1125 41.894214 L 183.38750000000002 41.894214 C 188.38750000000002 41.894214 193.38750000000002 46.894214 193.38750000000002 51.894214 L 193.38750000000002 170.731 C 193.38750000000002 175.731 188.38750000000002 180.731 183.38750000000002 180.731 L 181.1125 180.731 C 176.1125 180.731 171.1125 175.731 171.1125 170.731 Z " pathFrom="M 171.1125 180.731 L 171.1125 180.731 L 193.38750000000002 180.731 L 193.38750000000002 180.731 L 193.38750000000002 180.731 L 193.38750000000002 180.731 L 193.38750000000002 180.731 L 171.1125 180.731 Z" cy="41.893214" cx="211.6125" j="4" val="3841" barHeight="138.836786" barWidth="22.275"></path><path id="SvgjsPath2649" d="M 211.6125 170.731 L 211.6125 38.15873400000001 C 211.6125 33.15873400000001 216.6125 28.158734000000006 221.6125 28.158734000000006 L 223.88750000000002 28.158734000000006 C 228.88750000000002 28.158734000000006 233.88750000000002 33.15873400000001 233.88750000000002 38.15873400000001 L 233.88750000000002 170.731 C 233.88750000000002 175.731 228.88750000000002 180.731 223.88750000000002 180.731 L 221.6125 180.731 C 216.6125 180.731 211.6125 175.731 211.6125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 211.6125 170.731 L 211.6125 38.15873400000001 C 211.6125 33.15873400000001 216.6125 28.158734000000006 221.6125 28.158734000000006 L 223.88750000000002 28.158734000000006 C 228.88750000000002 28.158734000000006 233.88750000000002 33.15873400000001 233.88750000000002 38.15873400000001 L 233.88750000000002 170.731 C 233.88750000000002 175.731 228.88750000000002 180.731 223.88750000000002 180.731 L 221.6125 180.731 C 216.6125 180.731 211.6125 175.731 211.6125 170.731 Z " pathFrom="M 211.6125 180.731 L 211.6125 180.731 L 233.88750000000002 180.731 L 233.88750000000002 180.731 L 233.88750000000002 180.731 L 233.88750000000002 180.731 L 233.88750000000002 180.731 L 211.6125 180.731 Z" cy="28.157734000000005" cx="252.1125" j="5" val="4221" barHeight="152.57226599999998" barWidth="22.275"></path><path id="SvgjsPath2655" d="M 252.1125 170.731 L 252.1125 104.920396 C 252.1125 99.920396 257.1125 94.920396 262.1125 94.920396 L 264.3875 94.920396 C 269.3875 94.920396 274.3875 99.920396 274.3875 104.920396 L 274.3875 170.731 C 274.3875 175.731 269.3875 180.731 264.3875 180.731 L 262.1125 180.731 C 257.1125 180.731 252.1125 175.731 252.1125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 252.1125 170.731 L 252.1125 104.920396 C 252.1125 99.920396 257.1125 94.920396 262.1125 94.920396 L 264.3875 94.920396 C 269.3875 94.920396 274.3875 99.920396 274.3875 104.920396 L 274.3875 170.731 C 274.3875 175.731 269.3875 180.731 264.3875 180.731 L 262.1125 180.731 C 257.1125 180.731 252.1125 175.731 252.1125 170.731 Z " pathFrom="M 252.1125 180.731 L 252.1125 180.731 L 274.3875 180.731 L 274.3875 180.731 L 274.3875 180.731 L 274.3875 180.731 L 274.3875 180.731 L 252.1125 180.731 Z" cy="94.91939599999999" cx="292.6125" j="6" val="2374" barHeight="85.810604" barWidth="22.275"></path><path id="SvgjsPath2661" d="M 292.6125 170.731 L 292.6125 38.484048 C 292.6125 33.484048 297.6125 28.484047999999998 302.6125 28.484047999999998 L 304.8875 28.484047999999998 C 309.8875 28.484047999999998 314.8875 33.484048 314.8875 38.484048 L 314.8875 170.731 C 314.8875 175.731 309.8875 180.731 304.8875 180.731 L 302.6125 180.731 C 297.6125 180.731 292.6125 175.731 292.6125 170.731 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask5sghwlix)" pathTo="M 292.6125 170.731 L 292.6125 38.484048 C 292.6125 33.484048 297.6125 28.484047999999998 302.6125 28.484047999999998 L 304.8875 28.484047999999998 C 309.8875 28.484047999999998 314.8875 33.484048 314.8875 38.484048 L 314.8875 170.731 C 314.8875 175.731 309.8875 180.731 304.8875 180.731 L 302.6125 180.731 C 297.6125 180.731 292.6125 175.731 292.6125 170.731 Z " pathFrom="M 292.6125 180.731 L 292.6125 180.731 L 314.8875 180.731 L 314.8875 180.731 L 314.8875 180.731 L 314.8875 180.731 L 314.8875 180.731 L 292.6125 180.731 Z" cy="28.483047999999997" cx="333.1125" j="7" val="4212" barHeight="152.246952" barWidth="22.275"></path><g id="SvgjsG2617" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG2618" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2624" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2630" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2636" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2642" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2648" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2654" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG2660" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG2616" class="apexcharts-datalabels" data:realIndex="0"><g id="SvgjsG2621" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2623" font-family="Helvetica, Arial, sans-serif" x="20.249999999999996" y="111.93231" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="20.249999999999996" cy="111.93231">1.76k</text></g><g id="SvgjsG2627" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2629" font-family="Helvetica, Arial, sans-serif" x="60.75" y="90.53387799999999" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="60.75" cy="90.53387799999999">2.36k</text></g><g id="SvgjsG2633" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2635" font-family="Helvetica, Arial, sans-serif" x="101.25000000000001" y="23.37460999999999" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="101.25000000000001" cy="23.37460999999999">4.21k</text></g><g id="SvgjsG2639" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2641" font-family="Helvetica, Arial, sans-serif" x="141.75" y="32.194233999999994" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="141.75" cy="32.194233999999994">3.97k</text></g><g id="SvgjsG2645" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2647" font-family="Helvetica, Arial, sans-serif" x="182.25" y="36.893214" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="182.25" cy="36.893214">3.84k</text></g><g id="SvgjsG2651" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2653" font-family="Helvetica, Arial, sans-serif" x="222.75" y="23.157734000000005" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="222.75" cy="23.157734000000005">4.22k</text></g><g id="SvgjsG2657" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2659" font-family="Helvetica, Arial, sans-serif" x="263.25" y="89.91939599999999" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="263.25" cy="89.91939599999999">2.37k</text></g><g id="SvgjsG2663" class="apexcharts-data-labels" transform="rotate(0)"><text id="SvgjsText2665" font-family="Helvetica, Arial, sans-serif" x="303.75" y="23.483047999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-datalabel" style="font-family: Helvetica, Arial, sans-serif;" cx="303.75" cy="23.483047999999997">4.21k</text></g></g></g><g id="SvgjsG2669" class="apexcharts-grid-borders"><line id="SvgjsLine2670" x1="0" y1="0" x2="324" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine2678" x1="0" y1="0" x2="324" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2679" x1="0" y1="0" x2="324" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2680" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2681" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText2683" font-family="Helvetica, Arial, sans-serif" x="20.25" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2684">Jan</tspan><title>Jan</title></text><text id="SvgjsText2686" font-family="Helvetica, Arial, sans-serif" x="60.75" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2687">Feb</tspan><title>Feb</title></text><text id="SvgjsText2689" font-family="Helvetica, Arial, sans-serif" x="101.25" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2690">Mar</tspan><title>Mar</title></text><text id="SvgjsText2692" font-family="Helvetica, Arial, sans-serif" x="141.75" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2693">Apr</tspan><title>Apr</title></text><text id="SvgjsText2695" font-family="Helvetica, Arial, sans-serif" x="182.25" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2696">May</tspan><title>May</title></text><text id="SvgjsText2698" font-family="Helvetica, Arial, sans-serif" x="222.75" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2699">Jun</tspan><title>Jun</title></text><text id="SvgjsText2701" font-family="Helvetica, Arial, sans-serif" x="263.25" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2702">Jul</tspan><title>Jul</title></text><text id="SvgjsText2704" font-family="Helvetica, Arial, sans-serif" x="303.75" y="-10.270000000000003" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan2705">Aug</tspan><title>Aug</title></text></g></g><g id="SvgjsG2708" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2709" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2710" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(68, 103, 239);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                </div>
              </div>

             




                  -->











        
        
      </main>
    </div>
    <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
  

<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg>



</body></html>